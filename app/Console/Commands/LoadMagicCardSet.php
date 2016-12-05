<?php

namespace App\Console\Commands;


use app\Classes\scrapers\MagicCardsSetsScraper;
use Illuminate\Console\Command;

class LoadMagicCardSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'magiccards:loadset';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Magic Cards Expansion Set';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //Read Options and Create Sets

        $scraper=new MagicCardsSetsScraper();
        $Cards=$scraper->scrapeIt();


    }
}
