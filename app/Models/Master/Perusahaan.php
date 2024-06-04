<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perusahaan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'perusahaan';

    protected $guarded = [];

    protected $casts = [
        'tanggal_sk_terbit' => 'datetime:Y-m-d',
        'tanggal_sk_expired' => 'datetime:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }

    public function kota(){
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_input', 'id')->with('provinsi', 'kota');
    }
}
