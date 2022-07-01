<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Chord;

class ChordChangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dChord = Chord::where('name', 'D')->first();
        $aChord = Chord::where('name', 'A')->first();
        $amChord = Chord::where('name', 'Am')->first();
        $emChord = Chord::where('name', 'Em')->first();
        $dmChord = Chord::where('name', 'Dm')->first();
        $gChord = Chord::where('name', 'G')->first();
        $cChord = Chord::where('name', 'C')->first();
        $eChord = Chord::where('name', 'E')->first();

        DB::table('chord_changes')->insert(['from_id' => $dChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $eChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $eChord->id, 'to_id' => $dChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $amChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $amChord->id, 'to_id' => $dChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $amChord->id, 'to_id' => $eChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $emChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $emChord->id, 'to_id' => $dChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $emChord->id, 'to_id' => $eChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $emChord->id, 'to_id' => $amChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $dmChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $dmChord->id, 'to_id' => $dChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $dmChord->id, 'to_id' => $eChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $dmChord->id, 'to_id' => $amChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $dmChord->id, 'to_id' => $emChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $gChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $gChord->id, 'to_id' => $dChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $gChord->id, 'to_id' => $eChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $gChord->id, 'to_id' => $amChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $gChord->id, 'to_id' => $emChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $gChord->id, 'to_id' => $dmChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $aChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $dChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $eChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $amChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $emChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $dmChord->id]);
        DB::table('chord_changes')->insert(['from_id' => $cChord->id, 'to_id' => $gChord->id]);
    }
}
