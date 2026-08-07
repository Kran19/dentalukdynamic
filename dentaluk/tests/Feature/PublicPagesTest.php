<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    public function test_homepage_loads_successfully(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('ICON DENTAL Wembley');
    }

    public function test_about_page_loads_successfully(): void
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
        $response->assertSee('Exceptional Dental Care');
    }

    public function test_team_page_loads_and_displays_seeded_doctors(): void
    {
        $response = $this->get('/about/meet-the-team');
        $response->assertStatus(200);
        $response->assertSee('Dr Kishan Sheth');
        $response->assertSee('Principal Dentist');
    }

    public function test_treatments_page_loads_successfully(): void
    {
        $response = $this->get('/treatments');
        $response->assertStatus(200);
        $response->assertSee('Check My Teeth');
    }

    public function test_fees_page_loads_and_displays_fee_items(): void
    {
        $response = $this->get('/fees-membership');
        $response->assertStatus(200);
        $response->assertSee('New Patient Consultation');
        $response->assertSee('from £45.00');
    }

    public function test_contact_page_loads_successfully(): void
    {
        $response = $this->get('/contact-us');
        $response->assertStatus(200);
        $response->assertSee('267A Ealing Road');
    }
}
