<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $table = 'homepage_settings';

    protected $fillable = [
        // Hero
        'hero_background_image',
        'hero_logo_image',
        'hero_badge_text',
        'hero_title_line1',
        'hero_title_line2',
        'hero_title_line3',
        'hero_tagline',
        'hero_description',
        'hero_btn_primary_text',
        'hero_btn_secondary_text',
        'hero_whatsapp_number',
        'hero_whatsapp_message',

        // Stats
        'stat_clients',
        'stat_projects',
        'stat_services',
        'stat_years',
        'stat_clients_label',
        'stat_projects_label',
        'stat_services_label',
        'stat_years_label',

        // About
        'about_image',
        'about_section_tag',
        'about_title',
        'about_description',
        'about_highlights',

        // CTA
        'cta_section_tag',
        'cta_title',
        'cta_title_highlight',
        'cta_description',
        'cta_btn_text',

        // Contact
        'contact_address',
        'contact_phone',
        'contact_email',
        'contact_maps_embed_url',

        // SEO
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'about_highlights' => 'array',
        'stat_clients'     => 'integer',
        'stat_projects'    => 'integer',
        'stat_services'    => 'integer',
        'stat_years'       => 'integer',
    ];

    /**
     * Ambil satu-satunya baris setting (singleton pattern).
     * Kalau belum ada, buat dengan nilai default.
     */
    public static function getInstance(): static
    {
        return static::firstOrCreate([], []);
    }
}
