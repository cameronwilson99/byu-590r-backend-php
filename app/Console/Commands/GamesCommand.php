<?php

namespace App\Console\Commands;

use App\Mail\GamesMail;
use Illuminate\Console\Command;
use App\Models\Game;
use Illuminate\Support\Facades\Mail;

class GamesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:games {--email=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This sends an email report summary of all games to customers.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sendToEmail = $this->option('email');
        if(!$sendToEmail) {
            error_log('Please provide an email address to send the report to.');
            return Command::FAILURE;
        }
        
        $games = Game::where('stock', '>', 0)->get();

        Mail::to($sendToEmail)->send(new GamesMail($games));

        return Command::SUCCESS;
    }
}
