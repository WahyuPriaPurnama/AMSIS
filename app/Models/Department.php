<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'division_id'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
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
