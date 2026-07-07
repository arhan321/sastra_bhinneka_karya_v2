@extends('layouts.app')
@section('title', $setting->meta_title)
@section('meta_description', $setting->meta_description)

@section('content')

    @php
        $heroImage = $setting->hero_background_image
            ? Storage::url($setting->hero_background_image)
            : asset('images/bg.jpeg');

        $aboutImage = $setting->about_image ? Storage::url($setting->about_image) : asset('images/bg.jpeg');

        $logoImage = asset('images/logo-sbk.png');

        $waUrl =
            'https://api.whatsapp.com/send?phone=' .
            $setting->hero_whatsapp_number .
            '&text=' .
            urlencode($setting->hero_whatsapp_message);
    @endphp

    {{-- ===== HERO ===== --}}
    <section class="relative min-h-screen flex items-center bg-sbk-black overflow-x-hidden" x-data="{
        current: 0,
        total: {{ $heroImages->count() > 0 ? $heroImages->count() : 1 }},
        timer: null,
        init() {
            if (this.total > 1) {
                this.timer = setInterval(() => {
                    this.current = (this.current + 1) % this.total;
                }, 5000);
            }
        }
    }">

        <div class="absolute inset-0 z-0">

            {{-- Slideshow: pakai hero_images dari DB --}}
            @if ($heroImages->count())
                @foreach ($heroImages as $idx => $heroImg)
                    <div x-show="current === {{ $idx }}" x-transition:enter="transition-opacity duration-1000"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" class="absolute inset-0"
                        {{ $idx === 0 ? '' : 'style=display:none' }}>
                        <img src="{{ Storage::url($heroImg->image_path) }}" alt="" width="1920" height="1080"
                            sizes="100vw" loading="{{ $idx === 0 ? 'eager' : 'lazy' }}"
                            fetchpriority="{{ $idx === 0 ? 'high' : 'auto' }}" decoding="async" aria-hidden="true"
                            class="w-full h-full object-cover grayscale-[20%] brightness-[0.8]">
                    </div>
                @endforeach
            @else
                {{-- Fallback: pakai foto dari homepage_settings --}}
                <img src="{{ $heroImage }}" alt="" width="1920" height="1080" sizes="100vw" loading="eager"
                    fetchpriority="high" decoding="async" aria-hidden="true"
                    class="w-full h-full object-cover grayscale-[20%] brightness-[0.8]">
            @endif

            <div class="absolute inset-0" style="background: rgba(0,0,0,0.7); z-index: 10;"></div>
            <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-sbk-red/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-1/4 right-1/3 w-64 h-64 bg-sbk-red/5 rounded-full blur-2xl"></div>
            <div class="absolute top-1/3 left-1/4 w-48 h-48 bg-white/2 rounded-full blur-2xl"></div>

            {{-- Dot indicator --}}
            @if ($heroImages->count() > 1)
                <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex gap-2 z-20">
                    @foreach ($heroImages as $idx => $heroImg)
                        <button
                            @click="current = {{ $idx }}; clearInterval(timer); timer = setInterval(() => { current = (current + 1) % total; }, 5000)"
                            :class="current === {{ $idx }} ? 'bg-white w-6' : 'bg-white/40 w-2'"
                            class="h-2 rounded-full transition-all duration-300 cursor-pointer">
                        </button>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="absolute inset-0"
            style="background-image: linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
      linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
      background-size: 60px 60px;">
        </div>

        <div class="container-sbk relative z-10 py-16 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                {{-- Left --}}
                <div class="space-y-8">
                    <div data-reveal="fade-down"
                        class="inline-flex items-center gap-3 bg-sbk-red/10 border border-sbk-red/20 rounded-full px-5 py-2">
                        <div class="w-2 h-2 bg-sbk-red rounded-full animate-pulse"></div>
                        <span class="text-sbk-red font-semibold text-xs uppercase tracking-widest">
                            {{ $setting->hero_badge_text }}
                        </span>
                    </div>

                    <div data-reveal="fade-up" data-delay="100">
                        <h1 class="font-heading font-black leading-[1.0] mb-2">
                            <span
                                class="block text-white text-4xl sm:text-5xl lg:text-7xl">{{ $setting->hero_title_line1 }}</span>
                            <span
                                class="block text-sbk-red text-4xl sm:text-5xl lg:text-7xl">{{ $setting->hero_title_line2 }}</span>
                            <span
                                class="block text-white text-4xl sm:text-5xl lg:text-7xl">{{ $setting->hero_title_line3 }}</span>
                        </h1>
                    </div>

                    <p data-reveal="fade-up" data-delay="200"
                        class="text-gray-300 text-lg italic font-light border-l-2 border-sbk-red pl-4">
                        "{{ $setting->hero_tagline }}"
                    </p>

                    <p data-reveal="fade-up" data-delay="300" class="text-gray-400 leading-relaxed max-w-lg">
                        {{ $setting->hero_description }}
                    </p>

                    <div data-reveal="fade-up" data-delay="400"
                        class="grid grid-cols-3 gap-6 py-6 border-y border-white/10">
                        @foreach ([[$setting->stat_clients . '+', $setting->stat_clients_label], [$setting->stat_projects . '+', $setting->stat_projects_label], [$setting->stat_services . '+', $setting->stat_services_label]] as $s)
                            <div class="text-center">
                                <p class="font-heading font-black text-4xl text-sbk-red">{{ $s[0] }}</p>
                                <p class="text-gray-500 text-xs uppercase tracking-widest mt-1">{{ $s[1] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div data-reveal="fade-up" data-delay="500" class="flex flex-wrap gap-4">
                        <a href="{{ route('services') }}" class="btn-primary text-sm">
                            {{ $setting->hero_btn_primary_text }}
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                        <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                            class="btn-outline border-white/20 text-white hover:border-sbk-red">
                            {{ $setting->hero_btn_secondary_text }}
                        </a>
                    </div>
                </div>

                {{-- Right --}}
                <div data-reveal="fade-left" data-delay="300" class="hidden lg:block relative h-[420px]">
                    <div
                        class="relative bg-gradient-to-br from-white/5 to-white/0 backdrop-blur-sm border border-white/10 rounded-3xl p-10 text-center h-full flex items-center justify-center">
                        {{-- SESUDAH --}}
                        @php
                            $displayLogo = $setting->hero_logo_image
                                ? Storage::url($setting->hero_logo_image)
                                : asset('images/logo-sbk.png');
                        @endphp

                        <img src="{{ $displayLogo }}" alt="Logo PT Sastra Bhinneka Karya" width="256" height="256"
                            loading="eager" decoding="async" class="w-64 h-64 object-contain mx-auto animate-float"
                            style="mix-blend-mode: lighten; filter: drop-shadow(0 0 30px rgba(220,38,38,0.4));">
                        <div class="absolute -top-6 -left-6 bg-sbk-red rounded-2xl px-5 py-3">
                            <p class="text-white font-heading font-black text-2xl">{{ $setting->stat_clients }}+</p>
                            <p class="text-white/70 text-xs">{{ $setting->stat_clients_label }}</p>
                        </div>
                        <div class="absolute -bottom-6 -right-6 bg-white rounded-2xl px-5 py-3">
                            <p class="text-sbk-red font-heading font-black text-2xl">{{ $setting->stat_projects }}+</p>
                            <p class="text-gray-500 text-xs">{{ $setting->stat_projects_label }}</p>
                        </div>
                        <div
                            class="absolute top-1/2 -translate-y-1/2 -right-8 bg-sbk-dark border border-white/10 rounded-2xl px-5 py-3">
                            <p class="text-white font-heading font-black text-2xl">{{ $setting->stat_services }}+</p>
                            <p class="text-gray-400 text-xs">{{ $setting->stat_services_label }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== ABOUT SNIPPET ===== --}}
    <section class="section-padding bg-white">
        <div class="container-sbk">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div data-reveal="fade-right" class="relative">
                    <div class="rounded-3xl overflow-hidden h-[420px]">
                        <img src="{{ $aboutImage }}" alt="Tim PT Sastra Bhinneka Karya di area proyek konstruksi"
                            width="900" height="630" sizes="(min-width: 1024px) 50vw, 100vw" loading="lazy"
                            decoding="async" class="w-full h-full object-cover object-center">
                        <div
                            class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent rounded-3xl">
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6 bg-sbk-red rounded-2xl px-7 py-4 shadow-red-lg">
                        <p x-data="counter({{ $setting->stat_years }})" x-intersect="start()" x-text="count + '+'"
                            class="font-heading font-black text-3xl text-white">
                        </p>
                        <p class="text-white/70 text-xs uppercase tracking-wider">{{ $setting->stat_years_label }}</p>
                    </div>
                    <div class="absolute -top-4 -right-4 w-20 h-20 border-4 border-sbk-red/30 rounded-2xl -z-10"></div>
                    <div class="absolute -bottom-4 -left-4 w-16 h-16 bg-sbk-red/10 rounded-2xl -z-10"></div>
                </div>

                <div data-reveal="fade-left" data-delay="200" class="space-y-6">
                    <div>
                        <span class="section-tag">{{ $setting->about_section_tag }}</span>
                        <h2 class="section-title mt-2">
                            {{ $setting->about_title }}
                        </h2>
                    </div>
                    <p class="text-gray-500 leading-relaxed">
                        {{ $setting->about_description }}
                    </p>
                    <div class="grid grid-cols-2 gap-3">
                        @foreach (is_array($setting->about_highlights) ? $setting->about_highlights : explode("\n", $setting->about_highlights ?? '') as $p)
                            <div class="flex items-center gap-3 bg-sbk-gray-light rounded-xl p-3">
                                <div class="w-7 h-7 bg-sbk-red rounded-lg flex-shrink-0 flex items-center justify-center">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-sbk-black text-sm">{{ $p }}</span>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{ route('about') }}" class="btn-ghost">
                        Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== STATS BANNER ===== --}}
    <section class="py-16 bg-sbk-red relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 15px);
               background-size: 20px 20px;">
        </div>
        <div class="container-sbk relative">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                @foreach ([[$setting->stat_clients, $setting->stat_clients_label], [$setting->stat_projects, $setting->stat_projects_label], [$setting->stat_services, $setting->stat_services_label], [$setting->stat_years, $setting->stat_years_label]] as $i => $s)
                    <div data-reveal="fade-up" data-delay="{{ ($i + 1) * 100 }}" class="group">
                        <p
                            class="font-heading font-black text-5xl lg:text-6xl text-white group-hover:scale-110 transition-transform duration-300">
                            {{ $s[0] }}+
                        </p>
                        <p class="text-white/70 text-xs uppercase tracking-widest mt-2 font-semibold">{{ $s[1] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== SERVICES ===== --}}
    <section class="section-padding bg-sbk-black" x-data="{ tab: 'konstruksi' }">
        <div class="container-sbk">
            <div data-reveal="fade-up" class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-6">
                <div>
                    <span class="section-tag">Layanan Kami</span>
                    <h2 class="section-title mt-2 text-white">
                        Apa yang Bisa<br><span>Kami Lakukan</span>
                    </h2>
                </div>
                <a href="{{ route('services') }}"
                    class="btn-outline border-white/20 text-white hover:border-sbk-red self-start whitespace-nowrap">
                    Semua Layanan →
                </a>
            </div>

            <div data-reveal="fade-up" data-delay="200" class="inline-flex bg-white/10 rounded-full p-1.5 mb-10">
                <button @click="tab = 'konstruksi'"
                    :class="tab === 'konstruksi' ? 'bg-sbk-red text-white' : 'text-white/60 hover:text-white'"
                    class="px-7 py-2.5 rounded-full text-sm font-bold transition-all duration-300">
                    Konstruksi
                </button>
                <button @click="tab = 'non'"
                    :class="tab === 'non' ? 'bg-sbk-red text-white' : 'text-white/60 hover:text-white'"
                    class="px-7 py-2.5 rounded-full text-sm font-bold transition-all duration-300">
                    Non-Konstruksi
                </button>
            </div>

            {{-- Konstruksi --}}
            <div x-show="tab === 'konstruksi'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($services->where('category', 'construction') as $i => $service)
                        <a data-reveal="fade-up" data-delay="{{ (($i % 3) + 1) * 100 }}"
                            href="{{ route('services') }}#service-{{ $service->id }}"
                            class="group bg-sbk-gray rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 flex flex-col">
                            <div
                                class="relative h-44 overflow-hidden flex-shrink-0 bg-gradient-to-br from-gray-800 to-sbk-black">
                                @if ($service->image_path)
                                    <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}"
                                        width="640" height="352"
                                        sizes="(min-width: 1024px) 33vw, (min-width: 768px) 50vw, 100vw" loading="lazy"
                                        decoding="async"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-800 to-sbk-black"></div>
                                    <div class="absolute inset-0 opacity-10"
                                        style="background-image: repeating-linear-gradient(45deg,#CC0000 0,#CC0000 1px,transparent 0,transparent 15px);background-size:20px 20px;">
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3 bg-black/40 backdrop-blur-sm rounded-lg px-2 py-1">
                                    <span
                                        class="text-white/70 font-heading font-black text-sm">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="absolute top-3 right-3">
                                    <span
                                        class="bg-sbk-red text-white text-xs font-bold px-2.5 py-1 rounded-full">Konstruksi</span>
                                </div>
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <h3
                                    class="font-heading font-bold text-white text-base mb-2 group-hover:text-sbk-red transition-colors leading-snug">
                                    {{ $service->title }}</h3>
                                <div class="w-8 h-0.5 bg-sbk-red mb-3"></div>
                                <p class="text-gray-400 text-sm leading-relaxed flex-1 line-clamp-2">
                                    {{ Str::limit(strip_tags($service->description), 80) ?? '-' }}</p>
                                <div
                                    class="flex items-center gap-1.5 mt-4 text-sbk-red text-xs font-bold uppercase tracking-widest group-hover:gap-3 transition-all duration-300">
                                    Pelajari
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-white/40 col-span-3 text-center py-10">Belum ada layanan konstruksi</p>
                    @endforelse
                </div>
            </div>

            {{-- Non-Konstruksi --}}
            <div x-show="tab === 'non'" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
                style="display:none;">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($services->where('category', 'non-construction') as $i => $service)
                        <a data-reveal="fade-up" data-delay="{{ (($i % 3) + 1) * 100 }}"
                            href="{{ route('services') }}#service-{{ $service->id }}"
                            class="group bg-sbk-gray rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 flex flex-col">
                            <div
                                class="relative h-44 overflow-hidden flex-shrink-0 bg-gradient-to-br from-gray-800 to-sbk-black">
                                @if ($service->image_path)
                                    <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}"
                                        width="640" height="352"
                                        sizes="(min-width: 1024px) 33vw, (min-width: 768px) 50vw, 100vw" loading="lazy"
                                        decoding="async"
                                        class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-gray-800 to-sbk-black"></div>
                                    <div class="absolute inset-0 opacity-10"
                                        style="background-image: repeating-linear-gradient(45deg,#CC0000 0,#CC0000 1px,transparent 0,transparent 15px);background-size:20px 20px;">
                                    </div>
                                @endif
                                <div class="absolute top-3 left-3 bg-black/40 backdrop-blur-sm rounded-lg px-2 py-1">
                                    <span
                                        class="text-white/70 font-heading font-black text-sm">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                </div>
                                <div class="absolute top-3 right-3">
                                    <span
                                        class="bg-sbk-red/80 text-white text-xs font-bold px-2.5 py-1 rounded-full">Non-Konstruksi</span>
                                </div>
                            </div>
                            <div class="p-6 flex flex-col flex-1">
                                <h3
                                    class="font-heading font-bold text-white text-base mb-2 group-hover:text-sbk-red transition-colors leading-snug">
                                    {{ $service->title }}</h3>
                                <div class="w-8 h-0.5 bg-sbk-red mb-3"></div>
                                <p class="text-gray-400 text-sm leading-relaxed flex-1 line-clamp-2">
                                    {{ Str::limit(strip_tags($service->description), 80) ?? '-' }}</p>
                                <div
                                    class="flex items-center gap-1.5 mt-4 text-sbk-red text-xs font-bold uppercase tracking-widest group-hover:gap-3 transition-all duration-300">
                                    Pelajari
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p class="text-white/40 col-span-3 text-center py-10">Belum ada layanan non-konstruksi</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    {{-- ===== CLIENTS MARQUEE ===== --}}
    <section class="section-padding bg-white overflow-hidden">
        <div data-reveal="fade-up" class="container-sbk mb-12 text-center">
            <span class="section-tag justify-center">Klien Kami</span>
            <h2 class="section-title mt-2">
                Dipercaya oleh<br><span>Perusahaan Terkemuka</span>
            </h2>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto text-sm">
                Kami bangga telah melayani berbagai perusahaan besar di Indonesia.
            </p>
        </div>

        @php $clientList = $clients->count() ? $clients : collect([]); @endphp

        <div class="relative mb-4" x-data="{ paused: false }">
            <div
                class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
            </div>
            <div class="flex gap-4 marquee-left" :class="paused ? 'paused' : ''" @mouseenter="paused = true"
                @mouseleave="paused = false">
                @for ($r = 0; $r < 2; $r++)
                    @if ($clientList->count())
                        @foreach ($clientList as $client)
                            <div
                                class="flex-shrink-0 w-44 h-24 bg-white border border-gray-100 rounded-2xl flex items-center justify-center p-4 hover:border-sbk-red/30 hover:shadow-card transition-all duration-300 group cursor-pointer">
                                @if ($client->logo)
                                    <img src="{{ Storage::url($client->logo) }}" alt="Logo {{ $client->name }}"
                                        width="176" height="96" loading="lazy" decoding="async"
                                        class="max-h-12 max-w-full object-contain grayscale group-hover:grayscale-0 opacity-50 group-hover:opacity-100 transition-all duration-300">
                                @else
                                    <div class="text-center">
                                        <div
                                            class="w-10 h-10 bg-sbk-red/10 rounded-xl flex items-center justify-center mx-auto mb-1 group-hover:bg-sbk-red transition-colors">
                                            <span
                                                class="font-heading font-black text-sbk-red group-hover:text-white text-sm transition-colors">{{ strtoupper(substr($client->name, 3, 1)) }}</span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        @foreach (['NSI', 'WC', 'YLI', 'HIS', 'HRE', 'TB', 'GSI', 'ICM', 'AMU', 'SIX', 'ABI', 'SCM'] as $abbr)
                            <div
                                class="flex-shrink-0 w-44 h-24 bg-white border border-gray-100 rounded-2xl flex items-center justify-center p-4 hover:border-sbk-red/30 hover:shadow-card transition-all duration-300 group">
                                <div
                                    class="w-10 h-10 bg-sbk-red/10 rounded-xl flex items-center justify-center group-hover:bg-sbk-red transition-colors">
                                    <span
                                        class="font-heading font-black text-sbk-red group-hover:text-white text-sm transition-colors">{{ $abbr[0] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endfor
            </div>
        </div>

        <div class="relative" x-data="{ paused: false }">
            <div
                class="absolute left-0 top-0 bottom-0 w-24 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
            </div>
            <div
                class="absolute right-0 top-0 bottom-0 w-24 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
            </div>
            <div class="flex gap-4 marquee-right" :class="paused ? 'paused' : ''" @mouseenter="paused = true"
                @mouseleave="paused = false">
                @for ($r = 0; $r < 2; $r++)
                    @if ($clientList->count())
                        @foreach ($clientList->reverse() as $client)
                            <div
                                class="flex-shrink-0 w-44 h-24 bg-sbk-gray-light border border-transparent rounded-2xl flex items-center justify-center p-4 hover:bg-white hover:border-sbk-red/20 hover:shadow-card transition-all duration-300 group cursor-pointer">
                                @if ($client->logo)
                                    <img src="{{ Storage::url($client->logo) }}" alt="Logo {{ $client->name }}"
                                        width="176" height="96" loading="lazy" decoding="async"
                                        class="max-h-12 max-w-full object-contain grayscale group-hover:grayscale-0 opacity-50 group-hover:opacity-100 transition-all duration-300">
                                @else
                                    <div
                                        class="w-10 h-10 bg-sbk-red/10 rounded-xl flex items-center justify-center group-hover:bg-sbk-red transition-colors">
                                        <span
                                            class="font-heading font-black text-sbk-red group-hover:text-white text-sm transition-colors">{{ strtoupper(substr($client->name, 3, 1)) }}</span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        @foreach (['SCM', 'ABI', 'SIX', 'AMU', 'ICM', 'GSI', 'TB', 'HRE', 'HIS', 'YLI', 'WC', 'NSI'] as $abbr)
                            <div
                                class="flex-shrink-0 w-44 h-24 bg-sbk-gray-light border border-transparent rounded-2xl flex items-center justify-center p-4 hover:bg-white hover:border-sbk-red/20 hover:shadow-card transition-all duration-300 group">
                                <div
                                    class="w-10 h-10 bg-sbk-red/10 rounded-xl flex items-center justify-center group-hover:bg-sbk-red transition-colors">
                                    <span
                                        class="font-heading font-black text-sbk-red group-hover:text-white text-sm transition-colors">{{ $abbr[0] }}</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endfor
            </div>
        </div>
    </section>

 {{-- ===== PORTFOLIO ===== --}}
    <section class="section-padding bg-sbk-gray-light">
        <div class="container-sbk">
            <div data-reveal="fade-up" class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="section-tag">Portofolio</span>
                    <h2 class="section-title mt-2">
                        Rekam Jejak<br><span>Pekerjaan Kami</span>
                    </h2>
                </div>
                <a href="{{ route('portfolio') }}" class="btn-outline self-start">
                    Semua Portofolio
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>

            @php
                $defaultPortfolios = [
                    ['VERIFIKASI LAPANGAN', 'PT National Steel Industries', 'Januari 2026', 'Konstruksi', null],
                    ['Dokumen UKL-UPL', 'PT Youngil Leather Indonesia', 'Maret 2025', 'Lingkungan', null],
                    ['Dokumen PBMAL', 'PT Warnatama Cemerlang', 'Februari 2026', 'Air Limbah', null],
                    ['Dokumen RKL-RPL', 'PT Hengrun International', 'April 2026', 'Lingkungan', null],
                    ['Dokumen Andalalin', 'PT Huafa Real Estate', 'Mei 2025', 'Lalu Lintas', null],
                ];

                $rawItems = $portfolios->count()
                    ? $portfolios
                        ->map(
                            fn($p) => [
                                'name' => $p->document_name,
                                'client' => $p->client->name ?? '-',
                                'period' => $p->period ?? ($p->year ?? ''),
                                'category' => $p->document_category ?? '',
                                'image' => $p->images->first() ? Storage::url($p->images->first()->image_path) : null,
                                'url' => $p->id ? route('portfolio.show', $p->id) : route('portfolio'),
                            ],
                        )
                        ->values()
                        ->toArray()
                    : collect($defaultPortfolios)
                        ->map(
                            fn($p) => [
                                'name' => $p[0],
                                'client' => $p[1],
                                'period' => $p[2],
                                'category' => $p[3],
                                'image' => null,
                                'url' => route('portfolio'),
                            ],
                        )
                        ->values()
                        ->toArray();

                $original = $rawItems;
                while (count($rawItems) < 5) {
                    foreach ($original as $item) {
                        $rawItems[] = $item;
                        if (count($rawItems) >= 5) {
                            break;
                        }
                    }
                }
            @endphp

            <div x-data="{
                items: {{ Js::from($rawItems) }},
                current: 0,
                timer: null,
                interval: 3000,
                getItem(offset) {
                    return this.items[(this.current + offset) % this.items.length];
                },
                next() { this.current = (this.current + 1) % this.items.length; },
                prev() { this.current = (this.current - 1 + this.items.length) % this.items.length; },
                startTimer() { this.timer = setInterval(() => this.next(), this.interval); },
                stopTimer() { clearInterval(this.timer); },
                resetTimer() {
                    this.stopTimer();
                    this.startTimer();
                },
                init() { this.startTimer(); }
            }">
                {{-- Grid utama --}}
                <div class="flex flex-col lg:flex-row gap-3">

                    {{-- ===== FEATURED CARD (kiri besar) ===== --}}
                    <div class="relative rounded-xl overflow-hidden bg-sbk-black border border-white/5 cursor-pointer"
                        style="flex: 0 0 52%; min-height: 520px;" @mouseenter="stopTimer()" @mouseleave="startTimer()">
                        {{-- Stack semua gambar --}}
                        @foreach ($rawItems as $idx => $item)
                            @if ($item['image'])
                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="900"
                                    height="720" loading="{{ $idx === 0 ? 'eager' : 'lazy' }}" decoding="async"
                                    x-show="current === {{ $idx }}"
                                    x-transition:enter="transition-opacity duration-700 ease-in-out"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition-opacity duration-500 ease-in-out"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out"
                                    :class="current === {{ $idx }} ? 'scale-105' : 'scale-100'"
                                    style="z-index: 1;">
                            @else
                                <div x-show="current === {{ $idx }}"
                                    x-transition:enter="transition-opacity duration-700 ease-in-out"
                                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition-opacity duration-500 ease-in-out"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    class="absolute inset-0 bg-gradient-to-br from-sbk-gray to-sbk-black"
                                    style="z-index: 1;">
                                    <div class="absolute inset-0 opacity-10"
                                        style="background-image: repeating-linear-gradient(45deg,#CC0000 0,#CC0000 1px,transparent 0,transparent 15px);background-size:20px 20px;">
                                    </div>
                                </div>
                            @endif
                        @endforeach

                        {{-- Gradient overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"
                            style="z-index: 2;"></div>

                        {{-- Bottom content dengan hover slide up effect --}}
                        <div class="absolute bottom-0 left-0 right-0 p-8 transform transition-transform duration-500 ease-in-out translate-y-0 hover:translate-y-[-6px]"
                            style="z-index: 3;">
                            <div class="flex items-center gap-2 mb-3">
                                <span class="bg-sbk-red text-white text-xs font-bold px-3 py-1 rounded-full"
                                    x-text="getItem(0).period"></span>
                                <span x-show="getItem(0).category" x-text="getItem(0).category"
                                    class="bg-white/20 backdrop-blur-sm text-white text-xs font-semibold px-3 py-1 rounded-full"></span>
                            </div>
                            <h3 class="font-heading font-black text-white text-2xl lg:text-3xl leading-tight mb-2"
                                x-text="getItem(0).name"></h3>
                            <div class="w-10 h-0.5 bg-sbk-red mb-3"></div>
                            <p class="text-gray-300 text-sm" x-text="getItem(0).client"></p>
                        </div>

                        {{-- Arrow link --}}

                        :href="getItem(0).url"
                        class="absolute top-5 right-5 w-9 h-9 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-sbk-red transition-all duration-300"
                        style="z-index: 3;"
                        aria-label="Lihat portofolio"
                        >
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 17L17 7M17 7H7M17 7v10" />
                        </svg>
                        </a>
                    </div>

                    {{-- ===== SIDE CARDS (kanan 2x2) ===== --}}
                    <div class="grid grid-cols-2 gap-3" style="flex: 1;">
                        @foreach ([1, 2, 3, 4] as $offset)
                            <div class="group relative rounded-xl overflow-hidden bg-sbk-black border border-white/5 cursor-pointer"
                                style="min-height: 253px;" @mouseenter="stopTimer()" @mouseleave="startTimer()">
                                {{-- Stack semua gambar --}}
                                @foreach ($rawItems as $idx => $item)
                                    @if ($item['image'])
                                        <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="480"
                                            height="280" loading="lazy" decoding="async"
                                            x-show="(current + {{ $offset }}) % items.length === {{ $idx }}"
                                            x-transition:enter="transition-opacity duration-500 ease-in-out"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition-opacity duration-300 ease-in-out"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                            style="z-index: 1;">
                                    @else
                                        <div x-show="(current + {{ $offset }}) % items.length === {{ $idx }}"
                                            x-transition:enter="transition-opacity duration-500 ease-in-out"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="transition-opacity duration-300 ease-in-out"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="absolute inset-0 bg-gradient-to-br from-sbk-gray to-sbk-black"
                                            style="z-index: 1;"></div>
                                    @endif
                                @endforeach

                                {{-- Gradient overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent"
                                    style="z-index: 2;"></div>

                                {{-- Arrow link --}}

                                :href="getItem({{ $offset }}).url"
                                class="absolute top-4 right-4 w-8 h-8 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:bg-sbk-red transition-all duration-300 opacity-0 group-hover:opacity-100"
                                style="z-index: 3;"
                                aria-label="Lihat portofolio"
                                >
                                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 17L17 7M17 7H7M17 7v10" />
                                </svg>
                                </a>

                                {{-- Bottom content dengan hover slide up --}}
                                <div class="absolute bottom-0 left-0 right-0 p-4 transform transition-transform duration-500 ease-in-out group-hover:-translate-y-2"
                                    style="z-index: 3;">
                                    <span
                                        class="bg-sbk-red text-white text-xs font-bold px-2.5 py-1 rounded-full mb-2 inline-block"
                                        x-text="getItem({{ $offset }}).period"></span>
                                    <h4 class="font-heading font-bold text-white text-sm leading-snug mb-1"
                                        x-text="getItem({{ $offset }}).name"></h4>
                                    <p class="text-gray-300 text-xs" x-text="getItem({{ $offset }}).client"></p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                {{-- ===== NAV: prev/next + dots — centered di bawah seluruh grid ===== --}}
                <div class="flex items-center justify-center gap-4 mt-6">
                    <button @click="prev(); resetTimer()"
                        class="w-9 h-9 rounded-full border border-gray-400/30 flex items-center justify-center text-gray-500 hover:bg-sbk-red hover:border-sbk-red hover:text-white transition-all duration-200"
                        aria-label="Previous">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    <div class="flex gap-1.5">
                        @foreach ($rawItems as $idx => $item)
                            <button @click="current = {{ $idx }}; resetTimer()"
                                :class="current === {{ $idx }} ? 'bg-sbk-red w-5' : 'bg-gray-400/40 w-2'"
                                class="h-2 rounded-full transition-all duration-300"
                                aria-label="Portfolio {{ $idx + 1 }}"></button>
                        @endforeach
                    </div>

                    <button @click="next(); resetTimer()"
                        class="w-9 h-9 rounded-full border border-gray-400/30 flex items-center justify-center text-gray-500 hover:bg-sbk-red hover:border-sbk-red hover:text-white transition-all duration-200"
                        aria-label="Next">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </section>

    {{-- ===== TESTIMONIAL ===== --}}
    @if (isset($testimonials) && $testimonials->count())
        <section class="section-padding bg-white">
            <div class="container-sbk">
                <div data-reveal="fade-up" class="text-center mb-14">
                    <span class="section-tag justify-center">Testimoni</span>
                    <h2 class="section-title mt-2">Kata Mereka<br><span>tentang Kami</span></h2>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($testimonials->take(3) as $i => $t)
                        <div data-reveal="fade-up" data-delay="{{ ($i + 1) * 100 }}"
                            class="bg-sbk-gray-light rounded-2xl p-8 hover:shadow-card transition-all duration-300 group">
                            <div class="text-sbk-red text-5xl font-black leading-none mb-4">"</div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-6">{{ $t->content }}</p>
                            <div class="flex gap-1 mb-4">
                                @for ($star = 0; $star < $t->rating; $star++)
                                    <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                @endfor
                            </div>
                            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                                <div
                                    class="w-10 h-10 bg-sbk-red rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">{{ substr($t->client_name, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="font-bold text-sbk-black text-sm">{{ $t->client_name }}</p>
                                    @if ($t->position)
                                        <p class="text-gray-400 text-xs">{{ $t->position }} — {{ $t->company }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ===== CTA ===== --}}
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20"
            style="background: radial-gradient(ellipse at center, rgba(204,0,0,0.3) 0%, transparent 70%)"></div>
        <div data-reveal="fade-up" class="container-sbk text-center relative z-10">
            <div class="max-w-3xl mx-auto space-y-6">
                <span class="section-tag justify-center text-sbk-red">{{ $setting->cta_section_tag }}</span>
                @php
                    $ctaHighlight = $setting->cta_title_highlight;
                    $ctaPrefix = str_replace($ctaHighlight, '', $setting->cta_title);
                @endphp
                <h2 class="font-heading font-black text-4xl lg:text-6xl text-black mt-2">
                    {{ $ctaPrefix }}<span class="text-sbk-red">{{ $ctaHighlight }}</span>
                </h2>
                <p class="text-gray-400 text-lg leading-relaxed">
                    {{ $setting->cta_description }}
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2">
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                        class="inline-flex items-center justify-center gap-3 bg-white text-sbk-red font-bold px-10 py-4 rounded-2xl hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-lg whitespace-nowrap">
                        <svg class="w-5 h-5 flex-shrink-0" style="color: #25D366" fill="currentColor"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        {{ $setting->cta_btn_text }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== MAPS + CONTACT FORM ===== --}}
    <section id="hubungi-kami" class="section-padding bg-white">
        <div class="container-sbk">
            <div data-reveal="fade-up" class="text-center mb-12">
                <span class="section-tag justify-center">Hubungi Kami</span>
                <h2 class="section-title mt-2">Siap Bekerja Sama <span>dengan Kami?</span></h2>
            </div>
            <div class="grid lg:grid-cols-2 gap-10 items-stretch">
                <div data-reveal="fade-right" class="flex flex-col gap-6">
                    <div class="grid grid-cols-1 gap-4">
                        <div
                            class="bg-sbk-gray-light rounded-lg p-5 flex items-center gap-4 border border-gray-100 shadow-sm">
                            <div class="w-12 h-12 bg-sbk-red rounded-md flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sbk-black font-bold text-sm mb-0.5">Alamat</p>
                                <p class="text-gray-500 text-xs leading-relaxed">{{ $setting->contact_address }}</p>
                            </div>
                        </div>
                        <div
                            class="bg-sbk-gray-light rounded-lg p-5 flex items-center gap-4 border border-gray-100 shadow-sm">
                            <div class="w-12 h-12 bg-sbk-red rounded-md flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sbk-black font-bold text-sm mb-0.5">Telepon</p>
                                <a href="tel:+{{ preg_replace('/[^0-9]/', '', $setting->contact_phone) }}"
                                    class="text-gray-500 text-xs hover:text-sbk-red transition-colors">{{ $setting->contact_phone }}</a>
                            </div>
                        </div>
                        <div
                            class="bg-sbk-gray-light rounded-lg p-5 flex items-center gap-4 border border-gray-100 shadow-sm">
                            <div class="w-12 h-12 bg-sbk-red rounded-md flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sbk-black font-bold text-sm mb-0.5">Email</p>
                                <a href="mailto:{{ $setting->contact_email }}"
                                    class="text-gray-500 text-xs hover:text-sbk-red transition-colors break-all">{{ $setting->contact_email }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg overflow-hidden flex-1 min-h-[350px] border border-gray-200 shadow-sm">
                        <iframe src="{{ $setting->contact_maps_embed_url }}"
                            title="Lokasi PT Sastra Bhinneka Karya di Google Maps" width="100%" height="100%"
                            style="border:0; min-height: 350px; filter: grayscale(20%);" allowfullscreen=""
                            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div data-reveal="fade-left" data-delay="200"
                    class="bg-sbk-gray-light rounded-xl p-8 border border-gray-100 shadow-sm flex flex-col justify-center">
                    <h3 class="font-heading font-bold text-sbk-black text-xl mb-2">Kirim Pesan</h3>
                    <p class="text-gray-500 text-sm mb-6">Isi form di bawah dan tim kami akan segera menghubungi Anda.</p>
                    @if (session('success'))
                        <div class="bg-green-50 border border-green-200 text-green-700 rounded-lg px-4 py-3 mb-6 text-sm">
                            {{ session('success') }}</div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label
                                    class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">Nama</label>
                                <input type="text" name="name" required
                                    class="w-full bg-white border border-gray-200 rounded-md px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors"
                                    placeholder="Nama lengkap">
                            </div>
                            <div>
                                <label
                                    class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">Telepon</label>
                                <input type="text" name="phone"
                                    class="w-full bg-white border border-gray-200 rounded-md px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors"
                                    placeholder="08xx-xxxx-xxxx">
                            </div>
                        </div>
                        <div>
                            <label
                                class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">Email</label>
                            <input type="email" name="email" required
                                class="w-full bg-white border border-gray-200 rounded-md px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors"
                                placeholder="email@contoh.com">
                        </div>
                        <div>
                            <label
                                class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">Subjek</label>
                            <input type="text" name="subject"
                                class="w-full bg-white border border-gray-200 rounded-md px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors"
                                placeholder="Perihal pesan">
                        </div>
                        <div>
                            <label
                                class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">Pesan</label>
                            <textarea name="message" rows="5" required
                                class="w-full bg-white border border-gray-200 rounded-md px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors resize-none"
                                placeholder="Tuliskan pesan Anda..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-sbk-red text-white font-extrabold py-4 rounded-md hover:bg-red-700 transition-all duration-300 text-sm uppercase tracking-widest shadow-md">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
