<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserChordChange;

class UserController extends Controller
{
    public function results(Request $request) {

        $id = $request->user()->id;
        $chordChanges = UserChordChange::where('user_id', $id)->with('chordChange', 'chordChange.fromChord', 'chordChange.toChord')->get();

        $result = [];
        $itemCountForCurrentRow = 1;
        $currentItemCountForCurrentRow = 0;
        $row = 0;
        
        
        for ($i = 0; $i < 28; $i++) {
            $result[$row][$currentItemCountForCurrentRow] = $chordChanges[$i];
            $currentItemCountForCurrentRow++;

            if ($currentItemCountForCurrentRow == $itemCountForCurrentRow) {
                $itemCountForCurrentRow++;
                $currentItemCountForCurrentRow = 0;
                $row++;
            }
        }

        return $result;
    }

    public function saveResult(Request $request) {
        $request->validate([
            'chordChangeId' => ['required'],
            'count' => ['required'],
            'userId' => ['required']
        ]);


        UserChordChange::where(['chord_change_id' => $request->chordChangeId, 'user_id' => $request->userId])
            ->update([
                'count' => $request->count
            ]);
    }
}
