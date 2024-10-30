<?php

namespace App\Models\Purchasing;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class MasterSupplier extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function barangs()
    {
        return $this->hasMany(MasterBarang::class);
    }
}
