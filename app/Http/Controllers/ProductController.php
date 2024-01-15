<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Product\Dto\ProductCreateDto;
use App\Services\Product\Dto\ProductUpdateDto;
use App\Http\Resources\Product\ProductReadResource;
use App\Services\Product\Actions\ProductReadAction;
use App\Http\Resources\Product\ProductDeleteResource;
use App\Services\Product\Actions\ProductDeleteAction;
use App\Http\Resources\Product\ProductCreateResource;
use App\Http\Resources\Product\ProductUpdateResource;
use App\Services\Product\Actions\ProductCreateAction;
use App\Services\Product\Actions\ProductUpdateAction;
use App\Http\Requests\ProductRequest\ProductCreateRequest;
use App\Http\Requests\ProductRequest\ProductUpdateRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class ProductController extends Controller
{
    public function createProduct(
        ProductCreateRequest $request,
        ProductCreateAction $createProductAction
    ): ProductCreateResource {
        $dto = ProductCreateDto::fromRequest($request);
        $product = $createProductAction->run($dto);

        return new ProductCreateResource($product);
    }

    public function updateProduct(
        ProductUpdateRequest $request,
        ProductUpdateAction $updateProductAction,
    ): ProductUpdateResource {
        $dto = ProductUpdateDto::fromRequest($request);
        $updateProductAction->run($dto);

        return new ProductUpdateResource($request);
    }


    public function deleteProduct(
        Request $request,
        ProductDeleteAction $productDeleteAction,
    ): ProductDeleteResource {
        $id = $request->route('product_id');
        $productDeleteAction->run($id);

        return new ProductDeleteResource($request);
    }

    public function read(
        Request $request,
        ProductReadAction $productReadAction
    ): AnonymousResourceCollection {
        $user = $request->user();
        $products = $productReadAction->run($user);

        return ProductReadResource::collection($products);
    }

}
