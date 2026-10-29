<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acknowledgement extends Model
{
    //
    protected $table = 'acknowledgement';
    protected $primaryKey = 'ack_id';

    protected $fillable = [
        'staff_code', 'asset_tag', 'issue_date', 'ack_date', 'status'
    ];

    public function employee() {
        return $this->belongsTo(Employee::class, 'staff_code', 'staff_code');
    }

    public function asset() {
        return $this->belongsTo(Asset::class, 'asset_tag', 'asset_tag');
    }
}
