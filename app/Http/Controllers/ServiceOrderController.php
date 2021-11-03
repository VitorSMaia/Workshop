<?php

namespace App\Http\Controllers;
use App\Http\Requests\ServiceOrderRequest;
use Illuminate\Http\Request;
use App\Models\ServiceOrder;
use Carbon\Carbon;
use Log;

class ServiceOrderController extends Controller
{
    public function index()
    {
        try
        {
            $ServiceOrder = ServiceOrder::index();
            return response($ServiceOrder,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::index');
            return response('Erro ServiceOrderController::index' . $th, 401);
        }
    }
    public function getServiceOrderById($id)
    {
        try
        {
            $ServiceOrder = ServiceOrder::getServiceOrderById($id);
            return response($ServiceOrder,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::getServiceOrderById');
            return response('Erro ServiceOrderController::getServiceOrderById' . $th, 401);
        }
    }
    public function postServiceOrder(ServiceOrderRequest $request)
    {
        try
        {
            $OrdemService                   =   ServiceOrderController::generatorServiceOrder();
            $ServiceOrder['OS']             =   $OrdemService;
            $ServiceOrder['title']          =   $request['title'];
            $ServiceOrder['description']    =   $request['description'];
            $ServiceOrder['idMark']         =   $request['idMark'];
            $ServiceOrder['idModel']        =   $request['idModel'];
            $ServiceOrder['idCustomer']     =   $request['idCustomer'];
            $ServiceOrder['dtAbertura']     =   Carbon::now();

            ServiceOrder::postServiceOrder($ServiceOrder);
            return response("ServiceOrder Created Success",201);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::postServiceOrder');
            return response('Erro ServiceOrderController::postServiceOrder' . $th, 401);
        }
    }
    public function updateServiceOrder(ServiceOrderRequest $request,$id)
    {
        try
        {   
            $ServiceOrder['description']    =   $request['description'];
            $ServiceOrder['idMark']         =   $request['idMark'];
            $ServiceOrder['idModel']        =   $request['idModel'];
            $ServiceOrder['idCustomer']     =   $request['idCustomer'];
            ServiceOrder::updateServiceOrder($ServiceOrder,$id);
            return response("ServiceOrder Updated Success",201);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::updateServiceOrder');
            return response('Erro ServiceOrderController::updateServiceOrder' . $th, 401);
        }
    }
    public function deleteServiceOrder($id)
    {
        try
        {
            $ServiceOrder = ServiceOrder::deleteServiceOrder($id);
            return response($ServiceOrder,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::deleteServiceOrder');
            return response('Erro ServiceOrderController::deleteServiceOrder' . $th, 401);
        }
    }
    public function generatorServiceOrder()
    {

        $GeneratedOrderService = ServiceOrder::GeneratedOrderService();

        for($i = 0; $i <= count($GeneratedOrderService); $i++)
        {
            $OrdemService = rand(1000,99000);
            $OrdemService = Carbon::now()->format('Ymd') . $OrdemService;
            if($OrdemService != $GeneratedOrderService[$i]['OS'])
            {
                return $OrdemService;
            }
        }

    }
}
