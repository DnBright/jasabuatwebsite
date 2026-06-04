<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * Public API: Visitor sends a message.
     */
    public function userSendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_id' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'name' => 'nullable|string|max:255',
            'email_whatsapp' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        // If name or contact is empty, try to copy it from a previous message in the same session
        $name = $request->name;
        $emailWhatsapp = $request->email_whatsapp;

        if (empty($name) || empty($emailWhatsapp)) {
            $prevMsg = ChatMessage::where('session_id', $request->session_id)
                ->whereNotNull('name')
                ->orderBy('created_at', 'desc')
                ->first();

            if ($prevMsg) {
                $name = $name ?: $prevMsg->name;
                $emailWhatsapp = $emailWhatsapp ?: $prevMsg->email_whatsapp;
            }
        }

        $message = ChatMessage::create([
            'session_id' => $request->session_id,
            'name' => $name ?: 'Visitor',
            'email_whatsapp' => $emailWhatsapp,
            'message' => $request->message,
            'is_from_admin' => false,
            'is_read' => false,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => $message,
        ]);
    }

    /**
     * Public API: Visitor fetches their chat history.
     */
    public function userGetMessages(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'session_id' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
            ], 422);
        }

        $messages = ChatMessage::where('session_id', $request->session_id)
            ->orderBy('created_at', 'asc')
            ->get();

        // Mark any unread admin messages in this session as read by the user
        ChatMessage::where('session_id', $request->session_id)
            ->where('is_from_admin', true)
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return response()->json([
            'status' => 'success',
            'messages' => $messages,
        ]);
    }

    /**
     * Admin Dashboard: List conversations.
     */
    public function adminIndex(Request $request)
    {
        // Get unique sessions with their latest message details and unread message counts
        $sessions = ChatMessage::select('session_id', 'name', 'email_whatsapp')
            ->selectRaw('MAX(created_at) as latest_message_time')
            ->selectRaw('SUM(CASE WHEN is_from_admin = 0 AND is_read = 0 THEN 1 ELSE 0 END) as unread_count')
            ->groupBy('session_id', 'name', 'email_whatsapp')
            ->orderBy('latest_message_time', 'desc')
            ->get();

        // Attach actual latest message text and sender info to each session
        foreach ($sessions as $session) {
            $latest = ChatMessage::where('session_id', $session->session_id)
                ->orderBy('created_at', 'desc')
                ->first();
            $session->latest_message = $latest ? $latest->message : '';
            $session->latest_message_from_admin = $latest ? $latest->is_from_admin : false;
        }

        $activeSessionId = $request->query('session_id');
        $activeMessages = collect();
        $activeSession = null;

        if ($activeSessionId) {
            $activeMessages = ChatMessage::where('session_id', $activeSessionId)
                ->orderBy('created_at', 'asc')
                ->get();

            // Mark user messages in this active conversation as read by admin
            ChatMessage::where('session_id', $activeSessionId)
                ->where('is_from_admin', false)
                ->where('is_read', false)
                ->update(['is_read' => true]);

            $activeSession = $sessions->firstWhere('session_id', $activeSessionId);

            // Fallback if not found in grouped list
            if (! $activeSession) {
                $rawSession = ChatMessage::where('session_id', $activeSessionId)
                    ->orderBy('created_at', 'desc')
                    ->first();
                if ($rawSession) {
                    $activeSession = (object) [
                        'session_id' => $rawSession->session_id,
                        'name' => $rawSession->name,
                        'email_whatsapp' => $rawSession->email_whatsapp,
                        'unread_count' => 0,
                    ];
                }
            }
        } elseif ($sessions->count() > 0) {
            // Redirect to the most recent chat session automatically
            $activeSessionId = $sessions->first()->session_id;

            return redirect()->route('dashboard.chat.index', ['session_id' => $activeSessionId]);
        }

        return view('dashboard.chat.index', compact(
            'sessions',
            'activeSessionId',
            'activeMessages',
            'activeSession'
        ));
    }

    /**
     * Admin Dashboard: Send a reply.
     */
    public function adminSendMessage(Request $request)
    {
        $request->validate([
            'session_id' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // Fetch name and contact from previous message to keep records consistent
        $lastUserMsg = ChatMessage::where('session_id', $request->session_id)
            ->where('is_from_admin', false)
            ->orderBy('created_at', 'desc')
            ->first();

        ChatMessage::create([
            'session_id' => $request->session_id,
            'name' => $lastUserMsg ? $lastUserMsg->name : 'Visitor',
            'email_whatsapp' => $lastUserMsg ? $lastUserMsg->email_whatsapp : null,
            'message' => $request->message,
            'is_from_admin' => true,
            'is_read' => false,
        ]);

        return redirect()->route('dashboard.chat.index', ['session_id' => $request->session_id])
            ->with('success', 'Pesan balasan berhasil dikirim.');
    }

    /**
     * Admin Dashboard: Delete conversation history.
     */
    public function adminDeleteSession($sessionId)
    {
        ChatMessage::where('session_id', $sessionId)->delete();

        return redirect()->route('dashboard.chat.index')
            ->with('success', 'Percakapan berhasil dihapus.');
    }
}
