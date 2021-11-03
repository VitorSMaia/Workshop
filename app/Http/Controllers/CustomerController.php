<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Log;

class CustomerController extends Controller
{
    public function index()
    {
        try
        {
            $customer = Customer::index();
            return response($customer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro CustomerController::index');
            return response('Erro CustomerController::index' . $th, 401);
        }
    }
    public function getCustomerById($id)
    {
        try
        {
            $customer = Customer::getCustomerById($id);
            return response($customer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro CustomerController::getCustomerById');
            return response('Erro CustomerController::getCustomerById' . $th, 401);
        }
    }
    public function postCustomer(CustomerRequest $request)
    {
        try
        {
            $customer = Customer::postCustomer($request);
            return response($customer,201);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro CustomerController::postCustomer');
            return response('Erro CustomerController::postCustomer' . $th, 401);
        }
    }
    public function updateCustomer(CustomerRequest $request,$id)
    {
        try
        {
            $customer = Customer::updateCustomer($request,$id);
            return response($customer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro CustomerController::updateCustomer');
            return response('Erro CustomerController::updateCustomer' . $th, 401);
        }
    }
    public function deleteCustomer($id)
    {
        try
        {
            $customer = Customer::deleteCustomer($id);
            return response($customer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro CustomerController::deleteCustomer');
            return response('Erro CustomerController::deleteCustomer' . $th, 401);
        }
    }
}
