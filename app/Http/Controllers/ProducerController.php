<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProducerRequest;
use App\Models\Producer;

class ProducerController extends Controller
{  
    public function index()
    {
        try
        {
            if(!empty(Producer::index()))
            {
                return response()->json(['msg' => 'Sucess','data' => Producer::index()],200);
            }
            return response()->json(['msg' => 'Attention, you don`t have Producer','data' => 'Producers not found'],202);
        }catch(Throwable $th)
        {
            Log::info('Error in ProducerController::index');
            Log::getMenssage($th);
            return response('Error in ProducerController::index' . getMenssage($th), 500);
        }
    }
    public function getProducerById($id)
    {
        try
        {
            if(!empty(Producer::getProducerById($id)))
            {
                return response()->json(['msg' => 'Sucess','data' => Producer::getProducerById($id)],200);
            }
            return response()->json(['msg' => 'Attention, you don`t have Producer by ID:' . $id,'data' => 'Producer not found'],202);
        }catch(Throwable $th)
        {
            Log::info('Error in ProducerController::getProducerById');
            Log::getMenssage($th);
            return response('Error in ProducerController::getProducerById' . getMenssage($th), 500);
        }
    }
    public function postProducer(ProducerRequest $request)
    {
        try
        {
            $Producer['descricao']  = $request->description;
            $Producer['created_at'] = Carbon::now();

            $ProducerID = Producer::postProducer($Producer);

            return response()->json(["Congratulations, you created ServiceOrders with this ID: " . $ProducerID, 'data' => Producer::getProducerById($ProducerID)],200);
        }catch(Throwable $th)
        {
            Log::info('Error in ProducerController::postProducer');
            Log::getMenssage($th);
            return response('Error in ProducerController::postProducer' . getMenssage($th), 500);
        }
    }
    public function updateProducer(ProducerRequest $request,$id)
    {
        try
        {
            $Producer['descricao']  = $request->description;

            if(!empty(Producer::getProducerById($id)))
            {
                Producer::updateProducer($Producer,$id);
                return response()->json(['msg' => 'Congratulations, you updated Producer with this ID: ' . $id, 'data' => Producer::getProducerById($id)] ,200);
            }
            return response()->json(['Attention, you don`t have Producer with this ID: ' . $id] ,202);
        }catch(Throwable $th)
        {
            Log::info('Erro ProducerController::updateProducer');
            Log::getMenssage($th);
            return response('Erro ProducerController::updateProducer' . getMenssage($th), 500);
        }
    }
    public function deleteProducer($id)
    {
        try
        {
            if(empty(Producer::getProducerById($id)))
            {
                return response()->json(['msg' => 'Attention, you do not have Producer with this ID: '.$id, 'data' => Producer::getProducerById($id)] ,202);
            }
            if(Producer::deleteProducer($id) == 1)
            {
                return response()->json(['msg' => 'Congratulations, you deleted Producer with this ID: ' . $id, 'data' => 'Producer is deleted'] ,200);
            }
            return response()->json(['msg' => 'Danger, it was not possible to delete the Producer with this ID: ' . $id],405);
        }catch(Throwable $th)
        {
            Log::info('Erro ProducerController::deleteProducer');
            Log::getMenssage($th);
            return response('Erro ProducerController::deleteProducer' . getMessage($th), 500);
        }
    }
}
