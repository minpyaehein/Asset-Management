<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportAnalytics extends Model
{
    //
    protected $table = 'report_analytics';
    protected $primaryKey = 'report_id';

    protected $fillable = [
        'report_name', 'description', 'last_updated', 'availability', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(UserManagement::class, 'user_id', 'user_id');
    }
}
