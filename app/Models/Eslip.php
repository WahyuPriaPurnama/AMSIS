<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Eslip extends Model
{
    use HasFactory, Sortable;
    protected $guarded = [];
    public $sortable = ['nama'];

    public function subsidiary()
    {
        return $this->belongsTo(Subsidiary::class);
    }
}
