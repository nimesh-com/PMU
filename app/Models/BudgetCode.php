<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetCode extends Model
{
    protected $table = 'budget_codes';
    protected $fillable = ['code', 'description'];

    public function monthlyData()
    {
        return $this->hasMany(MonthlyData::class);
    }
}
