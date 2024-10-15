<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Vehicle extends Model
{
    use HasFactory, Sortable;
    protected $guarded = [];
    public $sortable = ['jenis_kendaraan', 'kategori', 'subsidiary_id', 'stnk', 'pajak', 'kir', 'jth_tempo'];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
    public function scopeIndex($query)
    {
        return $query->with('subsidiary');
    }
}
