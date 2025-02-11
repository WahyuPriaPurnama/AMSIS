<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Subsidiary extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeIndex($query)
    {
        return $query->withCount('employees');
    }
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
    public function eslip()
    {
        return $this->hasMany(Eslip::class);
    }
}
