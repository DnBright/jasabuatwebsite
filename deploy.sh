#!/bin/bash

# --- CONFIGURATION (Kategori Konfigurasi) ---
# Silakan isi detail server Anda di bawah ini:
SERVER_HOST="202.10.43.163"                      # IP Address Server Anda
SERVER_USER="they9636"                            # Username cPanel/SSH Anda (Sesuaikan ke they9636_darkandbright jika diperlukan)
SERVER_PORT="2223"                                # Port SSH default Rumahweb Shared Hosting
DEPLOY_PATH="/home/they9636/public_html/thedarkandbright.com" # Lokasi folder project di server
BRANCH="main"                                     # Branch git yang akan di-deploy

# --- COLOR VARIABLES (Variabel Warna untuk UI Premium) ---
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color
BOLD='\033[1m'

echo -e "${BLUE}${BOLD}====================================================${NC}"
echo -e "${CYAN}${BOLD}     🚀 LARAVEL PREMIUM SSH DEPLOYER SCRIPT         ${NC}"
echo -e "${BLUE}${BOLD}====================================================${NC}"

# Validasi konfigurasi default
if [ "$SERVER_HOST" == "IP_ADDRESS_SERVER" ] || [ "$SERVER_USER" == "username" ]; then
    echo -e "${RED}${BOLD}[ERROR] Silakan edit file ini dan lengkapi konfigurasi server Anda terlebih dahulu!${NC}"
    exit 1
fi

# --- LOCAL ASSET BUILD ---
echo -e "${CYAN}💻 Memeriksa dan mengkompilasi asset Vite secara lokal...${NC}"
if [ -f "package.json" ]; then
    npm run build || echo -e "${YELLOW}⚠️ Gagal melakukan build asset lokal secara otomatis (lewati jika tidak menggunakan npm lokal).${NC}"
fi

echo -e "${YELLOW}🔄 Menghubungkan ke server ${BOLD}$SERVER_USER@$SERVER_HOST:$SERVER_PORT${NC}..."
echo -e "${YELLOW}📂 Direktori target: ${BOLD}$DEPLOY_PATH${NC}"
echo -e "${YELLOW}🌿 Branch target: ${BOLD}$BRANCH${NC}"
echo -e "${BLUE}----------------------------------------------------${NC}"

# Jalankan perintah deploy di server via SSH
ssh -p $SERVER_PORT $SERVER_USER@$SERVER_HOST << EOF
    # Berhenti jika ada error
    set -e

    echo -e "${CYAN}📁 Memeriksa direktori target...${NC}"
    if [ ! -d "$DEPLOY_PATH" ]; then
        echo -e "${YELLOW}📂 Direktori tidak ditemukan. Membuat direktori baru...${NC}"
        mkdir -p "$DEPLOY_PATH"
    fi
    cd "$DEPLOY_PATH"

    # Periksa apakah sudah ada repository Git
    if [ ! -d ".git" ]; then
        echo -e "${YELLOW}🌱 Project belum terinstall di server. Melakukan clone pertama kali...${NC}"
        # Coba clone menggunakan SSH (disarankan karena user sudah setup SSH key)
        git clone git@github.com:DnBright/jasabuatwebsite.git . || {
            echo -e "${YELLOW}⚠️ Gagal clone via SSH. Mencoba clone via HTTPS...${NC}"
            git clone https://github.com/DnBright/jasabuatwebsite.git .
        }
    fi

    # Buat file .env jika belum ada
    if [ ! -f ".env" ]; then
        echo -e "${YELLOW}📝 Membuat file .env baru dari .env.example...${NC}"
        cp .env.example .env
    fi

    # Pastikan APP_KEY terisi di dalam .env
    if [ -f ".env" ] && (! grep -q "^APP_KEY=base64:" .env || [ -z "$(grep "^APP_KEY=" .env | cut -d'=' -f2)" ]); then
        echo -e "${YELLOW}🔑 APP_KEY kosong atau belum terkonfigurasi. Membuat key baru...${NC}"
        php artisan key:generate --force || true
    fi

    echo -e "${CYAN}🔒 Mengaktifkan Mode Maintenance (Artisan Down)...${NC}"
    php artisan down || true

    echo -e "${CYAN}📥 Mengambil kode terbaru dari Git (Branch: $BRANCH)...${NC}"
    git fetch origin
    git checkout -f $BRANCH
    git pull origin $BRANCH

    echo -e "${CYAN}📦 Menginstal Dependensi PHP (Composer)...${NC}"
    composer install --no-dev --optimize-autoloader --no-interaction --no-scripts || {
        echo -e "${YELLOW}⚠️ Gagal composer install biasa. Mencoba menggunakan composer alternatif...${NC}"
        php -r "readfile('https://getcomposer.org/installer');" | php
        php composer.phar install --no-dev --optimize-autoloader --no-interaction --no-scripts
    }

    echo -e "${CYAN}📦 Melakukan Registrasi Package Laravel...${NC}"
    php artisan package:discover --ansi || true

    echo -e "${CYAN}💾 Menjalankan Migrasi Database...${NC}"
    php artisan migrate --force || echo -e "${YELLOW}⚠️ Migrasi database dilewati (pastikan konfigurasi database di .env server sudah benar).${NC}"

    echo -e "${CYAN}⚡ Mengoptimalkan Cache Laravel...${NC}"
    php artisan optimize || true
    php artisan view:cache || true
    php artisan event:cache || true

    echo -e "${CYAN}🔗 Membuat/Mengupdate .htaccess di public_html/...${NC}"
    cat << 'HTACCESS' > ../.htaccess
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Arahkan domain utama & subdomain ke folder Laravel
    RewriteCond %{HTTP_HOST} ^(www\.)?thedarkandbright\.com$ [NC] [OR]
    RewriteCond %{HTTP_HOST} ^agency\.thedarkandbright\.com$ [NC] [OR]
    RewriteCond %{HTTP_HOST} ^admin\.thedarkandbright\.com$ [NC] [OR]
    RewriteCond %{HTTP_HOST} ^gro\.thedarkandbright\.com$ [NC]
    RewriteCond %{REQUEST_URI} !^/thedarkandbright.com/public/
    RewriteRule ^(.*)$ thedarkandbright.com/public/$1 [L]
</IfModule>
HTACCESS

    echo -e "${CYAN}🔓 Menonaktifkan Mode Maintenance (Artisan Up)...${NC}"
    php artisan up || true

    echo -e "${GREEN}${BOLD}✓ Server berhasil diperbarui!${NC}"
EOF

if [ $? -eq 0 ]; then
    echo -e "${BLUE}----------------------------------------------------${NC}"
    echo -e "${GREEN}${BOLD}🎉 DEPLOYMENT BERHASIL SEPENUHNYA! 🚀${NC}"
    echo -e "${GREEN}Aplikasi Anda sekarang sudah online dengan versi terbaru.${NC}"
    echo -e "${BLUE}====================================================${NC}"
else
    echo -e "${BLUE}----------------------------------------------------${NC}"
    echo -e "${RED}${BOLD}❌ DEPLOYMENT GAGAL!${NC}"
    echo -e "${RED}Silakan periksa detail error log di atas.${NC}"
    echo -e "${BLUE}====================================================${NC}"
    exit 1
fi
