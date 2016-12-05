<?php

namespace App\Console\Commands;

use app\Classes\MCMUserListScraper;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


class UserListJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:userlist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'User List Scraper';

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

       $scraper=new MCMUserListScraper();
       $userListJSON=$scraper->getUserList();
        echo "calling request";
       Request::create('/ole', 'GET');
    }
}
