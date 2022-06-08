<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class purchase_order extends Model
{
    use HasFactory;
    use Sortable;
   

    protected $fillable=['nama_customer','nomor','tanggal','item','harga','kuantitas','total','status','keterangan','file'];
    public $sortable=['nama_customer','nomor','tanggal','item','harga','kuantitas','total','status'];

}
