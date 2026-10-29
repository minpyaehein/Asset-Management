<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class products extends Model
{
    use HasFactory;

    protected $fillable = ['log_id','status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
