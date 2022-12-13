<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\User;
use App\Models\Document;
use App\Models\Type;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'YUDI PERMANA, A.Md',
            'password' => bcrypt('password'),
            'email' => 'yudi@gmail.com',
            'is_admin' => '1'
        ]);

        User::create([
            'name' => 'Dr. MAHYUZAR, M.Si.',
            'password' => bcrypt('password'),
            'email' => 'mahyuzar@gmail.com',
            'is_admin' => '0'
        ]);

        Type::create([
            'name' => 'Perjadin',
        ]);
        Type::create([
            'name' => 'Surat Tugas',
        ]);



        // Category::create([
        //     'name' => 'Web Programming',
        //     'slug' => 'web-programming'
        // ]);

        // Category::create([
        //     'name' => 'Networking',
        //     'slug' => 'Networking'
        // ]);

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);



        // Post::factory(20)->create();
        Document::factory(20)->create();


        // Agenda::create([
        //     'user_id' => 1,
        //     'staff_id' => 1,
        //     'type_id' => 1,
        //     'komponen_id' => 3,
        //     'date' => '2022-09-01',
        //     'time' => '12:12',
        //     'title' => 'Rapat percepatan penurunan stunting',
        //     'slug' => 'Rapat-percepatan-penurunan-stunting',
        //     'location' => 'hotel aston jakarta',
        //     'description' => 'Rapat penurunan stunting tahun 2022',
        // ]);

        // Agenda::create([
        //     'user_id' => 2,
        //     'staff_id' => 2,
        //     'type_id' => 2,
        //     'komponen_id' => 2,
        //     'date' => '2022-09-01',
        //     'time' => '12:12',
        //     'title' => 'Rapat Dashboard PK',
        //     'slug' => 'Rapat-Dashboard-PK',
        //     'location' => 'hotel fave jakarta',
        //     'description' => 'Rapat penting',
        // ]);

        // Agenda::create([
        //     'user_id' => 1,
        //     'staff_id' => 3,
        //     'type_id' => 1,
        //     'komponen_id' => 1,
        //     'date' => '2022-09-01',
        //     'time' => '12:12',
        //     'title' => 'Rapat TMP2K Kominfo',
        //     'slug' => 'Rapat-TMP2K-Kominfo',
        //     'location' => 'hotel bali jakarta',
        //     'description' => 'rapat tetap',
        // ]);



    }
}
