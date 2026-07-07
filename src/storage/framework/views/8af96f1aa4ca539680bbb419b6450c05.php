<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <?php
        $siteName = 'PT Sastra Bhinneka Karya';

        $pageTitle = trim($__env->yieldContent('title', 'Jasa Konsultasi Konstruksi & Non-Konstruksi'));
        $fullTitle = $pageTitle . ' | ' . $siteName;

        $metaDescription = trim(
            $__env->yieldContent(
                'meta_description',
                'PT Sastra Bhinneka Karya adalah perusahaan jasa konsultasi konstruksi dan non-konstruksi untuk layanan perizinan, teknis, lingkungan, serta kebutuhan industri di Indonesia.',
            ),
        );

        $canonicalUrl = trim($__env->yieldContent('canonical', url()->current()));

        $ogImage = trim($__env->yieldContent('og_image', asset('images/og-sbk.jpg')));

        $robots = trim(
            $__env->yieldContent(
                'robots',
                'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            ),
        );
        $message = urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.');

        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'PT Sastra Bhinneka Karya',
            'url' => url('/'),
            'logo' => asset('images/logo-sbk.png'),
            'description' => $metaDescription,
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Jl. Merak No. 78 Sukamulya',
                'addressLocality' => 'Tangerang',
                'addressRegion' => 'Banten',
                'postalCode' => '15612',
                'addressCountry' => 'ID',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+62-813-1202-3435',
                'contactType' => 'customer service',
                'areaServed' => 'ID',
                'availableLanguage' => ['Indonesian'],
            ],
            'sameAs' => ['https://www.instagram.com/sastrabhinnekakarya'],
        ];
    ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <title><?php echo e($fullTitle); ?></title>
    <meta name="description" content="<?php echo e($metaDescription); ?>">
    <meta name="robots" content="<?php echo e($robots); ?>">
    <link rel="canonical" href="<?php echo e($canonicalUrl); ?>">

    
    <meta name="language" content="id">
    <meta http-equiv="content-language" content="id-ID">

    
    <meta property="og:type" content="<?php echo $__env->yieldContent('og_type', 'website'); ?>">
    <meta property="og:site_name" content="<?php echo e($siteName); ?>">
    <meta property="og:title" content="<?php echo e($fullTitle); ?>">
    <meta property="og:description" content="<?php echo e($metaDescription); ?>">
    <meta property="og:url" content="<?php echo e($canonicalUrl); ?>">
    <meta property="og:image" content="<?php echo e($ogImage); ?>">
    <meta property="og:image:alt" content="<?php echo $__env->yieldContent('og_image_alt', $siteName); ?>">
    <meta property="og:locale" content="id_ID">

    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo e($fullTitle); ?>">
    <meta name="twitter:description" content="<?php echo e($metaDescription); ?>">
    <meta name="twitter:image" content="<?php echo e($ogImage); ?>">

    
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/logo-sbk.png')); ?>">
    <link rel="icon" href="<?php echo e(asset('favicon.ico')); ?>" sizes="any">
    <link rel="apple-touch-icon" href="<?php echo e(asset('apple-touch-icon.png')); ?>">

    
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    <link rel="preload" as="image" href="<?php echo e(asset('images/logo-sbk.png')); ?>">

    
    <script type="application/ld+json">
        <?php echo json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>

    </script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('counter', (target) => ({
                count: 0,
                start() {
                    let interval = setInterval(() => {
                        if (this.count < target) {
                            this.count++;
                        } else {
                            clearInterval(interval);
                        }
                    }, 50);
                }
            }));
        });
    </script>

    
    <style>
        html {
            overflow-x: hidden;
        }

        body {
            overflow-x: hidden;
            max-width: 100vw;
        }
    </style>

    <?php echo $__env->yieldPushContent('schema'); ?>

    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</head>

