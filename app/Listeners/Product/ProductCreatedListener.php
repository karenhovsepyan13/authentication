<?php

namespace App\Listeners\Product;

use App\Models\Info;
use App\Events\Product\ProductCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductCreatedListener implements ShouldQueue
{
    public function handle(ProductCreated $event): void
    {
        $productName = $event->product->name;
        $userName = $event->product->user->name;
        $infoText = "$userName created product: $productName";

        Info::query()->create(['info' => $infoText]);
    }
}
