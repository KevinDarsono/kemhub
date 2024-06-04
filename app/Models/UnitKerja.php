<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\KeyGenerate;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class UnitKerja extends Model
{
    use HasFactory, KeyGenerate;

    protected $table        = 'unit_kerja';

    protected $primaryKey   = 'id';

    public $incrementing    = false;

    public $timestamps      = true;

    protected $fillable = [
        'id',
        'nama',
        'kode',
        'level',
        'created_at',
        'updated_at'
    ];
}
