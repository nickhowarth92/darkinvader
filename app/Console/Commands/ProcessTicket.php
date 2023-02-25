<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Ticket;

class ProcessTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to process users tickets';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {   
        // Get the tickets that have status of 0 (unprocessed)
        // We process the oldest first as these have priority
        $tickets = Ticket::where('status', 0)
            ->orderBy('created_at', 'ASC')
            ->get();

        //nothing to do here... 
        if(!$tickets->count()) {
            return;
        }

        //loop over the tickets, we should be only ever dealng with 5 at any iteration...
        foreach ($tickets as $ticket) {
            $ticket->status = 1;
            $ticket->save();
        }
    }
}
