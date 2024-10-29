<?php

namespace App\Models\Purchasing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function supplier(){
        return $this->belongsTo(MasterSupplier::class);
    }
}
