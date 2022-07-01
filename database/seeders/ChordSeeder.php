<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // D E Am Em Dm G C A

        $chords = ['D', 'E', 'Am', 'Em', 'Dm', 'G', 'C', 'A'];

        foreach ($chords as $chord) {
            DB::table('chords')->insert([
                'name' => $chord
            ]);
        }
    }
}
