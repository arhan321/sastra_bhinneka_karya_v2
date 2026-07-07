@extends('layouts.app')
@section('title', 'Layanan')

@section('content')

    {{-- Hero --}}
    <section class="bg-sbk-black py-32 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/construction-site.jpg') }}" class="w-full h-full object-cover" alt="">
            <div class="absolute inset-0" style="background: rgba(0,0,0,0.75); z-index: 10;"></div>
        </div>
        <div class="container-sbk relative z-20">
            <span class="section-tag text-sbk-red">Layanan Kami</span>
            <h1 class="section-title text-white mt-2 text-5xl lg:text-6xl">
                Jasa Konsultasi<br><span>Profesional</span>
            </h1>
            <div class="flex items-center gap-3 mt-6">
                <a href="{{ route('home') }}" class="text-gray-400 text-sm hover:text-white transition-colors">Beranda</a>
                <span class="text-sbk-red">/</span>
                <span class="text-white text-sm">Layanan</span>
            </div>
        </div>
    </section>

    {{-- Konstruksi --}}
    <section id="konstruksi" class="section-padding bg-white">
        <div class="container-sbk">
            <div class="mb-12">
                <span class="section-tag">Jasa Konstruksi</span>
                <h2 class="section-title mt-2">Jasa Konsultasi <span>Konstruksi</span></h2>
            </div>

            <div class="space-y-3" x-data="{ open: null }">
                @foreach ($construction as $i => $service)
                    <div id="service-{{ $service->id }}"
                        class="border border-gray-100 rounded-2xl overflow-hidden hover:border-sbk-red/30 transition-colors duration-300"
                        x-data>
                        <button @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                            class="w-full flex items-center justify-between p-6 text-left group">
                            <div class="flex items-center gap-4">
                                <span class="text-sbk-red/30 font-heading font-black text-2xl w-10">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <div>
                                    <span
                                        class="inline-block bg-sbk-red/10 text-sbk-red text-xs font-bold px-3 py-1 rounded-full mb-2">
                                        Konstruksi
                                    </span>
                                    <h3
                                        class="font-heading font-bold text-sbk-black text-lg group-hover:text-sbk-red transition-colors">
                                        {{ $service->title }}
                                    </h3>
                                </div>
                            </div>
                            <div class="w-8 h-8 bg-sbk-gray-light rounded-full flex items-center justify-center flex-shrink-0 ml-4
                                transition-all duration-300"
                                :class="open === {{ $i }} ? 'bg-sbk-red rotate-45' : ''">
                                <svg class="w-4 h-4 transition-colors"
                                    :class="open === {{ $i }} ? 'text-white' : 'text-gray-400'" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                        </button>

                        <div x-show="open === {{ $i }}" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0" class="px-6 pb-6" style="display:none;">
                            <div class="pl-14 border-t border-gray-100 pt-5">
                                @if ($service->image_path)
                                    <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}"
                                        class="w-full h-48 object-cover rounded-xl mb-5">
                                @endif
                                <div class="prose prose-sm max-w-none text-gray-500 leading-relaxed">
                                    {!! $service->description ?? 'Layanan profesional yang didukung oleh tim ahli berpengalaman.' !!}
                                </div>
                                <a href="https://api.whatsapp.com/send?phone=6281312023435&text={{ urlencode('Halo Tim Sastra Bhinneka Karya, saya tertarik dengan layanan ' . $service->title . ' dan ingin konsultasi lebih lanjut.') }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 mt-5 text-sbk-red font-bold text-sm hover:gap-3 transition-all">
                                    Konsultasi Sekarang →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Non-Konstruksi --}}
    <section id="non-konstruksi" class="section-padding bg-sbk-gray-light">
        <div class="container-sbk">
            <div class="mb-12">
                <span class="section-tag">Non-Konstruksi</span>
                <h2 class="section-title mt-2">Jasa Konsultasi <span>Non-Konstruksi</span></h2>
            </div>

            <div class="space-y-3" x-data="{ open: null }">
                @foreach ($nonConstruction as $i => $service)
                    <div id="service-{{ $service->id }}"
                        class="border border-gray-200 bg-white rounded-2xl overflow-hidden hover:border-sbk-red/30 transition-colors duration-300">
                        <button @click="open === {{ $i }} ? open = null : open = {{ $i }}"
                            class="w-full flex items-center justify-between p-6 text-left group">
                            <div class="flex items-center gap-4">
                                <span class="text-sbk-red/30 font-heading font-black text-2xl w-10">
                                    {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                                </span>
                                <div>
                                    <span
                                        class="inline-block bg-sbk-red/10 text-sbk-red text-xs font-bold px-3 py-1 rounded-full mb-2">
                                        Non-Konstruksi
                                    </span>
                                    <h3
                                        class="font-heading font-bold text-sbk-black text-lg group-hover:text-sbk-red transition-colors">
                                        {{ $service->title }}
                                    </h3>
                                </div>
                            </div>
                            <div class="w-8 h-8 bg-sbk-gray-light rounded-full flex items-center justify-center flex-shrink-0 ml-4
                                transition-all duration-300"
                                :class="open === {{ $i }} ? 'bg-sbk-red rotate-45' : ''">
                                <svg class="w-4 h-4 transition-colors"
                                    :class="open === {{ $i }} ? 'text-white' : 'text-gray-400'" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4v16m8-8H4" />
                                </svg>
                            </div>
                        </button>

                        <div x-show="open === {{ $i }}" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0" class="px-6 pb-6" style="display:none;">
                            <div class="pl-14 border-t border-gray-100 pt-5">
                                @if ($service->image_path)
                                    <img src="{{ Storage::url($service->image_path) }}" alt="{{ $service->title }}"
                                        class="w-full h-48 object-cover rounded-xl mb-5">
                                @endif
                                <div class="prose prose-sm max-w-none text-gray-500 leading-relaxed">
                                    {!! $service->description ?? 'Layanan profesional yang didukung oleh tim ahli berpengalaman.' !!}
                                </div>
                                <a href="https://api.whatsapp.com/send?phone=6281312023435&text={{ urlencode('Halo Tim Sastra Bhinneka Karya, saya tertarik dengan layanan ' . $service->title . ' dan ingin konsultasi lebih lanjut.') }}"
                                    target="_blank"
                                    class="inline-flex items-center gap-2 mt-5 text-sbk-red font-bold text-sm hover:gap-3 transition-all">
                                    Konsultasi Sekarang →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
