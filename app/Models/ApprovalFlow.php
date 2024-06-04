<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApprovalFlow extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'approval_flow';

    protected $primaryKey = 'id';

    protected $guarded = [];

    protected $casts = [
        'is_approve' => 'boolean',
        'is_finish' => 'boolean'
    ];

    public function kendaraanAngkutan(){
        return $this->belongsTo(KendaraanAngkutan::class, 'ref_id', 'id')->with('kendaraan', 'perusahaan', 'user');
    }

}
