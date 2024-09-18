<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory, Sortable, HasUuids;
    protected $guarded = [];
    public $sortable = ['nip', 'nama', 'akhir_kontrak'];
  

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

    public function scopeIndex($query)
    {
        return $query->with('subsidiary');
    }

}
