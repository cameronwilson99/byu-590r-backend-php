<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Game;

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
    protected $description = 'This sends an email report summary of all games to stakeholders.';

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
        $games = Game::where('stock', '=', 0)->get();

        if ($games->isEmpty()) {
            error_log('No games found.');
            return Command::FAILURE;
        }
    }
}
