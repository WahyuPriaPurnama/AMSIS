<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaves extends Model
{
    use HasFactory;

    public function employee()
    {
        return $this->BelongsTo(Employee::class, 'employee_id');
    }
}
