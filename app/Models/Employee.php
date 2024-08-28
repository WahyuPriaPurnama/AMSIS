<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory, Sortable, HasUuids, SoftDeletes;
    protected $guarded = [];
    public $sortable = ['nip', 'nama', 'akhir_kontrak'];
    protected $date = ['deleted_at'];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }

    public function scopeIndex($query)
    {
        return $query->with('subsidiary');
    }
}
