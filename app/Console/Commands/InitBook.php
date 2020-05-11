<?php

namespace App\Console\Commands;

use App\Book;
use Illuminate\Console\Command;

class InitBook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'book:init';

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
        $bookArr = [
            [
                'name' => 'Harvard Business 1',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque fugiat accusamus omnis eveniet, impedit atque, nesciunt maiores alias libero illo unde asperiores, consequuntur molestiae officia voluptas dolore adipisci culpa illum?',
                'publish_at' => '2020-01-20',
                'author_id' => 1,
                'user_id' => 1
            ],
            [
                'name' => 'Harvard Business 2',
                'description' => 'Eaque fugiat accusamus omnis eveniet, impedit atque, nesciunt maiores alias libero illo unde asperiores, consequuntur molestiae officia voluptas dolore adipisci culpa illum?',
                'publish_at' => '2020-02-10',
                'author_id' => 1,
                'user_id' => 1
            ],
            [
                'name' => 'Harvard Business 3',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque fugiat accusamus omnis eveniet, impedit atque, nesciunt maiores alias libero illo unde asperiores',
                'publish_at' => '2020-04-19',
                'author_id' => 1,
                'user_id' => 1
            ],

        ];

        foreach ($bookArr as $bookItem) {
            $book = new Book;
            $book->name = $bookItem['name'];
            $book->description = $bookItem['description'];
            $book->publish_at = $bookItem['publish_at'];
            $book->author_id = $bookItem['author_id'];
            $book->user_id = $bookItem['user_id'];
            $book->save();
            $this->info('Init success ' . $book->name);
        }
    }
}
