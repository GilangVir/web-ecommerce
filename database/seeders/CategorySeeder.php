<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
            [
                        [
                            'name' => 'Ebook',
                            'slug' => 'ebook',
                            'icon' => 'images/icon-ebook.svg', 
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ],
                        [
                            'name' => 'Course',
                            'slug' => 'course',
                            'icon' => 'images/icon-course.svg',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ],
                        [
                            'name' => 'Template',
                            'slug' => 'template',
                            'icon' => 'images/icon-template.svg',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ],
                        [
                            'name' => 'Font',
                            'slug' => 'font',
                            'icon' => 'images/icon-font.svg',
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now()
                        ]
                    ]);
    }
}
