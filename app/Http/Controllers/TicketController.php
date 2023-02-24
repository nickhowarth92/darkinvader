<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Models
use App\Models\Ticket;
use App\Models\User;

//Dependencies
use Inertia\Inertia;
use Carbon\Carbon;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Not in use yet.
        return;
    }

    /**
     * Display a listing of the resource with the status of open.
     */
    public function open()
    {   
        $tickets = Ticket::query()
            ->with('user')
            ->where('status', 0)
            ->paginate(10)
            ->through(fn($ticket) => [
                'id' => $ticket->id,
                'subject' => $ticket->subject,
                'publish_date' =>  Carbon::createFromFormat('Y-m-d H:i:s', $ticket->publish_date)
                                        ->format('m/d/Y H:i:s'),
                'name' => $ticket->user->name,
                'email' => $ticket->user->email
            ]);

        if(!$tickets->count()) {
            return Inertia::render('Tickets/Open', [
                'tickets' => null,
                'error' => 'No open Tickets!'
            ]);
        }

        return Inertia::render('Tickets/Open', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Display a listing of the resource with the status of closed.
     */
    public function closed()
    {
        $tickets = Ticket::query()
            ->with('user')
            ->where('status', 1)
            ->paginate(10)
            ->through(fn($ticket) => [
                'id' => $ticket->id,
                'subject' => $ticket->subject,
                'publish_date' =>  Carbon::createFromFormat('Y-m-d H:i:s', $ticket->publish_date)
                                        ->format('m/d/Y H:i:s'),
                'name' => $ticket->user->name,
                'email' => $ticket->user->email
            ]);

        if(!$tickets->count()) {
            return Inertia::render('Tickets/Closed', [
                'tickets' => null,
                'error' => 'No Tickets Closed!'
            ]);
        }

        return Inertia::render('Tickets/Closed', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Display a listing of the resource that belong to a user.
     */
    public function user($email)
    {
        //Validate there is an email

        $tickets = User::getUserTickets($email);   

        if(!$tickets->count()) {
            return Inertia::render('Tickets/User', [
                'tickets' => null,
                'error' => 'The user with '.$email.' has no tickets!'
            ]);
        }

        return Inertia::render('Tickets/User', [
            'tickets' => $tickets
        ]);
    }

    /**
     * Display a various stats for the tickets
    */
    public function stats() {

        /*
        * Simply Count the tickets table
        */ 
        $totalTickets = Ticket::count();

        /*
        * Count the tickets table where the status is 0 (unprocessed)
        */ 
        $unprocessedTickets = Ticket::where('status', 0)
                                        ->count();

        /*
        * 1. Get the most common user_id in the tickets table
        * 2. Then grab this user this is linked to
        * 3. Finally just add a count for display
        */ 
        $highestTicketUser = Ticket::select('user_id')
                        ->groupBy('user_id')
                        ->orderByRaw('COUNT(*) DESC')
                        ->first();
        
        //If we have results
        if($highestTicketUser->count()) {
            $highestUser = User::select('name')
            ->where('id', $highestTicketUser->user_id)
            ->first();
            
            $highestUser = $highestUser->name;

            $highestUserCount = Ticket::where('user_id', $highestTicketUser->user_id)
                    ->count();

        //defaults
        } else {
            $highestUser = 'N/A';
            $highestUserCount = 0;
        }
        


        /*
        * Check the latest updated Ticket with a status of 1, This is linked 
        * to the time the artisan ticket:process ran on Tickets that needed processing
        */                      
        $lastProcessed = Ticket::select('updated_at')
                            ->where('status', 1)
                            ->orderBy('updated_at', 'DESC')
                            ->first();

        if($lastProcessed->count()) {
            $lastProcessed = $lastProcessed->updated_at->format('Y-m-d H:i:s');
        } else {
            $lastProcessed = 'Not yet ran!';
        }
        

        return Inertia::render('Home', [
            'totalTickets' => $totalTickets,
            'unprocessedTickets' => $unprocessedTickets,
            'highestUser' => $highestUser,
            'highestUserCount' => $highestUserCount,
            'lastProcessed' => $lastProcessed
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Not in use yet.
        return;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Not in use yet.
        return;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Not in use yet.
        return;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Not in use yet.
        return;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Not in use yet.
        return;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Not in use yet.
        return;
    }
}
