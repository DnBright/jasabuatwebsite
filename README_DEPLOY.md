# 🚀 Panduan Deployment Laravel via SSH (jasabuatwebsite)

Project ini telah dilengkapi dengan dua pilihan otomatisasi deployment menggunakan SSH:
1. **GitHub Actions CI/CD** (Otomatis setiap push ke GitHub) — **Opsi A**
2. **Script Deploy Lokal** (`deploy.sh`) — **Opsi B**

Ikuti panduan di bawah ini untuk menghubungkan dan mendeploy project Anda ke server.

---

## 🔑 Langkah Awal: Menyiapkan SSH Key (Wajib)

Agar komputer lokal Anda atau GitHub Actions bisa masuk ke server tanpa meminta password, Anda harus membuat dan menambahkan **SSH Key**.

### 1. Kirim SSH Key ke Server Anda
Gunakan perintah `ssh-copy-id` dengan port kustom Rumahweb (**2223**) untuk mengirim kunci publik Anda ke server:
```bash
ssh-copy-id -p 2223 -i ~/.ssh/id_ed25519.pub they9636@202.10.43.163
```
*Masukkan password SSH server Anda (`bPXwtuggH5qk81`) sekali untuk otorisasi.*

Setelah ini, coba tes masuk server dengan:
```bash
ssh -p 2223 they9636@202.10.43.163
```
Jika Anda langsung masuk tanpa ditanya password, **koneksi SSH Anda telah sukses terhubung! 🎉**

---

## 💻 Opsi B: Setup Script Deploy Lokal (`deploy.sh`)

Kami telah membuat script deploy interaktif premium di [`deploy.sh`](deploy.sh).

### 1. Konfigurasi Kredensial (Sudah Terkonfigurasi!)
File [`deploy.sh`](deploy.sh) sudah dikonfigurasi otomatis menggunakan data server Anda:
```bash
SERVER_HOST="202.10.43.163"
SERVER_USER="they9636"
SERVER_PORT="2223"
DEPLOY_PATH="/home/they9636/public_html/thedarkandbright.com"
```

### 2. Jalankan Deployment
Setelah langkah SSH Key di atas berhasil, Anda hanya perlu menjalankan perintah ini dari terminal Mac Anda untuk melakukan deployment:
```bash
./deploy.sh
```
Script akan otomatis:
- Menghubungkan ke server via SSH Port 2223.
- Mengaktifkan mode maintenance (artisan down).
- Menarik kode terbaru dari Git (`git pull`).
- Menginstal dependensi PHP (`composer install`).
- Menjalankan migrasi database (`php artisan migrate`).
- Melakukan optimasi cache dan view Laravel.
- Menonaktifkan mode maintenance (artisan up).
