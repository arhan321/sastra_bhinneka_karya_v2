cat > src/resources/views/filament/widgets/quick-summary.blade.php << 'EOF' <?php if (isset($component)) { $__componentOriginalb525200bfa976483b4eaa0b7685c6e24 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb525200bfa976483b4eaa0b7685c6e24 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament-widgets::components.widget','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament-widgets::widget'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <?php if (isset($component)) { $__componentOriginalee08b1367eba38734199cf7829b1d1e9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalee08b1367eba38734199cf7829b1d1e9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'filament::components.section.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('filament::section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

         <?php $__env->slot('heading', null, []); ?> Ringkasan Data <?php $__env->endSlot(); ?>
         <?php $__env->slot('description', null, []); ?> Overview konten website saat ini <?php $__env->endSlot(); ?>

        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px;">
            <div style="background: #fff1f2; border: 1px solid #fecdd3; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">🔧 LAYANAN</p>
                <p style="font-size: 28px; font-weight: 900; color: #dc2626; margin: 0;"><?php echo e($activeServices); ?></p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;"><?php echo e($totalServices); ?> total terdaftar</p>
                <hr style="margin: 8px 0; border-color: #fecdd3;">
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">🏗 Konstruksi:
                    <strong><?php echo e($constructionCount); ?></strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">📄 Non-Konstruksi:
                    <strong><?php echo e($nonConstructionCount); ?></strong></p>
            </div>

            <div style="background: #fffbeb; border: 1px solid #fde68a; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">📁 PORTOFOLIO</p>
                <p style="font-size: 28px; font-weight: 900; color: #d97706; margin: 0;"><?php echo e($visiblePortfolios); ?></p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;"><?php echo e($totalPortfolios); ?> total terdaftar</p>
                <hr style="margin: 8px 0; border-color: #fde68a;">
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">👁 Tampil:
                    <strong><?php echo e($visiblePortfolios); ?></strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">🙈 Tersembunyi:
                    <strong><?php echo e($totalPortfolios - $visiblePortfolios); ?></strong></p>
            </div>

            <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">🏢 KLIEN</p>
                <p style="font-size: 28px; font-weight: 900; color: #16a34a; margin: 0;"><?php echo e($activeClients); ?></p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;"><?php echo e($totalClients); ?> total terdaftar</p>
                <hr style="margin: 8px 0; border-color: #bbf7d0;">
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">✅ Aktif:
                    <strong><?php echo e($activeClients); ?></strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">❌ Nonaktif:
                    <strong><?php echo e($totalClients - $activeClients); ?></strong></p>
            </div>

            <div style="background: #eff6ff; border: 1px solid #bfdbfe; border-radius: 12px; padding: 16px;">
                <p style="font-size: 12px; color: #6b7280; margin-bottom: 8px; font-weight: 600;">✉️ PESAN</p>
                <p style="font-size: 28px; font-weight: 900; color: #2563eb; margin: 0;"><?php echo e($newMessages); ?></p>
                <p style="font-size: 11px; color: #9ca3af; margin-top: 4px;"><?php echo e($totalMessages); ?> total pesan</p>
                <hr style="margin: 8px 0; border-color: #bfdbfe;">
                <p style="font-size: 11px; color: #dc2626; margin: 2px 0;">🔴 Belum dibaca:
                    <strong><?php echo e($newMessages); ?></strong></p>
                <p style="font-size: 11px; color: #6b7280; margin: 2px 0;">✅ Dibaca:
                    <strong><?php echo e($totalMessages - $newMessages); ?></strong></p>
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalee08b1367eba38734199cf7829b1d1e9)): ?>
<?php $attributes = $__attributesOriginalee08b1367eba38734199cf7829b1d1e9; ?>
<?php unset($__attributesOriginalee08b1367eba38734199cf7829b1d1e9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalee08b1367eba38734199cf7829b1d1e9)): ?>
<?php $component = $__componentOriginalee08b1367eba38734199cf7829b1d1e9; ?>
<?php unset($__componentOriginalee08b1367eba38734199cf7829b1d1e9); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb525200bfa976483b4eaa0b7685c6e24)): ?>
<?php $attributes = $__attributesOriginalb525200bfa976483b4eaa0b7685c6e24; ?>
<?php unset($__attributesOriginalb525200bfa976483b4eaa0b7685c6e24); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb525200bfa976483b4eaa0b7685c6e24)): ?>
<?php $component = $__componentOriginalb525200bfa976483b4eaa0b7685c6e24; ?>
<?php unset($__componentOriginalb525200bfa976483b4eaa0b7685c6e24); ?>
<?php endif; ?>
    EOF
<?php /**PATH /var/www/html/resources/views/filament/widgets/quick-summary.blade.php ENDPATH**/ ?>