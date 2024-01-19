<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Services\Product\Dto\ProductCreateDto;
use App\Services\Product\Dto\ProductDeleteDto;
use App\Services\Product\Dto\ProductUpdateDto;
use App\Http\Resources\Product\ProductResource;
use App\Http\Requests\Product\ProductIndexRequest;
use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductDeleteRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Services\Product\Actions\ProductIndexAction;
use App\Services\Product\Actions\ProductCreateAction;
use App\Services\Product\Actions\ProductDeleteAction;
use App\Services\Product\Actions\ProductUpdateAction;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ProductController extends Controller
{
    public function create(
        ProductCreateRequest $request,
        ProductCreateAction $createProductAction
    ): ProductResource {
        $dto = ProductCreateDto::fromRequest($request);
        $product = $createProductAction->run($dto);

        return new ProductResource($product);
    }

    public function update(
        ProductUpdateRequest $request,
        ProductUpdateAction $updateProductAction,
    ): ProductResource {
        $dto = ProductUpdateDto::fromRequest($request);
        $product = $updateProductAction->run($dto);

        return new ProductResource($product);
    }

    public function delete(
        ProductDeleteRequest $request,
        ProductDeleteAction $productDeleteAction,
    ): JsonResponse {
        $dto = productDeleteDto::fromRequest($request);
        $productDeleteAction->run($dto);

        return new JsonResponse([
            'success' => true,
            'message' => 'Product deleted successfully'
        ]);
    }

    public function index(
        ProductIndexRequest $request,
        ProductIndexAction $productReadAction
    ): AnonymousResourceCollection {
        $userId = $request->getUserId();
        $products = $productReadAction->run($userId);

        return ProductResource::collection($products);
    }
}
