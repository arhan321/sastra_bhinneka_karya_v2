<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
      public function up(): void
      {
            Schema::create('homepage_settings', function (Blueprint $table) {
                  $table->id();

                  // ─── HERO SECTION ───────────────────────────────────────────────
                  $table->string('hero_background_image')->nullable()
                        ->comment('Path gambar background hero (grayscale + gelap)');
                  $table->string('hero_badge_text')->default('Jasa Konsultasi & Konstruksi')
                        ->comment('Teks badge kecil di atas judul');

                  // Judul utama (3 baris terpisah supaya warna bisa beda)
                  $table->string('hero_title_line1')->default('SASTRA');
                  $table->string('hero_title_line2')->default('BHINNEKA');
                  $table->string('hero_title_line3')->default('KARYA');

                  $table->string('hero_tagline')->default('You Deserve The Good Service')
                        ->comment('Kalimat italic di bawah judul');
                  $table->text('hero_description')
                        ->default('Solusi terpercaya untuk kebutuhan jasa konsultasi konstruksi, lingkungan, dan perizinan. Berpengalaman melayani industri terkemuka di Indonesia.')
                        ->comment('Paragraf deskripsi hero');

                  // Tombol hero
                  $table->string('hero_btn_primary_text')->default('Lihat Layanan');
                  $table->string('hero_btn_secondary_text')->default('Hubungi Kami');
                  $table->string('hero_whatsapp_number')->default('6281312023435');
                  $table->text('hero_whatsapp_message')
                        ->default('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.');

                  // ─── STATS (dipakai di hero, stats banner, dan about) ───────────
                  $table->unsignedSmallInteger('stat_clients')->default(10)
                        ->comment('Jumlah klien aktif');
                  $table->unsignedSmallInteger('stat_projects')->default(50)
                        ->comment('Jumlah proyek selesai');
                  $table->unsignedSmallInteger('stat_services')->default(23)
                        ->comment('Jumlah jenis layanan');
                  $table->unsignedSmallInteger('stat_years')->default(5)
                        ->comment('Tahun pengalaman');

                  // Label stats (kalau mau diterjemahkan / diubah)
                  $table->string('stat_clients_label')->default('Klien Aktif');
                  $table->string('stat_projects_label')->default('Proyek Selesai');
                  $table->string('stat_services_label')->default('Jenis Layanan');
                  $table->string('stat_years_label')->default('Tahun Pengalaman');

                  // ─── ABOUT SNIPPET ──────────────────────────────────────────────
                  $table->string('about_image')->nullable()
                        ->comment('Foto tim / proyek di section about');
                  $table->string('about_section_tag')->default('Tentang Kami');
                  $table->string('about_title')->default('Solusi Terbaik untuk Bisnis Anda');
                  $table->text('about_description')
                        ->default('PT Sastra Bhinneka Karya adalah perusahaan jasa konsultasi berpengalaman di bidang konstruksi dan non-konstruksi. Kami hadir memberikan solusi terbaik bagi perusahaan Anda dalam menghadapi tantangan regulasi, lingkungan, dan infrastruktur.');
                  // 4 poin keunggulan — simpan sebagai JSON array string
                  $table->json('about_highlights')
                        ->default('["Tim Ahli Berpengalaman","Solusi Terintegrasi","Tepat Waktu & Akurat","Harga Kompetitif"]')
                        ->comment('Array JSON 4 poin keunggulan');

                  // ─── CTA SECTION ────────────────────────────────────────────────
                  $table->string('cta_section_tag')->default('Mulai Sekarang');
                  $table->string('cta_title')->default('Siap Bekerja Sama dengan Kami?');
                  $table->string('cta_title_highlight')->default('dengan Kami?')
                        ->comment('Bagian judul CTA yang berwarna merah');
                  $table->text('cta_description')
                        ->default('Konsultasikan kebutuhan bisnis Anda bersama tim ahli kami. Kami siap memberikan solusi terbaik.');
                  $table->string('cta_btn_text')->default('Hubungi Kami Sekarang');

                  // ─── CONTACT INFO ────────────────────────────────────────────────
                  $table->string('contact_address')->default('Jl. Merak No. 78 Sukamulya, Tangerang');
                  $table->string('contact_phone')->default('081312023435');
                  $table->string('contact_email')->default('sastrabhinekakarya@gmail.com');
                  $table->string('contact_maps_embed_url')
                        ->default('https://maps.google.com/maps?q=Jl.+Merak+No.78+Sukamulya+Tangerang&output=embed')
                        ->comment('URL iframe Google Maps');

                  // ─── SEO ─────────────────────────────────────────────────────────
                  $table->string('meta_title')->default('Beranda');
                  $table->text('meta_description')
                        ->default('PT Sastra Bhinneka Karya melayani jasa konsultasi konstruksi, lingkungan, perizinan, dokumen teknis, serta kebutuhan industri di Indonesia.');

                  $table->timestamps();
            });
      }

      public function down(): void
      {
            Schema::dropIfExists('homepage_settings');
      }
};
