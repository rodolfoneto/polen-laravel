<?php

namespace App\Observers;

use App\Models\Products;

class ProductObserver
{
    /**
     * Handle the Products "creating" event.
     *
     * @param  \App\Models\Models\Products  $products
     * @return void
     */
    public function creating(Products $products)
    {
        //
    }

    /**
     * Handle the Products "updated" event.
     *
     * @param  \App\Models\Models\Products  $products
     * @return void
     */
    public function updating(Products $products)
    {
        //
    }
}
