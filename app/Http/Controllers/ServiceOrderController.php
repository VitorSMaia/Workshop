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
                return response()->json(['msg' => 'Attention, you don`t have ServiceOrders'],202);
            }else{
                return response()->json(['msg' => $ServiceOrder],200);
            }
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::index');
            Log::info(getMenssage($th));
            return response(['msg' => 'Error in ServiceOrderController::index' . getMenssage($th)], 500);
        }
    }
    public function getServiceOrderById($id)
    {
        try
        {
            $ServiceOrder = ServiceOrder::getServiceOrdetById($id);
            if(count($ServiceOrder) == 0)
            {
                return response(['msg' => 'Attention, you don`t have ServiceOrders with this ID: ' . $id ],202);
            }else{
                return response(['msg' =>$ServiceOrder],200);
            }
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Error in ServiceOrderController::getServiceOrderById');
            return response(['msg' =>'Error in ServiceOrderController::getServiceOrderById' . getMenssage($th)], 500);
        }
    }
    public function postServiceOrder(ServiceOrderRequest $request)
    {
        try
        {
            $ServiceOrder['OS']             =   ServiceOrderController::generatorServiceOrder();
            $ServiceOrder['titulo']         =   $request['title'];
            $ServiceOrder['descricao']      =   $request['description'];
            $ServiceOrder['idMark']         =   $request['idMark'];
            $ServiceOrder['idModel']        =   $request['idModel'];
            $ServiceOrder['idCustomer']     =   $request['idCustomer'];
            $ServiceOrder['dtAbertura']     =   Carbon::now();
            $ServiceOrder['created_at']     =   Carbon::now();
            $Parts                          =   $request['idParts'];

            $ServiceOrderId = ServiceOrder::postServiceOrder($ServiceOrder,$Parts);
            return response(['msg' => 'Congratulations, you created ServiceOrders with this ID:' . $ServiceOrderId] ,201);
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::postServiceOrder');
            Log::info(getMenssage($th));
            return response(['msg' => 'Error in ServiceOrderController::postServiceOrder' . getMenssage($th)], 500);
        }
    }
    public function updateServiceOrder(ServiceOrderRequest $request,$id)
    {
        try
        {
            $ServiceOrder['idMark']         =   $request['idMark'];
            $ServiceOrder['idModel']        =   $request['idModel'];
            $ServiceOrder['idCustomer']     =   $request['idCustomer'];

            if(count(ServiceOrder::getServiceOrdetById($id)) != 0)
            {
                ServiceOrder::updateServiceOrder($ServiceOrder,$id);
                return response(['msg' => 'Congratulations, you updated ServiceOrder with this ID: ' . $id],200);
            }
            return response("Atencion, it was not possible to updated the Service Order with this ID: " . $id ,202);
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::updateServiceOrder');
            Log::info(getMenssage($th));
            return response('Error in ServiceOrderController::updateServiceOrder' . getMenssage($th) ,500);
        }
    }
    public function deleteServiceOrder($id)
    {
        try
        {
            if(count(ServiceOrder::getServiceOrdetById($id)) == 0)
            {
                return response('Attention, you do not have ServiceOrders with this ID: '.$id ,202);
            }
            if(ServiceOrder::deleteServiceOrder($id) == 1)
            {
                return response('Congratulations, you deleted ServiceOrders with this ID: ' . $id ,200);
            }
            return response('Danger, it was not possible to delete the ServiceOrder with this ID: ' . $id ,405);
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::deleteServiceOrder');
            Log::info(getMenssage($th));
            return response('Error in ServiceOrderController::deleteServiceOrder' . getMenssage($th), 401);
        }
    }
    public function generatorServiceOrder()
    {
        $GeneratedOrderService = ServiceOrder::getOrderService();

        if(count($GeneratedOrderService) != 0)
        {
            for($i = 0; $i <= count($GeneratedOrderService); $i++)
            {
                $OrdemService = Carbon::now()->format('Ymdhis');
                if($OrdemService != $GeneratedOrderService[$i]['OS'])
                {
                    return $OrdemService;
                }
            }
        }else{
            $OrdemService = Carbon::now()->format('Ymdhis');
            return $OrdemService;
        }

    }
}
