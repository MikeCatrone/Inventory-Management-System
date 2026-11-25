<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

#[Fillable([
    'category_id',
    'title',
    'description',
    'price',
    'quantity',
    'sku',
    'picture',
])]


class Items extends Model
{
    
    use HasFactory;
    use SoftDeletes;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}