<?php $__env->startSection('title', $portfolio->document_name); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="bg-sbk-black py-28 relative overflow-hidden">
        
        <div class="absolute inset-0 z-0">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->image): ?>
                <img src="<?php echo e(asset('storage/' . $portfolio->image)); ?>" class="w-full h-full object-cover"
                    alt="<?php echo e($portfolio->document_name); ?>">
            <?php else: ?>
                
                <img src="<?php echo e(asset('images/construction-site.jpg')); ?>" class="w-full h-full object-cover" alt="">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            
            <div class="absolute inset-0" style="background: rgba(0,0,0,0.8); z-index: 10;"></div>
        </div>

        
        <div class="absolute inset-0 z-10 opacity-30"
            style="background: radial-gradient(ellipse at top right, rgba(204,0,0,0.4) 0%, transparent 60%)"></div>

        <div class="container-sbk relative z-20">
            <div class="flex items-center gap-3 mb-6">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 text-sm hover:text-white transition-colors">Beranda</a>
                <span class="text-sbk-red">/</span>
                <a href="<?php echo e(route('portfolio')); ?>"
                    class="text-gray-400 text-sm hover:text-white transition-colors">Portofolio</a>
                <span class="text-sbk-red">/</span>
                <span class="text-white text-sm">Detail</span>
            </div>

            <div class="flex items-center gap-3 mb-4">
                <span
                    class="inline-flex items-center px-4 py-1.5 bg-sbk-red text-white
                     rounded-full text-xs font-bold uppercase tracking-wider">
                    <?php echo e($portfolio->period); ?>

                </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->document_category): ?>
                    <span
                        class="inline-flex items-center px-4 py-1.5 bg-white/10 text-white
                     rounded-full text-xs font-bold uppercase tracking-wider backdrop-blur-sm">
                        <?php echo e($portfolio->document_category); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <h1 class="font-heading font-black text-white text-4xl lg:text-5xl max-w-3xl leading-tight mb-4">
                <?php echo e($portfolio->document_name); ?>

            </h1>

            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-sbk-red rounded-lg flex items-center justify-center shadow-lg">
                    <span class="text-white font-black text-xs">
                        <?php echo e(strtoupper(substr($portfolio->client->name ?? 'K', 0, 1))); ?>

                    </span>
                </div>
                <span class="text-gray-300 font-medium"><?php echo e($portfolio->client->name ?? '-'); ?></span>
            </div>
        </div>
    </section>

    
    <section class="section-padding bg-white">
        <div class="container-sbk">
            <div class="grid lg:grid-cols-3 gap-12">

                
                <div class="lg:col-span-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count()): ?>

                        
                        <div class="relative rounded-2xl overflow-hidden mb-4 cursor-pointer" x-data="{ lightbox: false, current: 0 }"
                            @keydown.escape.window="lightbox = false">

                            
                            <div class="relative h-[420px] rounded-2xl overflow-hidden group"
                                @click="lightbox = true; current = 0">
                                <img src="<?php echo e(Storage::url($portfolio->images->first()->image_path)); ?>"
                                    alt="<?php echo e($portfolio->images->first()->caption ?? $portfolio->document_name); ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                <div
                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300">
                                </div>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count() > 1): ?>
                                    <div
                                        class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                        <div
                                            class="bg-black/60 backdrop-blur-sm text-white px-6 py-3 rounded-full font-semibold text-sm">
                                            Lihat <?php echo e($portfolio->images->count()); ?> Foto
                                        </div>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->first()->caption || $portfolio->images->first()->activity_type): ?>
                                    <div
                                        class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->first()->activity_type): ?>
                                            <span
                                                class="text-sbk-red text-xs font-bold uppercase tracking-widest block mb-1">
                                                <?php echo e($portfolio->images->first()->activity_type); ?>

                                            </span>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->first()->caption): ?>
                                            <p class="text-white font-semibold text-sm">
                                                <?php echo e($portfolio->images->first()->caption); ?></p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count() > 1): ?>
                                <div class="grid grid-cols-3 gap-3 mt-3">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portfolio->images->skip(1)->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <div class="relative rounded-xl overflow-hidden h-28 cursor-pointer group"
                                            @click="lightbox = true; current = <?php echo e($i + 1); ?>">
                                            <img src="<?php echo e(Storage::url($image->image_path)); ?>" alt="<?php echo e($image->caption); ?>"
                                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                            <div
                                                class="absolute inset-0 bg-black/0 group-hover:bg-sbk-red/20 transition-all duration-300">
                                            </div>

                                            
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($loop->last && $portfolio->images->count() > 4): ?>
                                                <div class="absolute inset-0 bg-black/60 flex items-center justify-center">
                                                    <span
                                                        class="text-white font-black text-xl">+<?php echo e($portfolio->images->count() - 4); ?></span>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            
                            <div x-show="lightbox" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0"
                                class="fixed inset-0 bg-black/95 z-50 flex items-center justify-center p-4"
                                style="display: none;" @click.self="lightbox = false">

                                
                                <button @click="lightbox = false"
                                    class="absolute top-4 right-4 w-10 h-10 bg-white/10 rounded-full
                           flex items-center justify-center text-white hover:bg-sbk-red transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>

                                
                                <div
                                    class="absolute top-4 left-1/2 -translate-x-1/2 bg-white/10 backdrop-blur-sm
                        text-white text-sm px-4 py-1.5 rounded-full font-medium">
                                    <span x-text="current + 1"></span> / <?php echo e($portfolio->images->count()); ?>

                                </div>

                                
                                <div class="relative max-w-5xl w-full">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portfolio->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        <div x-show="current === <?php echo e($i); ?>"
                                            x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 scale-95"
                                            x-transition:enter-end="opacity-100 scale-100">
                                            <img src="<?php echo e(Storage::url($image->image_path)); ?>" alt="<?php echo e($image->caption); ?>"
                                                class="w-full max-h-[75vh] object-contain rounded-xl mx-auto">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image->caption || $image->activity_type): ?>
                                                <div class="text-center mt-4">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image->activity_type): ?>
                                                        <span
                                                            class="text-sbk-red text-xs font-bold uppercase tracking-widest"><?php echo e($image->activity_type); ?></span>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($image->caption): ?>
                                                        <p class="text-white text-sm mt-1"><?php echo e($image->caption); ?></p>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count() > 1): ?>
                                        <button
                                            @click="current = current === 0 ? <?php echo e($portfolio->images->count() - 1); ?> : current - 1"
                                            class="absolute left-0 top-1/2 -translate-y-1/2 -translate-x-16
                               w-12 h-12 bg-white/10 hover:bg-sbk-red rounded-full
                               flex items-center justify-center text-white transition-all duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button
                                            @click="current = current === <?php echo e($portfolio->images->count() - 1); ?> ? 0 : current + 1"
                                            class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-16
                               w-12 h-12 bg-white/10 hover:bg-sbk-red rounded-full
                               flex items-center justify-center text-white transition-all duration-200">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count() > 1): ?>
                                    <div
                                        class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 max-w-lg overflow-x-auto pb-1">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $portfolio->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                            <button @click="current = <?php echo e($i); ?>"
                                                :class="current === <?php echo e($i); ?> ? 'border-sbk-red opacity-100' :
                                                    'border-transparent opacity-50'"
                                                class="flex-shrink-0 w-14 h-14 rounded-lg overflow-hidden border-2 transition-all duration-200 hover:opacity-100">
                                                <img src="<?php echo e(Storage::url($image->image_path)); ?>"
                                                    class="w-full h-full object-cover">
                                            </button>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    <?php else: ?>
                        
                        <div class="bg-sbk-gray-light rounded-2xl h-64 flex items-center justify-center">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="text-gray-400 text-sm">Belum ada foto dokumentasi</p>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->description): ?>
                        <div class="mt-6 bg-sbk-gray-light rounded-2xl p-8">
                            <h3 class="font-heading font-bold text-sbk-black mb-4">Deskripsi Kegiatan</h3>
                            <p class="text-gray-600 leading-relaxed"><?php echo e($portfolio->description); ?></p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="space-y-6">

                    
                    <div class="bg-sbk-gray-light rounded-2xl p-6">
                        <h3 class="font-heading font-bold text-sbk-black mb-5 pb-3 border-b border-gray-200">
                            Informasi Dokumen
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Klien</p>
                                <p class="font-semibold text-sbk-black text-sm"><?php echo e($portfolio->client->name ?? '-'); ?></p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Nama Dokumen</p>
                                <p class="font-semibold text-sbk-black text-sm"><?php echo e($portfolio->document_name); ?></p>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->document_category): ?>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Kategori</p>
                                    <p class="font-semibold text-sbk-black text-sm"><?php echo e($portfolio->document_category); ?>

                                    </p>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div>
                                <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Periode</p>
                                <p class="font-semibold text-sbk-black text-sm"><?php echo e($portfolio->period); ?></p>
                            </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($portfolio->images->count()): ?>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wider mb-1">Dokumentasi</p>
                                    <p class="font-semibold text-sbk-black text-sm"><?php echo e($portfolio->images->count()); ?> foto
                                    </p>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>

                    
                    <div class="bg-sbk-red rounded-2xl p-6 text-center">
                        <p class="font-heading font-bold text-white mb-2">Butuh Layanan Serupa?</p>
                        <p class="text-white/70 text-xs mb-4">Hubungi kami untuk konsultasi gratis</p>
                        <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-white text-sbk-red font-bold text-xs px-5 py-2.5 rounded-full hover:bg-sbk-gray-light transition-colors">
                            Hubungi Kami
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->count()): ?>
                        <div>
                            <h3 class="font-heading font-bold text-sbk-black mb-4">Proyek Terkait</h3>
                            <div class="space-y-3">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('portfolio.show', $r->id)); ?>"
                                        class="flex items-start gap-3 p-4 bg-white rounded-xl border border-gray-100
                                  hover:border-sbk-red/20 hover:shadow-soft transition-all duration-200 group">
                                        <div
                                            class="w-8 h-8 bg-sbk-red/10 rounded-lg flex-shrink-0 flex items-center justify-center">
                                            <div class="w-2 h-2 bg-sbk-red rounded-full"></div>
                                        </div>
                                        <div>
                                            <p
                                                class="font-semibold text-sbk-black text-xs leading-snug
                                          group-hover:text-sbk-red transition-colors">
                                                <?php echo e($r->document_name); ?>

                                            </p>
                                            <p class="text-gray-400 text-xs mt-1"><?php echo e($r->period); ?></p>
                                        </div>
                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/portfolio-detail.blade.php ENDPATH**/ ?>