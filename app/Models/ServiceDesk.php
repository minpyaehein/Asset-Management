<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDesk extends Model
{
    protected $table = 'service_desks';
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'request_note', 'staff_code', 'priority', 'date', 'status', 'asset_tag'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'staff_code', 'staff_code');
    }

    public function asset() {
        return $this->belongsTo(Asset::class, 'asset_tag', 'asset_tag');
    }
}
