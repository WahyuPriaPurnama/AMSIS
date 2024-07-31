<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory, Sortable;
    protected $guarded = [];
    public $sortable = ['nip', 'nama', 'perusahaan','akhir_kontrak'];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
