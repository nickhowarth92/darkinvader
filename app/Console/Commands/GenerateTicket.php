<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;
use App\Models\Ticket;

class GenerateTicket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticket:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A command to simply generate a singular ticket';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Ticket::factory()
            ->count(1)
            ->create();
    }
}
