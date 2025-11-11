<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $post = [
        ['title' => 'Belajar Laravel', 'content' => 'Lorem Ipsum'],
        ['title' => 'Tips Belajar laravel', 'content' => 'Lorem Ipsum'],
        ['title' => 'Jadwla Latihan Workout Bulanan', 'content' => 'Lorem Ipsum'],
       ];
       DB::table('post')->insert($post); 
    }
}
