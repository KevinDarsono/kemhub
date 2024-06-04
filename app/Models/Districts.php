<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    use HasFactory;

    protected $table        = 'districts';

    protected $primaryKey   = 'id';

    public $incrementing    = true;

    public $timestamps      = true;

    protected $fillable = [
        'id',
        'name',
        'province_id',
        'city_id',
        'administrative_code',
        'latitude',
        'longitude',
        'description',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
