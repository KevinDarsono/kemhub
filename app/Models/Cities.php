<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;

    protected $table        = 'cities';

    protected $primaryKey   = 'id';

    public $incrementing    = true;

    public $timestamps      = true;

    protected $fillable = [
        'id',
        'name',
        'province_id',
        'administrative_code',
        'latitude',
        'longitude',
        'description',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
