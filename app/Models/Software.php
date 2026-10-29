<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    //
    protected $table = 'software';
    protected $primaryKey = 'software_id';

    protected $fillable = [
        'product', 'vendor', 'license_key', 'purchased_seat', 'expiry_date', 
        'software_name', 'asset_tag', 'employee', 'install_date', 'status', 
        'purchase_date', 'warranty_period'
    ];

    public function asset() {
        return $this->belongsTo(Asset::class, 'asset_tag', 'asset_tag');
    }
}