<body class="bg-white text-sbk-black">

    
    <nav id="navbar"
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm">
        <div class="container-sbk">
            <div class="flex items-center justify-between h-20">

                
                <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3 group">
                    <img src="<?php echo e(asset('images/logo-sbk.png')); ?>" alt="SBK Logo"
                        class="h-12 w-auto transition-transform group-hover:scale-105">
                    <div class="hidden sm:block">
                        <p class="font-heading font-800 text-sbk-black text-sm leading-tight">SASTRA BHINNEKA</p>
                        <p class="font-heading font-800 text-sbk-red text-sm leading-tight">KARYA</p>
                    </div>
                </a>

                
                <div class="hidden lg:flex items-center gap-8">
                    <a href="<?php echo e(route('home')); ?>"
                        class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Beranda</a>

                    <a href="<?php echo e(route('about')); ?>"
                        class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">Tentang Kami</a>

                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <a href="<?php echo e(route('services')); ?>"
                            class="nav-link <?php echo e(request()->routeIs('services') ? 'active' : ''); ?> flex items-center gap-1">
                            Layanan
                            <svg class="w-3.5 h-3.5 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>

                        
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="absolute top-full -left-48 mt-3 w-[580px] bg-white rounded-2xl shadow-xl border border-gray-100 z-50"
                            style="display: none;">

                            <div class="grid grid-cols-2">

                                
                                <div class="p-5 border-r border-gray-100">
                                    <div class="flex items-center gap-2 mb-4">
                                        <div class="w-6 h-6 bg-sbk-red/10 rounded-lg flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 text-sbk-red" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        </div>
                                        <p class="text-xs font-black text-sbk-black uppercase tracking-widest">
                                            Jasa Konstruksi
                                        </p>
                                    </div>

                                    <div class="space-y-0.5">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $navConstruction ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                            <a href="<?php echo e(route('services')); ?>#service-<?php echo e($service->id); ?>"
                                                class="flex items-start gap-2.5 px-3 py-2 rounded-xl hover:bg-sbk-red/5 transition-colors group/item">
                                                <div class="w-1 h-1 bg-sbk-red/40 rounded-full mt-2 flex-shrink-0">
                                                </div>
                                                <span
                                                    class="text-sm text-gray-600 group-hover/item:text-sbk-red transition-colors leading-snug">
                                                    <?php echo e($service->title); ?>

                                                </span>
                                            </a>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                            <p class="text-xs text-gray-400 px-3 py-2 italic">Belum ada data</p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>

                                
                                <div class="p-5">
                                    <div class="flex items-center gap-2 mb-4">
                                        <div class="w-6 h-6 bg-sbk-red/10 rounded-lg flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 text-sbk-red" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                        <p class="text-xs font-black text-sbk-black uppercase tracking-widest">
                                            Non-Konstruksi
                                        </p>
                                    </div>

                                    <div class="space-y-0.5">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $navNonConstruction ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                            <a href="<?php echo e(route('services')); ?>#service-<?php echo e($service->id); ?>"
                                                class="flex items-start gap-2.5 px-3 py-2 rounded-xl hover:bg-sbk-red/5 transition-colors group/item">
                                                <div class="w-1 h-1 bg-sbk-red/40 rounded-full mt-2 flex-shrink-0">
                                                </div>
                                                <span
                                                    class="text-sm text-gray-600 group-hover/item:text-sbk-red transition-colors leading-snug">
                                                    <?php echo e($service->title); ?>

                                                </span>
                                            </a>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                            <p class="text-xs text-gray-400 px-3 py-2 italic">Belum ada data</p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <div
                                class="bg-gray-50 px-5 py-3 rounded-b-2xl border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs text-gray-400"><?php echo e($totalServices); ?>+ jenis layanan
                                    tersedia</span>
                                <a href="<?php echo e(route('services')); ?>"
                                    class="text-sbk-red text-xs font-bold flex items-center gap-1.5 hover:gap-2.5 transition-all">
                                    Lihat Semua
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="<?php echo e(route('portfolio')); ?>"
                        class="nav-link <?php echo e(request()->routeIs('portfolio') ? 'active' : ''); ?>">Portofolio</a>

                    <a href="<?php echo e(route('blog')); ?>"
                        class="nav-link <?php echo e(request()->routeIs('blog*') ? 'active' : ''); ?>">Blog</a>

                    <a href="<?php echo e(route('clients')); ?>"
                        class="nav-link <?php echo e(request()->routeIs('clients') ? 'active' : ''); ?>">Klien</a>

                    <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                        target="_blank" rel="noopener noreferrer" class="btn-primary text-xs py-2.5 px-6">
                        Hubungi Kami
                    </a>
                </div>

                
                <button id="menu-toggle" type="button" class="lg:hidden p-2 text-sbk-black"
                    aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu">
                    <svg id="icon-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="icon-close" class="w-6 h-6 hidden" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100"
        style="
            position: fixed;
            left: 0;
            right: 0;
            top: 80px;
            height: calc(100vh - 80px);
            height: calc(100dvh - 80px);
            overflow-y: auto;
            overscroll-behavior: contain;
            -webkit-overflow-scrolling: touch;
            z-index: 49;
        ">
        <div class="container-sbk pb-8">
            <div class="flex flex-col pt-4">

                <a href="<?php echo e(route('home')); ?>" class="nav-link py-4 px-2 border-b border-gray-100">
                    Beranda
                </a>

                <a href="<?php echo e(route('about')); ?>" class="nav-link py-4 px-2 border-b border-gray-100">
                    Tentang Kami
                </a>

                
                <div x-data="{ openMobile: false }">
                    <button type="button" @click="openMobile = !openMobile"
                        class="w-full flex items-center justify-between py-4 px-2 border-b border-gray-100 nav-link text-left">
                        <span>Layanan</span>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="openMobile ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    
                    <div x-show="openMobile" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 -translate-y-2"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 -translate-y-2"
                        class="bg-sbk-gray-light border-b border-gray-100" style="display: none;">

                        
                        <div class="px-4 pt-4 pb-2">
                            <div class="flex items-center gap-2 mb-3">
                                <div
                                    class="w-6 h-6 bg-sbk-red rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <p class="text-xs font-black text-sbk-black uppercase tracking-widest">
                                    Jasa Konstruksi
                                </p>
                            </div>

                            <div class="space-y-1 ml-8">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $navConstruction ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('services')); ?>#service-<?php echo e($service->id); ?>"
                                        class="flex items-start gap-2 py-2 text-sm text-gray-600 hover:text-sbk-red transition-colors leading-snug">
                                        <div class="w-1 h-1 bg-sbk-red/40 rounded-full flex-shrink-0 mt-2"></div>
                                        <span><?php echo e($service->title); ?></span>
                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <p class="text-xs text-gray-400 italic py-2">Belum ada data</p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="mx-4 border-t border-gray-200"></div>

                        
                        <div class="px-4 pt-3 pb-4">
                            <div class="flex items-center gap-2 mb-3">
                                <div
                                    class="w-6 h-6 bg-sbk-black rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <p class="text-xs font-black text-sbk-black uppercase tracking-widest">
                                    Non-Konstruksi
                                </p>
                            </div>

                            <div class="space-y-1 ml-8">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $navNonConstruction ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('services')); ?>#service-<?php echo e($service->id); ?>"
                                        class="flex items-start gap-2 py-2 text-sm text-gray-600 hover:text-sbk-red transition-colors leading-snug">
                                        <div class="w-1 h-1 bg-sbk-black/40 rounded-full flex-shrink-0 mt-2"></div>
                                        <span><?php echo e($service->title); ?></span>
                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    <p class="text-xs text-gray-400 italic py-2">Belum ada data</p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        
                        <div class="px-4 pb-4">
                            <a href="<?php echo e(route('services')); ?>"
                                class="flex items-center justify-center gap-2 w-full py-2.5 bg-sbk-red text-white text-xs font-bold rounded-xl uppercase tracking-wider hover:bg-sbk-red-dark transition-colors">
                                Lihat Semua Layanan
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <a href="<?php echo e(route('portfolio')); ?>" class="nav-link py-4 px-2 border-b border-gray-100">
                    Portofolio
                </a>

                <a href="<?php echo e(route('blog')); ?>" class="nav-link py-4 px-2 border-b border-gray-100">
                    Blog
                </a>

                <a href="<?php echo e(route('clients')); ?>" class="nav-link py-4 px-2 border-b border-gray-100">
                    Klien
                </a>

                <div class="mt-4 px-2 pb-6">
                    <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                        target="_blank" rel="noopener noreferrer" class="btn-primary w-full justify-center">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>

    
    <main class="pt-20">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    
    <footer class="bg-sbk-black text-white">
        <div class="container-sbk py-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">

                
                <div class="lg:col-span-3">
                    <div class="flex items-center gap-3 mb-6">
                        <img src="<?php echo e(asset('images/logo-sbk.png')); ?>" alt="SBK"
                            class="h-12 w-auto brightness-0 invert">
                        <div>
                            <p class="font-heading font-800 text-white text-sm">SASTRA BHINNEKA KARYA</p>
                            <p class="text-sbk-red text-xs font-heading font-600 tracking-wider">
                                YOU DESERVE THE GOOD SERVICE
                            </p>
                        </div>
                    </div>

                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        Perusahaan jasa konsultasi konstruksi dan non-konstruksi yang berpengalaman melayani berbagai
                        industri di Indonesia.
                    </p>

                    
                    <div class="flex gap-3 mt-6">
                        
                        <a href="https://www.instagram.com/sastrabhinnekakarya" target="_blank"
                            rel="noopener noreferrer"
                            class="w-10 h-10 bg-sbk-gray rounded-lg flex items-center justify-center text-gray-400 hover:bg-sbk-red hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>

                        
                        <a href="<?php echo e(route('home')); ?>"
                            class="w-10 h-10 bg-sbk-gray rounded-lg flex items-center justify-center text-gray-400 hover:bg-sbk-red hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>

                        
                        <a href="<?php echo e(route('home')); ?>"
                            class="w-10 h-10 bg-sbk-gray rounded-lg flex items-center justify-center text-gray-400 hover:bg-sbk-red hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                            </svg>
                        </a>

                        
                        <a href="<?php echo e(route('home')); ?>"
                            class="w-10 h-10 bg-sbk-gray rounded-lg flex items-center justify-center text-gray-400 hover:bg-sbk-red hover:text-white transition-all duration-300">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.746l7.73-8.835L1.254 2.25H8.08l4.253 5.622zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                            </svg>
                        </a>
                    </div>
                </div>

                
                <div class="lg:col-span-6">
                    <h4
                        class="font-heading font-700 text-white text-sm uppercase tracking-widest mb-6 pb-3 border-b border-sbk-red/30">
                        Layanan
                    </h4>

                    <div class="grid grid-cols-2 gap-x-8">
                        
                        <div>
                            <p
                                class="text-sbk-white text-xs font-bold uppercase tracking-widest mb-4 flex items-center gap-2">
                                <span class="w-4 h-0.5 bg-sbk-red inline-block"></span>
                                Konstruksi
                            </p>

                            <ul class="space-y-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $footerConstruction ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('services')); ?>#service-<?php echo e($service->id); ?>"
                                            class="text-gray-400 text-sm hover:text-sbk-red transition-colors leading-snug block">
                                            <?php echo e($service->title); ?>

                                        </a>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                <li class="pt-1">
                                    <a href="<?php echo e(route('services')); ?>#konstruksi"
                                        class="text-sbk-red text-xs font-bold hover:underline">
                                        Lihat semua →
                                    </a>
                                </li>
                            </ul>
                        </div>

                        
                        <div>
                            <p
                                class="text-sbk-white text-xs font-bold uppercase tracking-widest mb-4 flex items-center gap-2">
                                <span class="w-4 h-0.5 bg-sbk-red inline-block"></span>
                                Non-Konstruksi
                            </p>

                            <ul class="space-y-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $footerNonConstruction ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('services')); ?>#service-<?php echo e($service->id); ?>"
                                            class="text-gray-400 text-sm hover:text-sbk-red transition-colors leading-snug block">
                                            <?php echo e($service->title); ?>

                                        </a>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                <li class="pt-1">
                                    <a href="<?php echo e(route('services')); ?>#non-konstruksi"
                                        class="text-sbk-red text-xs font-bold hover:underline">
                                        Lihat semua →
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                
                <div class="lg:col-span-3">
                    <h4
                        class="font-heading font-700 text-white text-sm uppercase tracking-widest mb-6 pb-3 border-b border-sbk-red/30">
                        Kontak
                    </h4>

                    <ul class="space-y-4">
                        
                        <li class="flex gap-3">
                            <svg class="w-4 h-4 text-sbk-red mt-1 flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400 text-sm leading-relaxed">
                                Jl. Merak No. 78 Sukamulya, Kab. Tangerang, Banten 15612
                            </span>
                        </li>

                        
                        <li class="flex gap-3 items-center">
                            <svg class="w-4 h-4 text-sbk-red flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:081312023435"
                                class="text-gray-400 text-sm hover:text-sbk-red transition-colors">
                                081312023435
                            </a>
                        </li>

                        
                        <li class="flex gap-3 items-center">
                            <svg class="w-4 h-4 text-sbk-red flex-shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:sastrabhinekakarya@gmail.com"
                                class="text-gray-400 text-sm hover:text-sbk-red transition-colors">
                                sastrabhinekakarya@gmail.com
                            </a>
                        </li>

                        
                        <li class="flex gap-3 items-center">
                            <svg class="w-4 h-4 text-sbk-red flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                            <a href="https://www.instagram.com/sastrabhinnekakarya" target="_blank"
                                rel="noopener noreferrer"
                                class="text-gray-400 text-sm hover:text-sbk-red transition-colors">
                                @sastrabhinnekakarya
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        
        <div class="border-t border-white/10">
            <div class="container-sbk py-6 flex flex-col sm:flex-row justify-between items-center gap-4">
                <p class="text-gray-500 text-xs">
                    &copy; <?php echo e(date('Y')); ?> PT Sastra Bhinneka Karya. All rights reserved.
                </p>
                <p class="text-gray-500 text-xs">
                    <span class="text-sbk-red">You Deserve The Good Service</span>
                </p>
            </div>
        </div>
    </footer>

    
    <script>
        // Navbar scroll effect
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-lg');
            } else {
                navbar.classList.remove('shadow-lg');
            }
        });

        // Mobile menu toggle with body scroll lock
        const toggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const iconOpen = document.getElementById('icon-open');
        const iconClose = document.getElementById('icon-close');

        let savedScrollY = 0;

        function lockBodyScroll() {
            savedScrollY = window.scrollY || document.documentElement.scrollTop;

            document.documentElement.classList.add('overflow-hidden');
            document.body.classList.add('overflow-hidden');

            document.body.style.position = 'fixed';
            document.body.style.top = `-${savedScrollY}px`;
            document.body.style.left = '0';
            document.body.style.right = '0';
            document.body.style.width = '100%';
        }

        function unlockBodyScroll() {
            document.documentElement.classList.remove('overflow-hidden');
            document.body.classList.remove('overflow-hidden');

            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.left = '';
            document.body.style.right = '';
            document.body.style.width = '';

            window.scrollTo(0, savedScrollY);
        }

        function isMobileMenuOpen() {
            return !mobileMenu.classList.contains('hidden');
        }

        function openMobileMenu() {
            mobileMenu.classList.remove('hidden');

            iconOpen.classList.add('hidden');
            iconClose.classList.remove('hidden');

            toggle.setAttribute('aria-expanded', 'true');

            lockBodyScroll();

            mobileMenu.scrollTop = 0;
        }

        function closeMobileMenu() {
            mobileMenu.classList.add('hidden');

            iconOpen.classList.remove('hidden');
            iconClose.classList.add('hidden');

            toggle.setAttribute('aria-expanded', 'false');

            unlockBodyScroll();
        }

        if (toggle && mobileMenu && iconOpen && iconClose) {
            toggle.addEventListener('click', () => {
                if (isMobileMenuOpen()) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });

            // Tutup menu ketika klik link di mobile menu
            mobileMenu.querySelectorAll('a').forEach((link) => {
                link.addEventListener('click', () => {
                    if (isMobileMenuOpen()) {
                        closeMobileMenu();
                    }
                });
            });

            // Tutup menu ketika resize ke desktop
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024 && isMobileMenuOpen()) {
                    closeMobileMenu();
                }
            });

            // Tutup menu dengan tombol ESC
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && isMobileMenuOpen()) {
                    closeMobileMenu();
                }
            });
        }
    </script>
</body>

</html>
<?php /**PATH /var/www/html/resources/views/layouts/app.blade.php ENDPATH**/ ?>