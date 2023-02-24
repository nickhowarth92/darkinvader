<?php

namespace Tests\Feature;

//Models
use App\Models\Ticket;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    /**
     * Test to see if we can view tickets that are open
     */
    public function test_open_tickets() : void 
    {
        // User::factory(10)->create();
        // Ticket::factory10()->create();

        $response = $this->get('/tickets/closed');
        $response->assertStatus(200);

    }
}
