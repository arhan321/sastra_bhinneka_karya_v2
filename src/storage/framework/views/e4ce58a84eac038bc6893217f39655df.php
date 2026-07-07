<?php $__env->startSection('title', 'Blog'); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="bg-sbk-black py-32 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="<?php echo e(asset('images/construction-site.jpg')); ?>" class="w-full h-full object-cover" alt="">
            <div class="absolute inset-0" style="background: rgba(0,0,0,0.75); z-index: 10;"></div>
        </div>
        <div class="container-sbk relative z-20" data-reveal="fade-up">
            <span class="section-tag text-sbk-red">Blog & Artikel</span>
            <h1 class="section-title text-white mt-2 text-5xl lg:text-6xl">
                Insights &<br><span>Pengetahuan</span>
            </h1>
            <div class="flex items-center gap-3 mt-6">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 text-sm hover:text-white">Beranda</a>
                <span class="text-sbk-red">/</span>
                <span class="text-white text-sm">Blog</span>
            </div>
        </div>
    </section>

    
    <section class="section-padding bg-white">
        <div class="container-sbk">
            <div class="grid lg:grid-cols-3 gap-12">

                
                <div class="lg:col-span-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($posts->count()): ?>
                        <div class="grid md:grid-cols-2 gap-6">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e(route('blog.show', $post->slug)); ?>" data-reveal="fade-up"
                                    data-delay="<?php echo e((($i % 2) + 1) * 100); ?>"
                                    class="group bg-white border border-gray-100 rounded-xl overflow-hidden hover:shadow-card hover:-translate-y-1 transition-all duration-300 flex flex-col">
                                    <div class="relative h-48 overflow-hidden flex-shrink-0">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->thumbnail): ?>
                                            <img src="<?php echo e(Storage::url($post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>"
                                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                        <?php else: ?>
                                            <div
                                                class="w-full h-full bg-gradient-to-br from-sbk-gray to-sbk-black flex items-center justify-center">
                                                <span class="text-white/20 font-heading font-black text-5xl">SBK</span>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->category): ?>
                                            <div class="absolute top-3 left-3">
                                                <span
                                                    class="bg-sbk-red text-white text-xs font-bold px-2.5 py-1 rounded-full capitalize">
                                                   <?php echo e(is_array($post->category) ? implode(', ', $post->category) : $post->category); ?>

                                                </span>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                    <div class="p-5 flex flex-col flex-1">
                                        <div class="flex items-center gap-3 text-gray-400 text-xs mb-3">
                                            <span><?php echo e($post->published_at?->format('d M Y')); ?></span>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->author): ?>
                                                <span>•</span>
                                                <span><?php echo e($post->author); ?></span>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <h3
                                            class="font-heading font-bold text-sbk-black text-base leading-snug mb-2 group-hover:text-sbk-red transition-colors line-clamp-2">
                                            <?php echo e($post->title); ?>

                                        </h3>
                                        <div class="w-8 h-0.5 bg-sbk-red mb-3"></div>
                                        <p class="text-gray-500 text-sm leading-relaxed flex-1 line-clamp-2">
                                            <?php echo e($post->excerpt ?? Str::limit(strip_tags($post->content), 100)); ?>

                                        </p>
                                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                                            <div class="flex items-center gap-1 text-gray-400 text-xs">
                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                                <?php echo e($post->views); ?>

                                            </div>
                                            <span class="text-sbk-red text-xs font-bold">Selengkapnya →</span>
                                        </div>
                                    </div>
                                </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($posts->hasPages()): ?>
                            <div class="mt-10"><?php echo e($posts->links()); ?></div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php else: ?>
                        <div class="text-center py-20">
                            <div class="w-16 h-16 bg-sbk-red/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-sbk-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                            </div>
                            <h3 class="font-heading font-bold text-lg text-sbk-black mb-2">Belum Ada Artikel</h3>
                            <p class="text-gray-500 text-sm">Artikel akan segera hadir!</p>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="space-y-8" data-reveal="fade-left" data-delay="200">

                    
                    <div class="bg-sbk-gray-light rounded-xl p-6">
                        <h4
                            class="font-heading font-bold text-sbk-black text-sm uppercase tracking-widest mb-4 pb-3 border-b border-gray-200">
                            Cari Artikel
                        </h4>
                        <form action="<?php echo e(route('blog')); ?>" method="GET">
                            <div class="flex gap-2">
                                <input type="text" name="q" placeholder="Kata kunci..."
                                    class="flex-1 bg-white border border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-sbk-red transition-colors">
                                <button type="submit"
                                    class="bg-sbk-red text-white px-4 py-2.5 rounded-xl hover:bg-sbk-red-dark transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($categories->count()): ?>
                        <div class="bg-sbk-gray-light rounded-xl p-6">
                            <h4
                                class="font-heading font-bold text-sbk-black text-sm uppercase tracking-widest mb-4 pb-3 border-b border-gray-200">
                                Blog Categories
                            </h4>
                            <ul class="space-y-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li>
                                        <a href="<?php echo e(route('blog')); ?>?category=<?php echo e($cat); ?>"
                                            class="flex items-center justify-between text-sm text-gray-600 hover:text-sbk-red transition-colors group py-1">
                                            <span class="flex items-center gap-2">
                                                <span class="w-1.5 h-1.5 bg-sbk-red rounded-full"></span>
                                                <?php echo e(ucfirst(str_replace('-', ' ', $cat))); ?>

                                            </span>
                                            <span
                                                class="text-xs bg-white px-2 py-0.5 rounded-full text-gray-400 group-hover:bg-sbk-red group-hover:text-white transition-colors">
                                                <?php echo e($categoryCounts[$cat] ?? 0); ?>

                                            </span>
                                        </a>
                                    </li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recentPosts->count()): ?>
                        <div class="bg-sbk-gray-light rounded-xl p-6">
                            <h4
                                class="font-heading font-bold text-sbk-black text-sm uppercase tracking-widests mb-4 pb-3 border-b border-gray-200">
                                Recent Post
                            </h4>
                            <div class="space-y-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('blog.show', $recent->slug)); ?>"
                                        class="group flex gap-3 hover:bg-white rounded-xl p-2 transition-colors">
                                        <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recent->thumbnail): ?>
                                                <img src="<?php echo e(Storage::url($recent->thumbnail)); ?>"
                                                    alt="<?php echo e($recent->title); ?>"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                            <?php else: ?>
                                                <div class="w-full h-full bg-sbk-gray flex items-center justify-center">
                                                    <span class="text-white/30 font-black text-lg">S</span>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <h5
                                                class="font-bold text-sbk-black text-xs leading-snug group-hover:text-sbk-red transition-colors line-clamp-2 mb-1">
                                                <?php echo e($recent->title); ?>

                                            </h5>
                                            <p class="text-gray-400 text-xs"><?php echo e($recent->published_at?->format('d M Y')); ?>

                                            </p>
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recent->author): ?>
                                                <p class="text-gray-400 text-xs"><?php echo e($recent->author); ?></p>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>
                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allTags->count()): ?>
                        <div class="bg-sbk-gray-light rounded-xl p-6">
                            <h4
                                class="font-heading font-bold text-sbk-black text-sm uppercase tracking-widest mb-4 pb-3 border-b border-gray-200">
                                Tags
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allTags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('blog')); ?>?tag=<?php echo e($tag); ?>"
                                        class="text-xs bg-white border border-gray-200 text-gray-600 px-3 py-1.5 rounded-full hover:bg-sbk-red hover:text-white hover:border-sbk-red transition-all">
                                        <?php echo e($tag); ?>

                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


                    
                    <div class="bg-sbk-red rounded-xl p-6 text-center">
                        <div class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h4 class="font-heading font-bold text-white text-base mb-2">Newsletter</h4>
                        <p class="text-white/70 text-xs mb-4">Dapatkan artikel terbaru langsung di email Anda.</p>
                        <form class="space-y-2">
                            <input type="email" placeholder="Email Anda"
                                class="w-full bg-white/20 border border-white/30 text-white placeholder-white/50 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:bg-white/30 transition-colors">
                            <button type="submit"
                                class="w-full bg-white text-sbk-red font-bold text-sm py-2.5 rounded-xl hover:bg-gray-100 transition-colors">
                                Subscribe
                            </button>
                        </form>
                    </div>

                    
                    <div class="bg-sbk-black rounded-xl p-6 text-center">
                        <h4 class="font-heading font-bold text-white text-base mb-2">Butuh Konsultasi?</h4>
                        <p class="text-gray-400 text-xs mb-4">Tim ahli kami siap membantu.</p>
                        <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                            target="_blank"
                            class="inline-flex items-center gap-2 bg-sbk-red text-white font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-sbk-red-dark transition-colors w-full justify-center">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            Hubungi Kami
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/blog.blade.php ENDPATH**/ ?>