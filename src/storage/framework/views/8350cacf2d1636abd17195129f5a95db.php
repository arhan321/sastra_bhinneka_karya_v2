<?php $__env->startSection('title', 'Klien Kami'); ?>

<?php $__env->startSection('content'); ?>

    
    <section class="bg-sbk-black py-32 relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="<?php echo e(asset('images/construction-site.jpg')); ?>" class="w-full h-full object-cover" alt="Clients Background">
            <div class="absolute inset-0" style="background: rgba(0,0,0,0.75); z-index: 10;"></div>
        </div>
        <div class="absolute inset-0 z-10 opacity-20"
            style="background: radial-gradient(ellipse at top right, rgba(204,0,0,0.3) 0%, transparent 60%)">
        </div>
        <div class="container-sbk relative z-20">
            <span class="section-tag text-sbk-red" data-reveal="fade-up">Klien Kami</span>
            <h1 class="section-title text-white mt-2 text-5xl lg:text-6xl" data-reveal="fade-up" data-delay="100">
                Dipercaya oleh<br><span>Perusahaan Terkemuka</span>
            </h1>
            <div class="flex items-center gap-3 mt-6" data-reveal="fade-up" data-delay="200">
                <a href="<?php echo e(route('home')); ?>" class="text-gray-400 text-sm hover:text-white transition-colors">Beranda</a>
                <span class="text-sbk-red">/</span>
                <span class="text-white text-sm">Klien</span>
            </div>
        </div>
    </section>

    
    <section class="py-20 bg-white overflow-hidden">
        <div class="container-sbk mb-14 text-center" data-reveal="fade-up">
            <span class="section-tag justify-center">Partner Kami</span>
            <h2 class="section-title mt-2">Klien yang Telah<br><span>Mempercayai Kami</span></h2>
            <p class="text-gray-500 mt-4 max-w-xl mx-auto text-sm leading-relaxed">
                Kami bangga telah melayani berbagai perusahaan besar di Indonesia
                dari berbagai sektor industri.
            </p>
        </div>

        <?php
            $defaultClients = [
                'PT National Steel Industries',
                'PT Warnatama Cemerlang',
                'PT Youngil Leather Indonesia',
                'PT Hengrun International Shoes',
                'PT Huafa Real Estate',
                'PT Tirta Bahtera',
                'PT Green Source Indonesia',
                'PT Indofood CBP Sukses Makmur Tbk',
                'PT Aluminametal Utama',
                'PT Sakata INX Indonesia',
                'PT Aimus Bedding Indonesia',
                'PT Supreme Cable Mfg & Commerce Tbk',
            ];
        ?>

        
        <div class="relative mb-6" x-data="{ paused: false }" data-reveal="fade-in" data-delay="100">
            <div class="flex gap-6 marquee-left" :class="paused ? 'paused' : ''" @mouseenter="paused = true"
                @mouseleave="paused = false">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($r = 0; $r < 2; $r++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clients->count()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div
                                class="flex-shrink-0 w-52 h-28 bg-white border border-gray-100
                                rounded-2xl flex items-center justify-center p-5
                                hover:border-sbk-red/30 hover:shadow-card
                                transition-all duration-300 group">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                                    <img src="<?php echo e(Storage::url($client->logo)); ?>" alt="<?php echo e($client->name); ?>"
                                        class="max-h-14 max-w-full object-contain
                                        grayscale group-hover:grayscale-0
                                        opacity-60 group-hover:opacity-100
                                        transition-all duration-300">
                                <?php else: ?>
                                    <p
                                        class="font-heading font-bold text-sbk-gray-mid
                                              group-hover:text-sbk-red text-xs text-center
                                              leading-tight transition-colors">
                                        <?php echo e($client->name); ?>

                                    </p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php else: ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $defaultClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div
                                class="flex-shrink-0 w-52 h-28 bg-white border border-gray-100
                                rounded-2xl flex items-center justify-center p-5
                                hover:border-sbk-red/30 hover:shadow-card
                                transition-all duration-300 group">
                                <p
                                    class="font-heading font-bold text-sbk-gray-mid
                                          group-hover:text-sbk-red text-xs text-center
                                          leading-tight transition-colors">
                                    <?php echo e($name); ?>

                                </p>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>

        
        <div class="relative" x-data="{ paused: false }" data-reveal="fade-in" data-delay="200">
            <div class="flex gap-6 marquee-right" :class="paused ? 'paused' : ''" @mouseenter="paused = true"
                @mouseleave="paused = false">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php for($r = 0; $r < 2; $r++): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clients->count()): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clients->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div
                                class="flex-shrink-0 w-52 h-28 bg-sbk-gray-light border border-transparent
                                rounded-2xl flex items-center justify-center p-5
                                hover:bg-white hover:border-sbk-red/20 hover:shadow-card
                                transition-all duration-300 group">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                                    <img src="<?php echo e(Storage::url($client->logo)); ?>" alt="<?php echo e($client->name); ?>"
                                        class="max-h-14 max-w-full object-contain
                                        grayscale group-hover:grayscale-0
                                        opacity-50 group-hover:opacity-100
                                        transition-all duration-300">
                                <?php else: ?>
                                    <p
                                        class="font-heading font-bold text-sbk-gray-mid
                                              group-hover:text-sbk-red text-xs text-center
                                              leading-tight transition-colors">
                                        <?php echo e($client->name); ?>

                                    </p>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php else: ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_reverse($defaultClients); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div
                                class="flex-shrink-0 w-52 h-28 bg-sbk-gray-light border border-transparent
                                rounded-2xl flex items-center justify-center p-5
                                hover:bg-white hover:border-sbk-red/20 hover:shadow-card
                                transition-all duration-300 group">
                                <p
                                    class="font-heading font-bold text-sbk-gray-mid
                                          group-hover:text-sbk-red text-xs text-center
                                          leading-tight transition-colors">
                                    <?php echo e($name); ?>

                                </p>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="section-padding bg-sbk-gray-light">
        <div class="container-sbk">
            <div class="text-center mb-14" data-reveal="fade-up">
                <span class="section-tag justify-center">Semua Klien</span>
                <h2 class="section-title mt-2">Daftar Lengkap <span>Klien Kami</span></h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($clients->count()): ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div data-reveal="fade-up" data-delay="<?php echo e(($i % 4) * 100); ?>"
                            class="bg-white rounded-2xl p-8 flex flex-col items-center justify-center
                            min-h-40 shadow-soft hover:shadow-card transition-all duration-300
                            hover:-translate-y-1 group border border-transparent
                            hover:border-sbk-red/20">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->logo): ?>
                                <img src="<?php echo e(Storage::url($client->logo)); ?>" alt="<?php echo e($client->name); ?>"
                                    class="max-h-16 max-w-full object-contain mb-4
                                    grayscale group-hover:grayscale-0
                                    opacity-60 group-hover:opacity-100
                                    transition-all duration-300">
                            <?php else: ?>
                                <div
                                    class="w-12 h-12 bg-sbk-red/10 rounded-xl flex items-center
                                            justify-center mb-4 group-hover:bg-sbk-red transition-colors">
                                    <span
                                        class="font-heading font-black text-sbk-red
                                                 group-hover:text-white text-lg transition-colors">
                                        <?php echo e(substr($client->name, 3, 1)); ?>

                                    </span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <p
                                class="font-heading font-bold text-sbk-black text-xs text-center
                                      leading-snug group-hover:text-sbk-red transition-colors">
                                <?php echo e($client->name); ?>

                            </p>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($client->industry): ?>
                                <p class="text-gray-400 text-xs mt-1 text-center"><?php echo e($client->industry); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php else: ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $defaultClients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div data-reveal="fade-up" data-delay="<?php echo e(($i % 4) * 100); ?>"
                            class="bg-white rounded-2xl p-8 flex flex-col items-center justify-center
                            min-h-40 shadow-soft hover:shadow-card transition-all duration-300
                            hover:-translate-y-1 group border border-transparent
                            hover:border-sbk-red/20">
                            <div
                                class="w-12 h-12 bg-sbk-red/10 rounded-xl flex items-center
                                        justify-center mb-4 group-hover:bg-sbk-red transition-colors">
                                <span
                                    class="font-heading font-black text-sbk-red
                                             group-hover:text-white text-lg transition-colors">
                                    <?php echo e(substr($name, 3, 1)); ?>

                                </span>
                            </div>
                            <p
                                class="font-heading font-bold text-sbk-black text-xs text-center
                                      leading-snug group-hover:text-sbk-red transition-colors">
                                <?php echo e($name); ?>

                            </p>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="py-20 bg-sbk-red relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: repeating-linear-gradient(45deg,#fff 0,#fff 1px,transparent 0,transparent 15px);
                background-size: 20px 20px;">
        </div>
        <div class="container-sbk text-center relative z-10">
            <h2 class="font-heading font-black text-4xl text-white mb-4" data-reveal="fade-up">
                Bergabung Bersama Klien Kami
            </h2>
            <p class="text-white/80 mb-8 max-w-xl mx-auto" data-reveal="fade-up" data-delay="100">
                Jadilah bagian dari keluarga besar Sastra Bhinneka Karya.
                Hubungi kami untuk konsultasi gratis.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center pt-2" data-reveal="fade-up" data-delay="200">
                <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                    target="_blank"
                    class="inline-flex items-center justify-center gap-3 bg-white text-sbk-red font-bold px-10 py-4 rounded-2xl hover:bg-gray-100 transition-all duration-300 hover:scale-105 shadow-lg whitespace-nowrap">
                    <svg class="w-5 h-5 flex-shrink-0" style="color: #25D366" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    Hubungi Kami Sekarang
                </a>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/clients.blade.php ENDPATH**/ ?>