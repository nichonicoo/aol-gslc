<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           [
            'name' => 'romance'
           ],
           [
            'name' => 'action'
           ],
           [
            'name' => 'comedy'
           ],
           ];
           DB::table('genres')->insert($data);
    }
}
