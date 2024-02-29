<?php

namespace App\Http\Controllers\Salla;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\Interfaces\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductServiceInterface $productService)
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        try{
            $products = $this->productService->all();
            return ProductResource::collection($products);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function store(StoreProductRequest $request)
    {
        try{
            $data = $request->validated();
            $this->productService->create($data);
            return response()->json(['message' => 'Product Created Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function show($id)
    {
        try{
            $product = $this->productService->find($id);
            return ProductResource::make($product);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function update($id , UpdateProductRequest $request)
    {
        try{
            $data = $request->validated();
            $model = $this->productService->find($id);
            $this->productService->update($model,$data);
            return response()->json(['message' => 'Product Updated Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function destroy($id)
    {
        try{
            $this->productService->delete($id);
            return response()->json(['message' => 'Product Deleted Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }
}
