<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CampBenefits;

class CampBenefitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $campBenefits = [
            [
                'camp_id' => 1,
                'name' => 'Akses Kelas Selamanya'
            ],

            [
                'camp_id' => 1,
                'name' => 'Assets & group konsultasi'
            ],

            [
                'camp_id' => 1,
                'name' => 'Tools pendukung belajar'
                ],

            [
                'camp_id' => 1,
                'name' => 'Sertifikat kelulusan'
            ],

            [
                'camp_id' => 1,
                'name' => 'Free update materi'
            ],

            [
                'camp_id' => 1,
                'name' => 'Free akses kelas Freemium'
            ],

             [
                'camp_id' => 1,
                 'name' => 'Lowongan Pekerjaan'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Akses kelas terbatas'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Assets & group konsultasi'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Tools pendukung belajar'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Sertifikat kelulusan'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Free update materi'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Free akses kelas Freemiumn'
            ],

            [
                'camp_id' => 2,
                 'name' => 'Lowongan pekerjaan'
            ],
        ];

       CampBenefits::insert($campBenefits);
        }
    }

