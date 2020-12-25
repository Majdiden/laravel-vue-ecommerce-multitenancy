<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadAble;
use App\ProductImage;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    use UploadAble;

    protected $productRepository;

    public function __construct(ProductContract $productRepository)
    {
      $this->productRepository = $productRepository;
    }

    public function upload(Request $request)
{
    $product = $this->productRepository->findProductById($request->id);

    if ($request->has('images')) {

        $image = $this->uploadOne($request->images, 'products');

        $productImage = new ProductImage([
            'full'      =>  $image,
        ]);

        $product->images()->save($productImage);
    }

    return response()->json(['status' => 'Success']);
}
}
