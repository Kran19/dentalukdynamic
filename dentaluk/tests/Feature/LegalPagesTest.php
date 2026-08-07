<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_complaints_page_loads_successfully(): void
    {
        $response = $this->get('/complaints');
        $response->assertStatus(200);
        $response->assertSee('Complaints Policy & Procedure', false);
    }

    public function test_data_protection_page_loads_successfully(): void
    {
        $response = $this->get('/data-protection');
        $response->assertStatus(200);
        $response->assertSee('Data Protection');
    }

    public function test_cookies_policy_page_loads_successfully(): void
    {
        $response = $this->get('/cookies-policy');
        $response->assertStatus(200);
        $response->assertSee('Cookies Policy');
    }

    public function test_privacy_policy_page_loads_successfully(): void
    {
        $response = $this->get('/privacy-policy');
        $response->assertStatus(200);
        $response->assertSee('Privacy Policy');
    }

    public function test_terms_of_use_page_loads_successfully(): void
    {
        $response = $this->get('/terms-of-use');
        $response->assertStatus(200);
        $response->assertSee('Terms of Use');
    }
}
