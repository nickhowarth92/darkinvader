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

        //Get the props object
        $hasTickets = $response->getOriginalContent()->getData()['page']['props'];

        //check for an error in our returned array
        if(!Arr::exists($hasTickets, 'error')) {
            $response->assertOk(); 
        } else {
            $response->assertStatus(404);
        }
        
    }


    /*
    *   Test no more tickets need to be processed
    */
    public function test_no_more_tickets_to_be_processed() : void {
        $response = $this->get('/tickets/open');
                        
        $noTicketsToBeProcessed = $response->getOriginalContent()
                        ->getData()['page']['props']['error'];


        $response->assertSee($noTicketsToBeProcessed);
    }

    /*
    *   Test a single ticket can be viewed
    */
    public function test_single_ticket_can_be_viewed() : void {

        $user = User::factory()
                        ->has(Ticket::factory()->count(1))
                        ->create();

        $response = $this->get("/tickets/{$user->tickets[0]->id}");

        $response->assertOk(); 
        
    }

    /*
    *   Test the dashboard/stats page renders
    */
    public function test_ticket_stats_can_be_rendered() : void 
    {
        $response = $this->get('/');

        $response->assertOk();

    }

    /*
    *   Test the tickets open page renders
    */
    public function test_tickets_open_can_be_rendered() : void 
    {
        $response = $this->get('/tickets/open');

        $response->assertOk();


    }

    /*
    *   Test the tickets closed page renders
    */
    public function test_tickets_closed_can_be_rendered() : void 
    {
        $response = $this->get('/tickets/closed');

        $response->assertOk();

    }
}
