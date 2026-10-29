<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'staff_code';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['staff_code', 'full_name', 'department', 'email', 'active'];

    public function assets() {
        return $this->hasMany(Asset::class, 'staff_code', 'staff_code');
    }

    public function serviceDesks() {
        return $this->hasMany(ServiceDesk::class, 'staff_code', 'staff_code');
    }

    public function maintenances() {
        return $this->hasMany(Maintenance::class, 'staff_code', 'staff_code');
    }

    public function acknowledgements() {
        return $this->hasMany(Acknowledgement::class, 'staff_code', 'staff_code');
    }
}
