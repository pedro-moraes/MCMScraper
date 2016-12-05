<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WishListJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:wishlist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Launches the wishlist job which updates all card prices.';

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
        //

        //Read WishList and generate requests

        //By Card - By Trends , By Users
        //By Set By Rarity - By Trends, By Users

    }
}
