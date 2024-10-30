<?php

namespace App\Models\Purchasing;

use App\Models\Subsidiary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function master_supplier()
    {
        return $this->belongsTo(MasterSupplier::class);
    }
    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
