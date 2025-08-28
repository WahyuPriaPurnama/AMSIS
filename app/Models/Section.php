<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
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
