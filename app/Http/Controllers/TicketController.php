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
        //
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
        return Inertia::render('Home');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
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
