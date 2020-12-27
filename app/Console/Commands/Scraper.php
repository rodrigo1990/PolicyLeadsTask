<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\GoutteService;
use App\Services\ArticleService;
use Exception;

class Scraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:spiegel-politiks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrape and save the articles listed in https://www.spiegel.de/politik/';

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
     * @return int
     */
    public function handle(GoutteService $goutteService, ArticleService $articleService)
    {
        try{
            //Scrap the website
            $items = $goutteService->scrapSpiegelPolitiks();
            //Delete the records in order to not accumulate thousands in every execution
            $articleService->deleteArticles();
            //Save the articles in the DB
            $msg = $articleService->saveArticles($items);
        
            $this->info("The command was successful");

        }
        catch(Exception $e){
            report($e);
            $this->error('Ups! Something went wrong, check the error log!');

        }

                    
    }
}
