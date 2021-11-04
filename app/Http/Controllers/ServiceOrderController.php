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

            if(count($ServiceOrder) == 0)
            {
                return response('Attention, you don`t have ServiceOrders',202);
            }else{
                return response(json_decode($ServiceOrder),200);
            }
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::index');
            return response('Erro ServiceOrderController::index' . getMenssage($th), 401);
        }
    }
    public function getServiceOrderById($id)
    {
        try
        {
            $ServiceOrder = ServiceOrder::getServiceOrdetById($id);
            if(count($ServiceOrder) == 0)
            {
                return response('Attention, you don`t have ServiceOrders with this ID',202);
            }else{
                return response($ServiceOrder,200);
            }
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::getServiceOrderById');
            return response('Erro ServiceOrderController::getServiceOrderById' . getMenssage($th), 401);
        }
    }
    public function postServiceOrder(ServiceOrderRequest $request)
    {
        try
        {
            $ServiceOrder['OS']             =   ServiceOrderController::generatorServiceOrder();
            $ServiceOrder['title']          =   $request['title'];
            $ServiceOrder['description']    =   $request['description'];
            $ServiceOrder['idMark']         =   $request['idMark'];
            $ServiceOrder['idModel']        =   $request['idModel'];
            $ServiceOrder['idCustomer']     =   $request['idCustomer'];
            $ServiceOrder['dtAbertura']     =   Carbon::now();

            ServiceOrder::postServiceOrder($ServiceOrder);
            return response("Congratulations, you created ServiceOrders with this ID",201);
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
            if(ServiceOrder::getServiceOrdetById($id) != 0)
            {
                ServiceOrder::updateServiceOrder($ServiceOrder,$id);
                return response('Congratulations, you updated ServiceOrder with this ID',200);
            }
            return response("Atencion, it was not possible to updated the Service Order with this ID",201);
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
            if(count(ServiceOrder::getServiceOrdetById($id)) == 0)
            {
                return response('Attention, you do not have ServiceOrders with this ID: '.$id,202);
            }
            if(ServiceOrder::deleteServiceOrder($id) == 1)
            {
                return response('Congratulations, you deleted ServiceOrders with this ID',200);
            }
            return response('Danger, it was not possible to delete the ServiceOrder with this ID',405);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ServiceOrderController::deleteServiceOrder');
            return response('Erro ServiceOrderController::deleteServiceOrder' . $th, 401);
        }
    }
    public function generatorServiceOrder()
    {

        $GeneratedOrderService = ServiceOrder::getOrderService();

        if(count($GeneratedOrderService) != 0)
        {
            for($i = 0; $i <= count($GeneratedOrderService); $i++)
            {
                $OrdemService = rand(1000,99000);
                $OrdemService = Carbon::now()->format('Ymd') . $OrdemService;
                if($OrdemService != $GeneratedOrderService[$i]['OS'])
                {
                    return $OrdemService;
                }
            }
        }else{
            $OrdemService = rand(1000,99000);
            $OrdemService = Carbon::now()->format('Ymd') . $OrdemService;
            return $OrdemService;
        }

    }
}
