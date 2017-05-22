<?php

namespace App\Console\Commands;

use App\Events\ArticleCreated;
use Illuminate\Console\Command;

class CreateDummyArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'article:dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a dummy article';

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
        event(new ArticleCreated(['id' => 1000, 'title' => 'dummy title', 'content'=>'dummy content']));
    }
}
