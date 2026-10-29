<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    protected $table = 'user_management';
    protected $primaryKey = 'user_id';

    protected $fillable = ['user_name', 'role', 'status', 'scope'];

    public function reports() {
        return $this->hasMany(ReportAnalytics::class, 'user_id', 'user_id');
    }
}
