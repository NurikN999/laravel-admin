<?php

namespace App\Observers;

class ProductObserver
{
    public function created()
    {
        \Cache::forget('products');
    }

}
