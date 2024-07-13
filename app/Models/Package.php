<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_package', 'package_id', 'service_id');
    }
}
