<?php

namespace Database\Seeders;

use App\Models\contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // seeder & faker
        for($i=0;$i<5;$i++)  //It Enter 5 Fake Data
        {
            $data=new contact();
            $data->name=fake()->name();
            $data->email=fake()->unique()->safeEmail();
            $data->comment=fake()->text();     
            $data->save();
        }
    }
}
