<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{
    /**
     * Handle the Products "creating" event.
     *
     * @param  \App\Models\Models\Products  $products
     * @return void
     */
    public function creating(Product $products)
    {
        //
    }

    /**
     * Handle the Products "updated" event.
     *
     * @param  \App\Models\Models\Products  $products
     * @return void
     */
    public function updating(Product $products)
    {
        //
    }
}
