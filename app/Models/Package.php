<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Package extends Model
{
    use HasFactory;
    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_package', 'package_id', 'service_id');
    }
    public function showRoute(array $parameters = [])
    {
        return route('packages.show', [$this, Str::slug($this->code), ...$parameters]);
    }
}
