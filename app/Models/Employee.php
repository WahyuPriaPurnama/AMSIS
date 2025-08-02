<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory, HasUuids;
    protected $guarded = [];


    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

    public function scopeIndex($query)
    {
        return $query->with('subsidiary');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'employee_id');
    }
}
