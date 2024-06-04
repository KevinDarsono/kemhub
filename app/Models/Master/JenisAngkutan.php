<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisAngkutan extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'jenis_angkutan';

    protected $guarded = [];
}
