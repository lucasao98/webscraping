<?php

namespace App\Console\Commands;

use App\Http\Controllers\GetNewsController;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class webscraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:webscraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Webscraping para o site ilhéus 24h, separado por seções';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $resultado = new GetNewsController();
        var_dump($resultado->get_recent_news());
    }
}
