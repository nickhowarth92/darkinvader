<?php

namespace Tests\Feature;

//Models
use App\Models\Ticket;
use App\Models\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

//Helpers
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Inertia\Testing\AssertableInertia as Assert;
use Illuminate\Support\Arr;


class TicketTest extends TestCase
{

    use DatabaseMigrations;

    /*
    *   Test a users tickets can be viewed
    */
    public function test_tickets_by_user_email() : void {

        $user = User::factory()
                        ->has(Ticket::factory()->count(1))
                        ->create();
        
        $response = $this->get("/users/{$user->email}/tickets");

        $response->assertInertia(fn (Assert $page) => $page
            ->has('tickets')
            ->missing('error')
        );
        
    }


    /*
    *   Test no more tickets need to be processed
    */
    public function test_no_more_tickets_to_be_processed() : void {
        $response = $this->get('/tickets/open');
                        
        $response->assertInertia(fn (Assert $page) => $page
            ->has('error')
            ->missing('ticket')
        );
    }

    /*
    *   Test a single ticket can be viewed
    */
    public function test_single_ticket_can_be_viewed() : void {

        $user = User::factory()
                        ->has(Ticket::factory()->count(1))
                        ->create();

        $response = $this->get("/tickets/{$user->tickets[0]->id}");

        $response->assertInertia(fn (Assert $page) => $page
            ->has('ticket')
            ->has('user')
        );
        
    }

    /*
    *   Test the dashboard/stats page renders
    */
    public function test_ticket_stats_can_be_rendered() : void 
    {
        $response = $this->get('/');
        
        $response->assertInertia(fn (Assert $page) => $page
            ->has('totalTickets')
            ->has('unprocessedTickets')
            ->has('highestUser')
            ->has('highestUserCount')
            ->has('lastProcessed')
        );

    }

    /*
    *   Test the tickets open page renders
    */
    public function test_tickets_open_can_be_rendered() : void 
    {
        User::factory()->has(Ticket::factory()->count(10))
                        ->create();

        $response = $this->get('/tickets/open');
                        
        $response->assertInertia(fn (Assert $page) => $page
            ->has('tickets')
            ->missing('error')
        );


    }

    /*
    *   Test the tickets closed page renders
    */
    public function test_tickets_closed_can_be_rendered() : void 
    {
        User::factory()->count(10)->create();
        Ticket::factory()->create([
            'status' => 1,
        ]);

        $response = $this->get('/tickets/closed');
                        
        $response->assertInertia(fn (Assert $page) => $page
            ->has('tickets')
            ->missing('error')
        );

    }
}
