<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdvertisementsTest extends TestCase
{
    use RefreshDatabase;
    
    /** @test */
    public function user_can_see_company_register_form()
    {
        $response = $this->get('/rejestracja-firma');

        $response
        ->assertStatus(200)
        ->assertSeeText('Zarejestruj się');
    }
}
