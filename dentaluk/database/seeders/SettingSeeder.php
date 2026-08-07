<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'Icon Dental Wembley', 'group' => 'general', 'type' => 'text', 'label' => 'Site Name'],
            ['key' => 'phone', 'value' => '020 8998 3030', 'group' => 'contact', 'type' => 'text', 'label' => 'Phone Number'],
            ['key' => 'phone_clean', 'value' => '+442089983030', 'group' => 'contact', 'type' => 'text', 'label' => 'Clean Phone Number'],
            ['key' => 'fax', 'value' => '0208 998 4052', 'group' => 'contact', 'type' => 'text', 'label' => 'Fax Number'],
            ['key' => 'email', 'value' => 'reception@icondentalwembley.co.uk', 'group' => 'contact', 'type' => 'text', 'label' => 'Primary Email'],
            ['key' => 'address', 'value' => '267A Ealing Road, Wembley, HA0 1EU', 'group' => 'contact', 'type' => 'textarea', 'label' => 'Clinic Address'],
            ['key' => 'map_link', 'value' => 'https://maps.app.goo.gl/3547GffVjmtn1XJg8', 'group' => 'contact', 'type' => 'text', 'label' => 'Google Maps Link'],
            ['key' => 'map_embed', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2480.9782834164137!2d-0.29959662337626966!3d51.54934897182283!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4876137ee1df52bd%3A0x6b4dbf4d1e2e4e1a!2s267A%20Ealing%20Rd%2C%20Wembley%20HA0%201EU!5e0!3m2!1sen!2suk!4v1700000000000!5m2!1sen!2suk', 'group' => 'contact', 'type' => 'textarea', 'label' => 'Google Maps Embed Iframe URL'],
            ['key' => 'hours_json', 'value' => json_encode(config('clinic.hours')), 'group' => 'contact', 'type' => 'json', 'label' => 'Opening Hours Schedule'],
            ['key' => 'default_meta_title', 'value' => 'Icon Dental- Wembley | Exceptional Dental Care', 'group' => 'seo', 'type' => 'text', 'label' => 'Default SEO Title'],
            ['key' => 'default_meta_description', 'value' => 'At Icon Dental- Wembley, we combine advanced technology with a gentle, personal touch to create healthy, confident smiles that last a lifetime.', 'group' => 'seo', 'type' => 'textarea', 'label' => 'Default SEO Description'],
        ];

        foreach ($settings as $s) {
            Setting::updateOrCreate(['key' => $s['key']], $s);
        }
    }
}
