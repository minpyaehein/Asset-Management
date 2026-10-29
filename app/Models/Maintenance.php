<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    //
    protected $table = 'maintenance';
    protected $primaryKey = 'maintenance_id';

    protected $fillable = [
        'asset_tag', 'maintenance_type', 'completed_date', 'staff_code', 
        'status', 'note', 'plan_id', 'maintenance_task', 'due_date', 'priority'
    ];

    public function asset() {
        return $this->belongsTo(Asset::class, 'asset_tag', 'asset_tag');
    }

    public function employee() {
        return $this->belongsTo(Employee::class, 'staff_code', 'staff_code');
    }
}
