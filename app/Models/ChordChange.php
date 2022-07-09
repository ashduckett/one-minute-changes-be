<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chord;

class ChordChange extends Model
{
    use HasFactory;

    public function fromChord() {
        return $this->hasOne(Chord::class, 'id', 'from_id');
    }

    public function toChord() {
        return $this->hasOne(Chord::class, 'id', 'to_id');
    }
}
