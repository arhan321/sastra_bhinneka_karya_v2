<?php

namespace App\Filament\Pages;

use App\Models\HeroImage;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Storage;

class ManageHeroImages extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.manage-hero-images';

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-photo';
    }
    public static function getNavigationLabel(): string
    {
        return 'Foto Background Hero';
    }
    public static function getNavigationGroup(): ?string
    {
        return 'Konten Website';
    }
    public static function getNavigationSort(): ?int
    {
        return 2;
    }

    public ?array $data = [];

    public function mount(): void
    {
        $images = HeroImage::orderBy('sort_order')->take(5)->get();
        $filled = [];
        foreach ($images as $i => $img) {
            $filled[] = [
                'id'         => $img->id,
                'image_path' => $img->image_path,
                'is_active'  => $img->is_active,
            ];
        }
        // Isi sisa slot kosong sampai 5
        while (count($filled) < 5) {
            $filled[] = ['id' => null, 'image_path' => null, 'is_active' => true];
        }
        $this->form->fill(['slots' => $filled]);
    }

    public function form(Schema $form): Schema
    {
        $slots = [];
        for ($i = 1; $i <= 5; $i++) {
            $slots[] = Section::make("Foto $i")
                ->schema([
                    Hidden::make("slots.$i.id"),
                    FileUpload::make("slots.$i.image_path")
                        ->label('Upload Foto')
                        ->image()
                        ->disk('public')
                        ->directory('homepage/hero')
                        ->maxSize(10240)
                        ->imageResizeMode('cover')
                        ->helperText('JPG, PNG, WebP · Maks 10MB · Rekomendasi 1920×1080px')
                        ->columnSpanFull(),
                    Toggle::make("slots.$i.is_active")
                        ->label('Tampilkan foto ini')
                        ->default(true),
                ]);
        }

        return $form
            ->components($slots)
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Semua Foto')
                ->action('save')
                ->color('primary')
                ->icon('heroicon-o-check'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $slots = $data['slots'] ?? [];

        foreach ($slots as $i => $slot) {
            $imagePath = $slot['image_path'] ?? null;
            $isActive  = $slot['is_active'] ?? true;
            $id        = $slot['id'] ?? null;
            $sortOrder = $i; // 1-based index

            if ($imagePath) {
                if ($id) {
                    HeroImage::where('id', $id)->update([
                        'image_path' => $imagePath,
                        'sort_order' => $sortOrder,
                        'is_active'  => $isActive,
                    ]);
                } else {
                    $new = HeroImage::create([
                        'image_path' => $imagePath,
                        'sort_order' => $sortOrder,
                        'is_active'  => $isActive,
                    ]);
                    // Update id di data supaya tidak dobel create
                    $this->data['slots'][$i]['id'] = $new->id;
                }
            } elseif ($id) {
                // Foto dikosongkan - hapus record & file
                $record = HeroImage::find($id);
                if ($record) {
                    Storage::disk('public')->delete($record->image_path);
                    $record->delete();
                }
                $this->data['slots'][$i]['id'] = null;
            }
        }

        Notification::make()
            ->title('Foto background berhasil disimpan!')
            ->success()
            ->send();
    }

    public function getTitle(): string
    {
        return 'Foto Background Hero';
    }
}
