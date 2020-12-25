<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $productRepository;

     public function __construct(ProductContract $productRepository)
     {
       $this->productRepository = $productRepository;
     }


    public function index()
    {
        $products = $this->productRepository->listProducts();

        return response()->json($products);
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $params = $request->except('_token');


    $product = $this->productRepository->createProduct($params);

    if (!$product) {
        return $this->responseRedirectBack('Error occurred while creating product.', 'error', true, true);
    }
    return $product;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with(['categories', 'attributes'])->findOrFail($id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $params = $request->except('_token');

      $product = $this->productRepository->updateProduct($params);

      if (!$product) {
          return $this->responseRedirectBack('Error occurred while updating product.', 'error', true, true);
      }
      return $product;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = $this->productRepository->deleteProduct($id);

      if(!$product){
        return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
      }
    }

}
