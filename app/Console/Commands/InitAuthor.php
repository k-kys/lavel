<?php

namespace App\Console\Commands;

use App\Author;
use Illuminate\Console\Command;

class InitAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'author:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $author = new Author;
        $author->name = 'Jieo Kyong';
        $author->dob = '1999-10-10';
        $author->gender = 2;
        $author->save();
        $this->info('Init Author success ' . $author->name);
    }
}
