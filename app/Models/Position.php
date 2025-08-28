<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'section_id'];
    public function section()
    {
        return $this->belongsTo(Section::class);
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
