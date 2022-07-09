<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChordChage;

class UserChordChange extends Model
{
    use HasFactory;

    public function chordChange() {
        return $this->hasOne(ChordChange::class, 'id', 'chord_change_id');
    }
}
