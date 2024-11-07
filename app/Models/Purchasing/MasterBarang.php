<?php

namespace App\Models\Purchasing;

use App\Models\Subsidiary;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class MasterBarang extends Model
{
    use HasFactory, Sortable;
    protected $guarded = [];
public $sortable=['subsidiary_id'];
    public function master_supplier()
    {
        return $this->belongsTo(MasterSupplier::class);
    }
    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

    public function scopeIndex($query)
    {
        return $query->with('master_supplier','subsidiary');
    }
}
