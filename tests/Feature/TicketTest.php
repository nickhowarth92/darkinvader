<?php

namespace Tests\Feature;

//Models
use App\Models\Ticket;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;


class TicketTest extends TestCase
{

    use DatabaseMigrations;

    public function test_ticket_stats_can_be_rendered() : void 
    {
        $response = $this->get('/');

        $response->assertOk();

    }

    public function test_tickets_open_can_be_rendered() : void 
    {
        $response = $this->get('/tickets/open');

        $response->assertOk();

    }

    public function test_tickets_closed_can_be_rendered() : void 
    {
        $response = $this->get('/tickets/closed');

        $response->assertOk();

    }
}
