<x-filament-panels::page>
    <form wire:submit="save">
        {{ $this->form }}
        <div class="mt-6 flex justify-end">
            <x-filament::button type="submit" color="primary" icon="heroicon-o-check">
                Simpan Semua Foto
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>