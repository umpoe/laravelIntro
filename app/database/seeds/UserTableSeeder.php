<?php

class UserTableSeeder extends Seeder{
    public function run(){

        User::truncate();
        User::create([
            'username'=>'christian',
            'email'=>'christian@library.com',
            'password'=>'1234'
        ]);
        User::create([
            'username'=>'mike',
            'email'=>'mike@library.com',
            'password'=>'1234'
        ]);
        User::create([
            'username'=>'lona',
            'email'=>'lona@library.com',
            'password'=>'1234'
        ]);
    }    
}