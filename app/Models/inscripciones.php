<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class inscripciones extends Model
{
    use HasFactory;

    public function scopeGetMaxDorsal($query)
    {
        return $query->OrderByDesc('dorsal')->first();
    }

    public function scopeJoinUserToInscr($query)
    {
        //$this->belongsTo(User::)
        if (session()->has('users')) {
            if (!empty(session('user'))) {
                $query = DB::table('inscripciones')
                    ->join('users', 'users.dni', '=', 'inscripciones.dni')
                    //->join('races', 'inscripciones.id_carrera', '=', 'races.code')
                    ->select('inscripciones.dni', /*'races.name',*/ 'inscripciones.dorsal')
                    ->where('inscripciones.dni = ', session('user')->dni)
                    ->get();
                dd($query);
                return $query;
            }
        }
    }
}