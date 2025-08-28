<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function departments()
    {
        return $this->hasMany(Department::class);
    }
    protected static function booted()
    {
        static::saving(function ($model) {
            $model->name = ucwords(strtolower(trim($model->name)));
        });
    }
    public function scopeByName($query, $name)
    {
        return $query->where('name', ucwords(strtolower(trim($name))));
    }
}
