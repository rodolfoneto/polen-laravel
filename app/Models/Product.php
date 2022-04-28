<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sku',
        'title',
        'description',
        'excerpt',
        'price',
        'price_promotional',
        'type','manage_stock',
        'stock_status',
        'b2b_highlights',
        'b2b_price_from',
        'status',
        'seo_title',
        'seo_description',
    ];

    public function search($term = null)
    {
        $itens = $this->where('title', 'LIKE',  "%{$term}%")
            ->orWhere('description', 'LIKE',  "%{$term}%")
            ->paginate();
        return $itens;
    }
}
