<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuteTrayek extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'rute_trayek';

    protected $guarded = [];

    public function trayek(){
        return $this->belongsTo(Trayek::class, 'trayek_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_input', 'id')->with('provinsi', 'kota');
    }

}

