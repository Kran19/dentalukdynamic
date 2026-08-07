<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'treatment_item',
        'nhs_fee',
        'private_fee',
        'denplan_fee',
        'sort_order',
    ];
}
