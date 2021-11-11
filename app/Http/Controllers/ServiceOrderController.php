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
            if(empty(ServiceOrder::index()))
            {
                return response()->json(['msg' => 'Attention, you don`t have ServiceOrders','data' => 'Service Orders not found'],202);
            }
            return response()->json(['msg' => 'Sucess','data' => ServiceOrder::index()],200);
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::index');
            Log::info(getMenssage($th));
            return response('Error in ServiceOrderController::index' . getMenssage($th), 500);
        }
    }

    public function getServiceOrderById($id)
    {
        try
        {
            if(empty(ServiceOrder::getServiceOrderById($id)))
            {
                return response(['msg' => 'Attention, you don`t have Service Order with this ID: ' . $id, 'data' => 'Service Order not found'],202);
            }
            return response(['msg' => 'success','data' => ServiceOrder::getServiceOrderById($id)],200);
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::getServiceOrderById');
            Log::getMenssage($th);
            return response('Error in ServiceOrderController::getServiceOrderById' . getMenssage($th), 500);
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

            return response(['msg' => 'Congratulations, you created ServiceOrders with this ID:' . ServiceOrder::postServiceOrder($ServiceOrder,$Parts), 'data' => $ServiceOrder] ,201);
        }catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::postServiceOrder');
            Log::info(getMenssage($th));
            return response('Error in ServiceOrderController::postServiceOrder' . getMenssage($th), 500);
        }
    }

    public function updateServiceOrder(ServiceOrderRequest $request,$id)
    {
        try
        {
            $ServiceOrder['titulo']        =   $request['title'];
            $ServiceOrder['descricao']     =   $request['description'];
            $ServiceOrder['idMark']        =   $request['idMark'];
            $ServiceOrder['idModel']       =   $request['idModel'];
            $ServiceOrder['idCustomer']    =   $request['idCustomer'];

            if(!empty(ServiceOrder::getServiceOrderById($id)))
            {
                ServiceOrder::updateServiceOrder($ServiceOrder,$id);
                $ServiceOrderUpdated = ServiceOrder::getServiceOrderById($id);
                return response()->json(['msg' => 'Congratulations, you updated ServiceOrder with this ID: ' . $id, 'data' => $ServiceOServiceOrderUpdatedrderNew],200);
            }
            return response()->json(['msg' => 'Atencion, it was not possible to updated the Service Order with this ID: '.$id],202);
        }
        catch(Throwable $th)
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
            if(empty(ServiceOrder::getServiceOrdetById($id)))
            {
                return response()->json(['msg' => 'Attention, you do not have ServiceOrders with this ID: '.$id] ,202);
            }
            else if(ServiceOrder::deleteServiceOrder($id) == 1)
            {
                return response()->json(['msg' => 'Congratulations, you deleted ServiceOrders with this ID: ' . $id] ,200);
            }
            return response()->json(['msg' => 'Danger, it was not possible to delete the ServiceOrder with this ID: ' . $id] ,405);
        }
        catch(Throwable $th)
        {
            Log::info('Error in ServiceOrderController::deleteServiceOrder');
            Log::info(getMenssage($th));
            return response('Error in ServiceOrderController::deleteServiceOrder' . getMenssage($th), 401);
        }
    }

    public function generatorServiceOrder()
    {
        try
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
        catch(Throwable $th)
        {
            Log::info('ServiceOrderController::generatorServiceOrder');
            Log::info(getMenssage($th));
            return response('Error in ServiceOrderController::generatorServiceOrder' . getMenssage($th), 401);
        }

    }
    
}
