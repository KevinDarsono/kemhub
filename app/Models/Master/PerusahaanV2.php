<?php

namespace App\Models\Master;

use App\Models\User;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerusahaanV2 extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'perusahaan_v2';

    protected $guarded = [];

    protected $casts = [
        'tgl_terbit_tdp' => 'datetime:Y-m-d',
        'tgl_registrasi_sistem' => 'datetime:Y-m-d',
        'tgl_exp_siup' => 'datetime:Y-m-d',
        'tgl_exp_domisili' => 'datetime:Y-m-d',
        'tgl_akta_perubahan' => 'datetime:Y-m-d',
        'tgl_akta_pendirian' => 'datetime:Y-m-d',
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
