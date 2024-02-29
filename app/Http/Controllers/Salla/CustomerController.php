<?php

namespace App\Http\Controllers\Salla;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct(private CustomerServiceInterface $customerService)
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        try{
            $customers = $this->customerService->all();
            return CustomerResource::collection($customers);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function store(StoreCustomerRequest $request)
    {
        try{
            $data = $request->validated();
            $this->customerService->create($data);
            return response()->json(['message' => 'Custmoer Created Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function show($id)
    {
        try{
            $customer = $this->customerService->find($id);
            return CustomerResource::make($customer);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function update($id , UpdateCustomerRequest $request)
    {
        try{
            $data = $request->validated();
            $model = $this->customerService->find($id);
            $this->customerService->update($model,$data);
            return response()->json(['message' => 'Custmoer Updated Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }

    public function destroy($id)
    {
        try{
            $this->customerService->delete($id);
            return response()->json(['message' => 'Custmoer Deleted Successfully'] , 200);
        }catch(\Exception $e){
            return $e;
        }
    }
}
