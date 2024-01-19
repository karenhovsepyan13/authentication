<?php

namespace App\Events\Product;

use App\Models\Product;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class ProductCreated
{
    use Dispatchable;
    use SerializesModels;
    use InteractsWithSockets;

    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
}
