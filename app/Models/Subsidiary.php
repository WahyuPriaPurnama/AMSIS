<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Subsidiary extends Model
{
    use HasFactory, Sortable;
    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function scopeIndex($query)
    {
        return $query->withCount('employees');
    }

}
