<?php

namespace App\Models;

use App\Models\Master\JenisAngkutan;
use App\Models\Master\JenisLayanan;
use App\Models\Master\Kendaraan;
use App\Models\Master\Perusahaan;
use App\Models\Master\RuteTrayek;
use App\Models\Master\Trayek;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KendaraanAngkutan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'kendaraan_angkutan';

    protected $primaryKey = 'id';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_input');
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class, 'perusahaan_id');
    }

    public function trayek()
    {
        return $this->belongsTo(Trayek::class, 'trayek_id');
    }

    public function ruteTrayek()
    {
        return $this->belongsTo(RuteTrayek::class, 'rute_trayek_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function jenisAngkutan()
    {
        return $this->belongsTo(JenisAngkutan::class, 'jenis_angkutan_id');
    }

    public function jenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class, 'jenis_layanan_id');
    }

}
