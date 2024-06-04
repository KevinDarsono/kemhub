<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    protected $table        = 'provinces';

    protected $primaryKey   = 'id';

    public $incrementing    = true;

    public $timestamps      = true;

    protected $fillable = [
        'id',
        'name',
        'administrative_code',
        'latitude',
        'longitude',
        'description',
        'deleted_at',
        'created_at',
        'updated_at'
    ];
}
