<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model {
    use Searchable;

    protected $guarded = ['id'];

    protected $casts = [
        'expense_at' => 'date'
    ];

    public function scopeSumAmount($query) {
        $query->selectRaw("SUM(amount) as expenseAmount");
    }
}
