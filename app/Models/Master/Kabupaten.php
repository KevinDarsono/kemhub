<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'kabupaten';

    protected $guarded = [];

    protected $primaryKey = 'id';

    public function provinsi(){
        return $this->belongsTo(Provinsi::class, 'provinsi_id', 'id');
    }

    public function kota(){
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }
}
