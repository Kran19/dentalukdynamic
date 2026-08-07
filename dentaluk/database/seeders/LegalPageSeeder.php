<?php

namespace Database\Seeders;

use App\Models\LegalPage;
use Illuminate\Database\Seeder;

class LegalPageSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Complaints Policy
        LegalPage::updateOrCreate(
            ['slug' => 'complaints'],
            [
                'title' => 'Complaints Policy & Procedure',
                'meta_title' => 'Complaints Policy | Icon Dental Wembley',
                'meta_description' => 'Our formal patient complaints procedure under GDC and Care Quality Commission (CQC) guidelines.',
                'content' => '
                    <h2>Complaints Policy & Procedure</h2>
                    <p>At Icon Dental Wembley, we strive to provide the highest standard of patient care. If you are unhappy with any aspect of our service, we take complaints very seriously and aim to resolve them promptly and courteously.</p>
                    
                    <h3>Stage 1: Internal Complaint Procedure</h3>
                    <p>Please contact our Practice Manager with details of your complaint:</p>
                    <ul>
                        <li><strong>Email:</strong> admin@icondentalwembley.co.uk</li>
                        <li><strong>Telephone:</strong> 020 8998 3030</li>
                        <li><strong>Post:</strong> Icon Dental Wembley, 267A Ealing Road, Wembley, Middlesex, HA0 1EU</li>
                    </ul>
                    <p>We will acknowledge your complaint within 3 working days and provide a full written response within 10 working days following investigation.</p>

                    <h3>Stage 2: Independent Escalation</h3>
                    <p>If you remain dissatisfied with our response, you may escalate your complaint to:</p>
                    <ul>
                        <li><strong>Private Dental Complaints Service (DCS):</strong> Call 020 8253 0800 or visit <a href="https://dcs.gdc-uk.org" target="_blank">dcs.gdc-uk.org</a></li>
                        <li><strong>NHS Patients (Parliamentary & Health Service Ombudsman):</strong> Visit <a href="https://www.ombudsman.org.uk" target="_blank">ombudsman.org.uk</a></li>
                    </ul>
                ',
                'is_published' => true,
            ]
        );

        // 2. Data Protection Policy
        LegalPage::updateOrCreate(
            ['slug' => 'data-protection'],
            [
                'title' => 'Data Protection Policy',
                'meta_title' => 'Data Protection Policy | Icon Dental Wembley',
                'meta_description' => 'Information on how patient medical records and personal data are safeguarded under UK GDPR.',
                'content' => '
                    <h2>Data Protection & Patient Records</h2>
                    <p>Icon Dental Wembley is committed to fulfilling our obligations under the UK General Data Protection Regulation (UK GDPR) and Data Protection Act 2018.</p>

                    <h3>Why We Collect Data</h3>
                    <p>We process personal and confidential medical data to provide safe clinical dental treatment, manage appointments, and communicate treatment plans.</p>

                    <h3>Subject Access Requests (SAR)</h3>
                    <p>Patients have the right to request copies of their dental and medical records. Requests should be submitted in writing to the Practice Manager. Records will be provided within 30 days free of charge.</p>
                ',
                'is_published' => true,
            ]
        );

        // 3. Cookies Policy
        LegalPage::updateOrCreate(
            ['slug' => 'cookies-policy'],
            [
                'title' => 'Cookies Policy',
                'meta_title' => 'Cookies Policy | Icon Dental Wembley',
                'meta_description' => 'Details on cookies used on our website for performance, analytical, and functional purposes.',
                'content' => '
                    <h2>Cookies Policy</h2>
                    <p>Our website uses small text files called cookies to enhance user navigation and analyze traffic patterns.</p>

                    <h3>Types of Cookies We Use</h3>
                    <ul>
                        <li><strong>Essential Cookies:</strong> Required for secure session authentication and form submissions.</li>
                        <li><strong>Analytical Cookies:</strong> Anonymous Google Analytics tracking to improve page loading and user flow.</li>
                    </ul>
                    <p>You can adjust your browser settings at any time to block non-essential cookies.</p>
                ',
                'is_published' => true,
            ]
        );

        // 4. Privacy Policy
        LegalPage::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'title' => 'Privacy Policy',
                'meta_title' => 'Privacy Policy | Icon Dental Wembley',
                'meta_description' => 'Comprehensive privacy disclosure for patients and site visitors at Icon Dental Wembley.',
                'content' => '
                    <h2>Privacy Policy</h2>
                    <p>Icon Dental Wembley respects your privacy and is committed to protecting your personal data.</p>

                    <h3>Information We Collect</h3>
                    <p>We collect contact information (name, email, phone number) when you submit an online booking form or GDP referral request.</p>

                    <h3>Data Security</h3>
                    <p>All transmitted form data is encrypted via SSL/TLS protocols and stored securely in access-restricted databases.</p>
                ',
                'is_published' => true,
            ]
        );

        // 5. Terms of Use
        LegalPage::updateOrCreate(
            ['slug' => 'terms-of-use'],
            [
                'title' => 'Terms of Use',
                'meta_title' => 'Terms of Use | Icon Dental Wembley',
                'meta_description' => 'Website usage terms, intellectual property disclosures, and appointment cancellation conditions.',
                'content' => '
                    <h2>Terms of Use</h2>
                    <p>Welcome to the Icon Dental Wembley website. By accessing this site, you agree to comply with these terms of use.</p>

                    <h3>Appointment Cancellation Policy</h3>
                    <p>We require at least 24 hours notice for appointment cancellations or rescheduling. Short notice cancellations may incur a deposit fee.</p>

                    <h3>Medical Information Disclaimer</h3>
                    <p>Information on this website is for general educational purposes and does not replace a clinical examination by a qualified dentist.</p>
                ',
                'is_published' => true,
            ]
        );
    }
}
