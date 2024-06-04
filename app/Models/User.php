<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\KeyGenerate;
use App\Constants\Roles as CodeRoles;
use App\Models\Master\Kota;
use App\Models\Master\Provinsi;
// models
use App\Models\Provinces as TblProvinces;
use App\Models\UnitKerja as TblUnitKerja;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasUuids, Notifiable, KeyGenerate, SoftDeletes;

    protected $table        = 'users';

    protected $primaryKey   = 'id';

    public $incrementing    = false;

    public $timestamps      = true;

    protected $guarded = [];
    // protected $fillable = [
    //     'id',
    //     'code_role',
    //     'unit_kerja_id',
    //     'province_id',
    //     'city_id',
    //     'district_id',
    //     'first_name',
    //     'last_name',
    //     'email',
    //     'email_verified_at',
    //     'password',
    //     'phone_number',
    //     'photo',
    //     'is_root',
    //     'active',
    //     'remember_token',
    //     'created_at',
    //     'updated_at'
    // ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'active'            => 'boolean',
        'is_root'           => 'boolean',
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s'
    ];

    protected $appends = array(
        'name_role'
    );

    public function getNameRoleAttribute() {
        return CodeRoles::getNameForCode($this->code_role);
    }

    public function unit_kerja() {
        return $this->hasOne(UnitKerja::class,'id','unit_kerja_id');
    }

    public function provinsi() {
        return $this->hasOne(Provinsi::class,'id','provinsi_id');
    }

    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id','id');
    }

}
