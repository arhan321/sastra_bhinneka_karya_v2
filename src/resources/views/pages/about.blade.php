@extends('layouts.app')
@section('title', 'Tentang Kami')

@section('content')

    @php
        use Illuminate\Support\Facades\Storage;

        /*
        |--------------------------------------------------------------------------
        | Helper URL Storage
        |--------------------------------------------------------------------------
        | Aman untuk path dari database:
        | - company/file.png
        | - storage/company/file.png
        | - /storage/company/file.png
        | - https://domain.com/storage/company/file.png
        */
        $storageImageUrl = function ($path, $fallback = 'images/logo.jpg') {
            if (empty($path)) {
                return asset($fallback);
            }

            $path = trim($path);

            if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
                return $path;
            }

            $path = ltrim($path, '/');

            if (str_starts_with($path, 'storage/')) {
                $path = substr($path, strlen('storage/'));
            }

            if (Storage::disk('public')->exists($path)) {
                return Storage::url($path);
            }

            return asset($fallback);
        };

        /*
        |--------------------------------------------------------------------------
        | Helper Normalize Array
        |--------------------------------------------------------------------------
        | Aman untuk data JSON, array, atau string per baris.
        */
        $normalizeArray = function ($data) {
            if (empty($data)) {
                return [];
            }

            if (is_array($data)) {
                return $data;
            }

            if (is_string($data)) {
                $decoded = json_decode($data, true);

                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    return $decoded;
                }

                return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $data))));
            }

            return [];
        };

        $companyLogo = $storageImageUrl($company?->logo_path ?? null, 'images/logo.jpg');

        $companyPhone = $company?->phone ?? '081312023435';
        $waNumber = preg_replace('/\D+/', '', $companyPhone);

        if (str_starts_with($waNumber, '0')) {
            $waNumber = '62' . substr($waNumber, 1);
        }

        if (!str_starts_with($waNumber, '62')) {
            $waNumber = '62' . $waNumber;
        }

        $waText = rawurlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.');
    @endphp

    {{-- Hero --}}
    <section class="bg-sbk-black py-32 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/construction-site.jpg') }}" class="w-full h-full object-cover" alt="Construction Site">
            <div class="absolute inset-0" style="background: rgba(0,0,0,0.75); z-index: 10;"></div>
        </div>

        <div class="absolute inset-0 z-10 opacity-20"
            style="background: radial-gradient(ellipse at top left, rgba(204,0,0,0.3) 0%, transparent 60%)">
        </div>

        <div class="container-sbk relative z-20">
            <span class="section-tag text-sbk-red" data-reveal="fade-up">Tentang Kami</span>

            <h1 class="section-title text-white mt-2 text-5xl lg:text-6xl" data-reveal="fade-up" data-delay="100">
                Mengenal Lebih Jauh<br><span>Sastra Bhinneka Karya</span>
            </h1>

            <div class="flex items-center gap-3 mt-6" data-reveal="fade-up" data-delay="200">
                <a href="{{ route('home') }}" class="text-gray-400 text-sm hover:text-white transition-colors">
                    Beranda
                </a>
                <span class="text-sbk-red">/</span>
                <span class="text-white text-sm">Tentang Kami</span>
            </div>
        </div>
    </section>

    {{-- Profile --}}
    <section class="section-padding bg-white">
        <div class="container-sbk">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="relative" data-reveal="fade-right">
                    <div class="bg-sbk-gray-light rounded-3xl p-10 flex items-center justify-center min-h-80">
                        <img src="{{ $companyLogo }}" alt="SBK Logo" class="max-w-xs w-full object-contain" loading="lazy"
                            onerror="this.onerror=null;this.src='{{ asset('images/logo.jpg') }}';">
                    </div>

                    <div class="absolute -bottom-6 left-8 bg-sbk-red rounded-2xl px-7 py-4 shadow-red-lg">
                        <p class="font-heading font-black text-3xl text-white">5+</p>
                        <p class="text-white/70 text-xs uppercase tracking-wider">Tahun Pengalaman</p>
                    </div>
                </div>

                <div class="space-y-6" data-reveal="fade-left" data-delay="200">
                    <span class="section-tag">Profil Perusahaan</span>

                    <h2 class="section-title mt-2">
                        PT Sastra<br>
                        <span>Bhinneka Karya</span>
                    </h2>

                    <p class="text-gray-500 leading-relaxed">
                        {{ $company?->description ?? '-' }}
                    </p>

                    @if (!empty($company?->history))
                        <p class="text-gray-500 leading-relaxed">
                            {{ $company->history }}
                        </p>
                    @endif

                    <div class="flex items-center gap-3 pt-2">
                        <div class="w-10 h-10 bg-sbk-red/10 rounded-xl flex items-center justify-center">
                            <svg class="w-5 h-5 text-sbk-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>

                        <span class="text-gray-600 text-sm">
                            {{ $company?->address ?? 'Jl. Merak No. 78 Sukamulya, Kab. Tangerang, Banten 15612' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Visi Misi --}}
    <section class="section-padding bg-sbk-gray-light">
        <div class="container-sbk">
            <div class="text-center mb-14" data-reveal="fade-up">
                <span class="section-tag justify-center">Visi & Misi</span>
                <h2 class="section-title mt-2">Landasan <span>Kami Berkarya</span></h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Visi --}}
                <div class="bg-white rounded-3xl p-10 shadow-soft" data-reveal="fade-right" data-delay="100">
                    <div class="w-14 h-14 bg-sbk-red rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>

                    <h3 class="font-heading font-bold text-xl text-sbk-black mb-4">Visi</h3>
                    <div class="w-8 h-1 bg-sbk-red mb-4"></div>

                    <p class="text-gray-500 leading-relaxed">
                        {{ $company?->vision ?? 'Menjadi perusahaan konsultasi terkemuka yang memberikan solusi inovatif dan berkualitas tinggi.' }}
                    </p>
                </div>

                {{-- Misi --}}
                <div class="bg-sbk-red rounded-3xl p-10 shadow-red" data-reveal="fade-left" data-delay="200">
                    <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>

                    <h3 class="font-heading font-bold text-xl text-white mb-4">Misi</h3>
                    <div class="w-8 h-1 bg-white/50 mb-4"></div>

                    @php
                        $missions = $normalizeArray($company?->mission ?? []);
                    @endphp

                    <ul class="space-y-3">
                        @forelse ($missions as $m)
                            @php
                                $missionText = is_array($m)
                                    ? $m['item'] ?? ($m['title'] ?? ($m['description'] ?? '-'))
                                    : $m;
                            @endphp

                            <li class="flex items-start gap-3 text-white/90 text-sm">
                                <div
                                    class="w-5 h-5 bg-white/20 rounded-full flex-shrink-0 flex items-center justify-center mt-0.5">
                                    <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                    </svg>
                                </div>
                                <span>{{ $missionText }}</span>
                            </li>
                        @empty
                            <li class="text-white/70 text-sm italic">Belum ada data misi</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats --}}
    <section class="py-16 bg-sbk-black relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 15px); background-size: 20px 20px;">
        </div>

        <div class="container-sbk relative">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                @foreach ([[$totalClients . '+', 'Klien Aktif'], ['50+', 'Proyek Selesai'], [$totalServices . '+', 'Jenis Layanan'], ['5+', 'Tahun Pengalaman']] as $i => $s)
                    <div class="group" data-reveal="fade-up" data-delay="{{ $i * 100 }}">
                        <p
                            class="font-heading font-black text-5xl lg:text-6xl text-white group-hover:scale-110 transition-transform duration-300">
                            {{ $s[0] }}
                        </p>

                        <p class="text-white/70 text-xs uppercase tracking-widest mt-2 font-semibold">
                            {{ $s[1] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Nilai Perusahaan --}}
    <section class="section-padding bg-white">
        <div class="container-sbk">
            <div class="text-center mb-14" data-reveal="fade-up">
                <span class="section-tag justify-center">Nilai Kami</span>
                <h2 class="section-title mt-2">Mengapa Memilih <span>Kami</span></h2>
            </div>

            @php
                $defaultValues = [
                    [
                        'title' => 'Profesional',
                        'description' => 'Kami bekerja dengan standar profesionalisme tertinggi di setiap proyek',
                        'icon' => 'shield',
                    ],
                    [
                        'title' => 'Berpengalaman',
                        'description' => 'Tim kami terdiri dari para ahli dengan pengalaman bertahun-tahun',
                        'icon' => 'briefcase',
                    ],
                    [
                        'title' => 'Terpercaya',
                        'description' => 'Rekam jejak terbukti dengan 12+ klien perusahaan besar Indonesia',
                        'icon' => 'users',
                    ],
                    [
                        'title' => 'Inovatif',
                        'description' => 'Selalu menghadirkan solusi terbaru sesuai regulasi dan teknologi terkini',
                        'icon' => 'bolt',
                    ],
                ];

                $values = $normalizeArray($company?->values ?? []);

                if (empty($values)) {
                    $values = $defaultValues;
                }

                $icons = [
                    'shield' =>
                        'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    'briefcase' =>
                        'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',
                    'users' =>
                        'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
                    'bolt' => 'M13 10V3L4 14h7v7l9-11h-7z',
                ];
            @endphp

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($values as $i => $v)
                    @php
                        $iconKey = is_array($v) ? $v['icon'] ?? 'shield' : 'shield';
                        $iconPath = $icons[$iconKey] ?? $icons['shield'];
                        $title = is_array($v) ? $v['title'] ?? '-' : $v;
                        $desc = is_array($v) ? $v['description'] ?? '' : '';
                    @endphp

                    <div class="bg-sbk-gray-light rounded-2xl p-8 text-center hover:shadow-card transition-all duration-300 hover:-translate-y-1"
                        data-reveal="fade-up" data-delay="{{ $i * 100 }}">
                        <div class="w-14 h-14 bg-sbk-red rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="{{ $iconPath }}" />
                            </svg>
                        </div>

                        <div class="w-8 h-0.5 bg-sbk-red/30 mx-auto mb-5"></div>

                        <h3 class="font-heading font-bold text-sbk-black mb-3">{{ $title }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-16 bg-sbk-red relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 15px);background-size: 20px 20px;">
        </div>

        <div class="absolute -top-24 -left-24 w-72 h-72 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-24 -right-24 w-72 h-72 bg-black/10 rounded-full"></div>

        <div class="container-sbk relative z-10">
            <div class="max-w-2xl mx-auto text-center space-y-6" data-reveal="fade-up">
                <span
                    class="inline-block bg-white/20 text-white text-xs font-bold uppercase tracking-widest px-4 py-2 rounded-full">
                    Konsultasi Gratis
                </span>

                <h2 class="font-heading font-black text-4xl lg:text-5xl text-white leading-tight">
                    Siap Bekerja Sama?
                </h2>

                <p class="text-white/80 text-base leading-relaxed">
                    Hubungi kami sekarang dan konsultasikan kebutuhan bisnis Anda bersama tim ahli kami.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2">
                    <a href="https://wa.me/{{ $waNumber }}?text={{ $waText }}" target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-3 bg-white text-sbk-red font-bold px-10 py-4 rounded-2xl hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-lg whitespace-nowrap">
                        <svg class="w-5 h-5 flex-shrink-0" style="color: #25D366" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        Hubungi Kami Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
