<?php $__env->startSection('title', $post->title); ?>

<?php $__env->startSection('content'); ?>

    <?php
        use Illuminate\Support\Facades\Storage;
        use Illuminate\Support\Str;
        use Illuminate\Support\Arr;

        /*
        |--------------------------------------------------------------------------
        | Safe Category Label
        |--------------------------------------------------------------------------
        | Error sebelumnya terjadi karena $post->category berbentuk array,
        | sedangkan {{ }} di Blade hanya aman untuk string.
        |
        | Jadi category kita ubah dulu menjadi string sebelum ditampilkan.
        */
        $categoryLabel = $post->category ?? null;

        if (is_array($categoryLabel)) {
            $categoryLabel = collect(Arr::flatten($categoryLabel))
                ->filter(fn ($item) => filled($item))
                ->map(fn ($item) => (string) $item)
                ->implode(', ');
        }

        if (is_string($categoryLabel)) {
            $categoryLabel = trim($categoryLabel);
        }
    ?>

    
    <section class="bg-sbk-black py-28 relative overflow-hidden">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->thumbnail): ?>
            <div class="absolute inset-0 z-0">
                <img src="<?php echo e(Storage::url($post->thumbnail)); ?>" class="w-full h-full object-cover" alt="">
                <div class="absolute inset-0" style="background: rgba(0,0,0,0.82); z-index: 10;"></div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="container-sbk relative z-20">
            <div class="flex items-center gap-2 mb-4 flex-wrap">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($categoryLabel)): ?>
                    <span class="bg-sbk-red text-white text-xs font-bold px-3 py-1.5 rounded-full capitalize">
                        <?php echo e($categoryLabel); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $post->tags_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <span class="bg-white/10 text-white text-xs px-3 py-1.5 rounded-full">
                        <?php echo e($tag); ?>

                    </span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <h1 class="font-heading font-black text-white text-3xl lg:text-5xl leading-tight max-w-3xl mb-4">
                <?php echo e($post->title); ?>

            </h1>

            <div class="flex items-center gap-4 text-gray-400 text-sm flex-wrap">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->author): ?>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <?php echo e($post->author); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->published_at): ?>
                    <span class="flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <?php echo e($post->published_at->format('d F Y')); ?>

                    </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <span class="flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <?php echo e($post->views); ?> views
                </span>
            </div>

            <div class="flex items-center gap-2 mt-4 text-xs text-gray-500">
                <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Beranda</a>
                <span>/</span>
                <a href="<?php echo e(route('blog')); ?>" class="hover:text-white transition-colors">Blog</a>
                <span>/</span>
                <span class="text-gray-400 line-clamp-1"><?php echo e(Str::limit($post->title, 40)); ?></span>
            </div>
        </div>
    </section>

    
    <section class="section-padding bg-white">
        <div class="container-sbk">
            <div class="grid lg:grid-cols-3 gap-12">

                
                <div class="lg:col-span-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->thumbnail): ?>
                        <img src="<?php echo e(Storage::url($post->thumbnail)); ?>" alt="<?php echo e($post->title); ?>"
                            class="w-full max-h-[500px] object-contain rounded-xl mb-8 mx-auto">
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <div
                        class="prose prose-lg max-w-none
                            prose-headings:font-heading prose-headings:font-bold prose-headings:text-sbk-black
                            prose-p:text-gray-600 prose-p:leading-relaxed
                            prose-a:text-sbk-red prose-a:no-underline hover:prose-a:underline
                            prose-strong:text-sbk-black prose-li:text-gray-600
                            prose-img:rounded-xl prose-blockquote:border-sbk-red prose-blockquote:text-gray-500">
                        <?php echo $post->content; ?>

                    </div>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->tags_array): ?>
                        <div class="flex flex-wrap gap-2 mt-8 pt-6 border-t border-gray-100">
                            <span class="text-xs text-gray-400 font-bold uppercase tracking-widest self-center">Tags:</span>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $post->tags_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <a href="<?php echo e(route('blog')); ?>?tag=<?php echo e(urlencode($tag)); ?>"
                                    class="text-xs bg-sbk-gray-light border border-gray-200 text-gray-600 px-3 py-1.5 rounded-full hover:bg-sbk-red hover:text-white hover:border-sbk-red transition-all">
                                    <?php echo e($tag); ?>

                                </a>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="mt-12 pt-8 border-t border-gray-100" x-data="{ replyTo: null, replyName: '' }">

                        
                        <div class="mb-10">
                            <h3 class="font-heading font-bold text-sbk-black text-xl mb-6 flex items-center gap-3">
                                <div class="w-8 h-8 bg-sbk-red rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                Tinggalkan Komentar
                            </h3>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('comment_success')): ?>
                                <div
                                    class="bg-green-50 border border-green-200 text-green-700 rounded-xl px-4 py-3 mb-6 text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    <?php echo e(session('comment_success')); ?>

                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            
                            <div x-show="replyTo !== null" x-transition
                                class="bg-sbk-red/5 border border-sbk-red/20 rounded-xl px-4 py-3 mb-4 flex items-center justify-between"
                                style="display:none;">
                                <span class="text-sbk-red text-sm font-semibold">
                                    Membalas komentar <span class="font-bold" x-text="replyName"></span>
                                </span>
                                <button type="button" @click="replyTo = null; replyName = ''"
                                    class="text-sbk-red hover:text-sbk-red-dark">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <form action="<?php echo e(route('blog.comment.store', $post->slug)); ?>" method="POST"
                                class="bg-sbk-gray-light rounded-xl p-6 space-y-4">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="parent_id" :value="replyTo">

                                <div class="grid md:grid-cols-2 gap-4">
                                    <div>
                                        <label
                                            class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">
                                            Nama <span class="text-sbk-red">*</span>
                                        </label>
                                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                                            class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            placeholder="Nama lengkap Anda">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>

                                    <div>
                                        <label
                                            class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">
                                            Email <span class="text-gray-400 font-normal normal-case">(opsional)</span>
                                        </label>
                                        <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                            class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors"
                                            placeholder="email@contoh.com">
                                    </div>
                                </div>

                                <div>
                                    <label class="text-sbk-black text-xs font-bold uppercase tracking-widest mb-2 block">
                                        Pesan <span class="text-sbk-red">*</span>
                                    </label>
                                    <textarea name="message" rows="4" required
                                        class="w-full bg-white border border-gray-200 rounded-lg px-4 py-3 text-sm text-sbk-black placeholder-gray-400 focus:outline-none focus:border-sbk-red transition-colors resize-none <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-400 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        placeholder="Tuliskan komentar Anda..."><?php echo e(old('message')); ?></textarea>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <div class="flex items-center gap-3">
                                    <button type="submit"
                                        class="inline-flex items-center gap-2 bg-sbk-red text-white font-bold text-sm px-6 py-2.5 rounded-lg hover:bg-sbk-red-dark transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                        </svg>
                                        Post Comment
                                    </button>
                                    <p class="text-gray-400 text-xs">* Komentar akan dimoderasi sebelum ditampilkan</p>
                                </div>
                            </form>
                        </div>

                        
                        <?php
                            $totalComments = $comments->sum(fn ($c) => 1 + $c->replies->count());
                        ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comments->count()): ?>
                            <div>
                                <h3 class="font-heading font-bold text-sbk-black text-xl mb-6 flex items-center gap-2">
                                    Comments
                                    <span class="bg-sbk-red text-white text-xs font-bold px-2.5 py-1 rounded-full">
                                        <?php echo e($totalComments); ?>

                                    </span>
                                </h3>

                                <div class="space-y-5">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                        
                                        <div class="group">
                                            <div class="flex gap-4">
                                                <div
                                                    class="w-10 h-10 bg-sbk-red/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                                    <span class="text-sbk-red font-bold text-sm">
                                                        <?php echo e(strtoupper(substr($comment->name, 0, 1))); ?>

                                                    </span>
                                                </div>

                                                <div class="flex-1">
                                                    <div class="bg-sbk-gray-light rounded-xl px-5 py-4">
                                                        <div
                                                            class="flex items-center justify-between mb-2 flex-wrap gap-2">
                                                            <span class="font-bold text-sbk-black text-sm">
                                                                <?php echo e($comment->name); ?>

                                                            </span>
                                                            <span class="text-gray-400 text-xs">
                                                                <?php echo e($comment->created_at->format('d M Y, H:i')); ?>

                                                            </span>
                                                        </div>
                                                        <p class="text-gray-600 text-sm leading-relaxed">
                                                            <?php echo e($comment->message); ?>

                                                        </p>
                                                    </div>

                                                    
                                                    <button type="button"
                                                        @click="replyTo = <?php echo e($comment->id); ?>; replyName = <?php echo \Illuminate\Support\Js::from($comment->name)->toHtml() ?>; $nextTick(() => document.querySelector('textarea[name=message]').focus())"
                                                        class="flex items-center gap-1.5 text-xs text-gray-400 hover:text-sbk-red transition-colors mt-2 ml-1">
                                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                                                        </svg>
                                                        Balas
                                                    </button>

                                                    
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($comment->replies->count()): ?>
                                                        <div class="mt-4 space-y-3 pl-4 border-l-2 border-sbk-red/20">
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $comment->replies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                <div class="flex gap-3">
                                                                    <div
                                                                        class="w-8 h-8 bg-sbk-red/10 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                                                        <span class="text-sbk-red font-bold text-xs">
                                                                            <?php echo e(strtoupper(substr($reply->name, 0, 1))); ?>

                                                                        </span>
                                                                    </div>

                                                                    <div class="flex-1">
                                                                        <div
                                                                            class="bg-white border border-gray-100 rounded-xl px-4 py-3">
                                                                            <div
                                                                                class="flex items-center justify-between mb-1.5 flex-wrap gap-2">
                                                                                <span
                                                                                    class="font-bold text-sbk-black text-xs">
                                                                                    <?php echo e($reply->name); ?>

                                                                                </span>
                                                                                <span class="text-gray-400 text-xs">
                                                                                    <?php echo e($reply->created_at->format('d M Y, H:i')); ?>

                                                                                </span>
                                                                            </div>
                                                                            <p class="text-gray-600 text-sm leading-relaxed">
                                                                                <?php echo e($reply->message); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                        </div>
                                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-10 bg-sbk-gray-light rounded-xl">
                                <div
                                    class="w-12 h-12 bg-sbk-red/10 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-6 h-6 text-sbk-red" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                                <p class="text-gray-500 text-sm">Belum ada komentar. Jadilah yang pertama!</p>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                
                <div class="space-y-8">

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recentPosts->count()): ?>
                        <div class="bg-sbk-gray-light rounded-xl p-6">
                            <h4
                                class="font-heading font-bold text-sbk-black text-sm uppercase tracking-widest mb-4 pb-3 border-b border-gray-200">
                                Recent Post
                            </h4>

                            <div class="space-y-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('blog.show', $recent->slug)); ?>"
                                        class="group flex gap-3 hover:bg-white rounded-xl p-2 transition-colors <?php echo e($recent->id === $post->id ? 'opacity-50 pointer-events-none' : ''); ?>">
                                        <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recent->thumbnail): ?>
                                                <img src="<?php echo e(Storage::url($recent->thumbnail)); ?>"
                                                    alt="<?php echo e($recent->title); ?>" class="w-full h-full object-cover">
                                            <?php else: ?>
                                                <div class="w-full h-full bg-sbk-gray flex items-center justify-center">
                                                    <span class="text-white/30 font-black text-lg">S</span>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>

                                        <div>
                                            <h5
                                                class="font-bold text-sbk-black text-xs leading-snug group-hover:text-sbk-red transition-colors line-clamp-2 mb-1">
                                                <?php echo e($recent->title); ?>

                                            </h5>
                                            <p class="text-gray-400 text-xs">
                                                <?php echo e($recent->published_at?->format('d M Y')); ?>

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
                                    <a href="<?php echo e(route('blog')); ?>?tag=<?php echo e(urlencode($tag)); ?>"
                                        class="text-xs bg-white border border-gray-200 text-gray-600 px-3 py-1.5 rounded-full hover:bg-sbk-red hover:text-white hover:border-sbk-red transition-all">
                                        <?php echo e($tag); ?>

                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($related->count()): ?>
                        <div class="bg-sbk-gray-light rounded-xl p-6">
                            <h4
                                class="font-heading font-bold text-sbk-black text-sm uppercase tracking-widest mb-4 pb-3 border-b border-gray-200">
                                Artikel Terkait
                            </h4>

                            <div class="space-y-4">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <a href="<?php echo e(route('blog.show', $rel->slug)); ?>"
                                        class="group flex gap-3 hover:bg-white rounded-xl p-2 transition-colors">
                                        <div class="w-16 h-16 rounded-lg overflow-hidden flex-shrink-0">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($rel->thumbnail): ?>
                                                <img src="<?php echo e(Storage::url($rel->thumbnail)); ?>" alt="<?php echo e($rel->title); ?>"
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                            <?php else: ?>
                                                <div class="w-full h-full bg-sbk-gray flex items-center justify-center">
                                                    <span class="text-white/30 font-black text-lg">S</span>
                                                </div>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </div>

                                        <div>
                                            <h5
                                                class="font-bold text-sbk-black text-xs leading-snug group-hover:text-sbk-red transition-colors line-clamp-2 mb-1">
                                                <?php echo e($rel->title); ?>

                                            </h5>
                                            <p class="text-gray-400 text-xs">
                                                <?php echo e($rel->published_at?->format('d M Y')); ?>

                                            </p>
                                        </div>
                                    </a>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    
                    <div class="bg-sbk-red rounded-xl p-6 text-center">
                        <h4 class="font-heading font-bold text-white text-base mb-2">Butuh Konsultasi?</h4>
                        <p class="text-white/70 text-xs mb-4">Tim ahli kami siap membantu kebutuhan Anda.</p>

                        <a href="https://api.whatsapp.com/send?phone=6281312023435&text=<?php echo e(urlencode('Halo Sastra Bhinneka Karya, saya ingin konsultasi lebih lanjut.')); ?>"
                            target="_blank"
                            class="inline-flex items-center justify-center gap-2 bg-white text-sbk-red font-bold text-sm px-5 py-2.5 rounded-xl hover:bg-gray-100 transition-colors w-full">
                            Hubungi Kami via WA
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/blog-detail.blade.php ENDPATH**/ ?>