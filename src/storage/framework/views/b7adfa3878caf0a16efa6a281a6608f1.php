<?php $__env->startSection('title', 'Portofolio'); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="bg-sbk-black py-32 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="<?php echo e(asset('images/construction-site.jpg')); ?>" class="w-full h-full object-cover"
                alt="Portofolio Background">
            <div class="absolute inset-0" style="background: rgba(0,0,0,0.75); z-index: 10;"></div>
        </div>
        <div class="absolute inset-0 z-10 opacity-20"
            style="background: radial-gradient(ellipse at top left, rgba(204,0,0,0.3) 0%, transparent 60%)"></div>
        <div class="container-sbk relative z-20">
            <span class="section-tag text-sbk-red" data-reveal="fade-up">Portofolio</span>
            <h1 class="section-title text-white mt-2 text-5xl lg:text-6xl" data-reveal="fade-up" data-delay="100">
                Rekam Jejak<br><span>Pekerjaan Kami</span>
            </h1>
            <p class="text-gray-400 mt-4 max-w-xl" data-reveal="fade-up" data-delay="200">
                Dokumentasi lengkap proyek dan kegiatan yang telah kami kerjakan
                bersama berbagai perusahaan terkemuka di Indonesia.
            </p>
            <div class="flex items-center gap-3 mt-6" data-reveal="fade-up" data-delay="300">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 text-sm hover:text-white transition-colors">Beranda</a>
                <span class="text-sbk-red">/</span>
                <span class="text-white text-sm">Portofolio</span>
            </div>
        </div>
    </section>

    
    <section class="bg-white border-b border-gray-100 sticky top-20 z-30">
        <div class="container-sbk">
            <div class="flex items-center gap-2 overflow-x-auto py-4 scrollbar-hide" x-data="{ active: 'all' }">
                <button @click="active = 'all'"
                    :class="active === 'all' ? 'bg-sbk-red text-white' : 'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                    class="flex-shrink-0 px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-200"
                    onclick="filterPortfolio('all')">
                    Semua
                </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <button @click="active = '<?php echo e($client->id); ?>'"
                        :class="active === '<?php echo e($client->id); ?>' ? 'bg-sbk-red text-white' :
                            'bg-gray-100 text-gray-600 hover:bg-gray-200'"
                        class="flex-shrink-0 px-5 py-2 rounded-full text-xs font-bold uppercase tracking-wider transition-all duration-200 whitespace-nowrap"
                        onclick="filterPortfolio('<?php echo e($client->id); ?>')">
                        <?php echo e(Str::limit($client->name, 30)); ?>

                    </button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="section-padding bg-sbk-gray-light">
        <div class="container-sbk">

            <?php
                $grouped = $portfolios->groupBy('client_id');
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $grouped; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clientId => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                <?php $clientName = $items->first()->client->name ?? 'Klien' ?>

                <div class="portfolio-group mb-16" data-client="<?php echo e($clientId); ?>">

                    
                    <div class="flex items-center gap-4 mb-8" data-reveal="fade-right">
                        <div class="w-10 h-10 bg-sbk-red rounded-xl flex items-center justify-center flex-shrink-0">
                            <span class="text-white font-black text-sm"><?php echo e(strtoupper(substr($clientName, 3, 1))); ?></span>
                        </div>
                        <div>
                            <p class="text-xs text-sbk-red font-bold uppercase tracking-widest">Dokumentasi Kegiatan</p>
                            <h3 class="font-heading font-black text-sbk-black text-xl"><?php echo e($clientName); ?></h3>
                        </div>
                        <div class="flex-1 h-px bg-gray-200 ml-4"></div>
                        <span class="text-xs text-gray-400 font-medium flex-shrink-0"><?php echo e($items->count()); ?> dokumen</span>
                    </div>

                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <a href="<?php echo e(route('portfolio.show', $portfolio->id)); ?>" data-reveal="fade-up"
                                data-delay="<?php echo e(($i % 3) * 100); ?>"
                                class="group bg-white rounded-2xl overflow-hidden shadow-soft
                                      hover:shadow-card transition-all duration-300 hover:-translate-y-1
                                      border border-transparent hover:border-sbk-red/20">

                                
                                <div class="relative h-48 overflow-hidden bg-sbk-gray-light">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->first()): ?>
                                        <img src="<?php echo e(Storage::url($portfolio->images->first()->image_path)); ?>"
                                            alt="<?php echo e($portfolio->document_name); ?>"
                                            class="w-full h-full object-cover
                                                   filter grayscale group-hover:grayscale-0
                                                   scale-100 group-hover:scale-105
                                                   transition-all duration-500">
                                        <div
                                            class="absolute inset-0 bg-sbk-black/40 group-hover:bg-sbk-black/10
                                                    transition-all duration-300">
                                        </div>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count() > 1): ?>
                                            <div
                                                class="absolute top-3 right-3 bg-black/60 backdrop-blur-sm
                                                        text-white text-xs px-2.5 py-1 rounded-full font-medium">
                                                +<?php echo e($portfolio->images->count()); ?> foto
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <?php else: ?>
                                        <div
                                            class="w-full h-full flex items-center justify-center bg-gradient-to-br from-sbk-red/5 to-sbk-red/10">
                                            <svg class="w-12 h-12 text-sbk-red/30" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->document_category): ?>
                                        <div class="absolute bottom-3 left-3">
                                            <span
                                                class="bg-sbk-red text-white text-xs px-3 py-1 rounded-full font-semibold">
                                                <?php echo e($portfolio->document_category); ?>

                                            </span>
                                        </div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                
                                <div class="p-6">
                                    <div class="flex items-center justify-between mb-3">
                                        <span
                                            class="inline-flex items-center px-3 py-1 bg-sbk-red/10 text-sbk-red
                                                     rounded-full text-xs font-bold">
                                            <?php echo e($portfolio->period); ?>

                                        </span>
                                        <svg class="w-4 h-4 text-gray-300 group-hover:text-sbk-red
                                                    group-hover:translate-x-1 transition-all duration-300"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </div>

                                    <h4
                                        class="font-heading font-bold text-sbk-black text-base leading-snug
                                               group-hover:text-sbk-red transition-colors mb-3">
                                        <?php echo e($portfolio->document_name); ?>

                                    </h4>

                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->description): ?>
                                        <p class="text-gray-500 text-xs leading-relaxed line-clamp-2">
                                            <?php echo e($portfolio->description); ?>

                                        </p>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                    <div class="flex items-center gap-2 mt-4 pt-4 border-t border-gray-100">
                                        <div class="w-5 h-5 bg-sbk-red/10 rounded-full flex items-center justify-center">
                                            <div class="w-1.5 h-1.5 bg-sbk-red rounded-full"></div>
                                        </div>
                                        <p class="text-gray-400 text-xs font-medium truncate">
                                            <?php echo e($portfolio->client->name ?? '-'); ?>

                                        </p>
                                    </div>
                                </div>
                            </a>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <div class="text-center py-20" data-reveal="fade-up">
                    <div class="w-20 h-20 bg-sbk-red/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-10 h-10 text-sbk-red/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <p class="text-gray-400 font-medium">Belum ada data portofolio</p>
                    <p class="text-gray-300 text-sm mt-1">Tambahkan portofolio melalui panel admin</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <section class="py-20 bg-sbk-black relative overflow-hidden">
        <div class="absolute inset-0 opacity-20"
            style="background: radial-gradient(ellipse at center, rgba(204,0,0,0.3) 0%, transparent 70%)"></div>
        <div class="container-sbk text-center relative z-10">
            <h2 class="font-heading font-black text-4xl text-white mb-4" data-reveal="fade-up">
                Ingin Bekerja Sama?
            </h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto" data-reveal="fade-up" data-delay="100">
                Hubungi kami dan konsultasikan kebutuhan proyek Anda.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2" data-reveal="fade-up" data-delay="200">
                <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                    target="_blank"
                    class="inline-flex items-center justify-center gap-3 bg-white text-sbk-red font-bold px-10 py-4 rounded-2xl hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-lg whitespace-nowrap">
                    <svg class="w-5 h-5 flex-shrink-0" style="color: #25D366" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Konsultasi Sekarang
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function filterPortfolio(clientId) {
            const groups = document.querySelectorAll('.portfolio-group');
            groups.forEach(group => {
                if (clientId === 'all' || group.dataset.client === clientId) {
                    group.style.display = 'block';
                    group.style.animation = 'fadeUp 0.4s ease-out forwards';
                } else {
                    group.style.display = 'none';
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/portfolio.blade.php ENDPATH**/ ?>