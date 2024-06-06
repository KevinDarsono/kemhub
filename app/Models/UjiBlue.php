<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UjiBlue extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'uji_blue';

    protected $primaryKey = 'id';

    protected $guarded = [];

}
