<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $table = 'asset';
    protected $primaryKey = 'asset_tag';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    public function employee() {
        return $this->belongsTo(Employee::class, 'staff_code', 'staff_code');
    }

    public function serviceDesks() {
        return $this->hasMany(ServiceDesk::class, 'asset_tag', 'asset_tag');
    }

    public function maintenances() {
        return $this->hasMany(Maintenance::class, 'asset_tag', 'asset_tag');
    }

    public function acknowledgements() {
        return $this->hasMany(Acknowledgement::class, 'asset_tag', 'asset_tag');
    }

    public function software() {
        return $this->hasMany(Software::class, 'asset_tag', 'asset_tag');
    }
}
