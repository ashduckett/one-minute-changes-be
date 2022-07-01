<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\UserChordChange;
use App\Models\ChordChange;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::created(function($model) {
            // Get all of the chord changes
            $chordChanges = ChordChange::all();

            // dd($chordChanges);

            $chordChanges->each(function($change) use ($model) {
                $chordChange = new UserChordChange();
                $chordChange->user_id = $model->id;
                $chordChange->chord_change_id = $change->id;
                $chordChange->count = 0;
                $chordChange->save();
            });
        });
    }
}
