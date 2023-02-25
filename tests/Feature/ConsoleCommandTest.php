<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Foundation\Testing\DatabaseMigrations;

class ConsoleCommandTest extends TestCase
{
    use DatabaseMigrations;

    public function test_tickets_can_be_generated_in_console_command() : void 
    {
        $this->artisan('ticket:generate')->assertSuccessful();
    }

    public function test_tickets_can_be_processed_in_console_command() : void 
    {
        $this->artisan('ticket:process')->assertSuccessful();
    }
}
