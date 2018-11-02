<?php

class BookTableSeeder extends Seeder{
    public function run(){

        Book::truncate();
        Book::create([
            'title'=>'Journery to center of the earth',
            'writer'=>'Jules Verne',
            'user_id'=>1
        ]);
        Book::create([
            'title'=>'The adventures of Tom Sowyer',
            'writer'=>'Mark Twain',
            'user_id'=>2
        ]);
        Book::create([
            'title'=>'Harry Potter',
            'writer'=>'JK Rawling',
            'user_id'=>3
        ]);
    }    
}