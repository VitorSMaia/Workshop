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
            $Producer = Producer::index();

            if(!empty($Producer))
            {
                return response($Producer, 200);
            }
            return response('Attention, you don`t have Producer',202);
        }catch(Throwable $th)
        {
            Log::info('Error in ProducerController::index');
            Log::getMenssage($th);
            return response('Error in ProducerController::index' . $th, 500);
        }
    }
    public function getProducerById($id)
    {
        try
        {
            $Producer = Producer::getProducerById($id);
            if(!empty($Producer))
            {
                return response($Producer,200);
            }
            return response('Attention, you don`t have Producer with ID: ' . $id,202);
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
            return response("Congratulations, you created ServiceOrders with this ID: " . $ProducerID,200);
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
            $Producer = Producer::getProducerById($id);
            $Producer['descricao']  = $request->description;

            if(!empty($Producer))
            {
                $Producer = Producer::updateProducer($Producer,$id);
                return response("Congratulations, you updated Producer with this ID: " . $id ,200);
            }
            return response('Attention, you don`t have Producer with this ID: ' . $id ,202);
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
                return response('Attention, you do not have Producer with this ID: '.$id ,202);
            }
            if(Producer::deleteProducer($id) == 1)
            {
                return response('Congratulations, you deleted Producer with this ID: ' . $id ,200);
            }
            return response('Danger, it was not possible to delete the Producer with this ID: ' . $id ,405);
        }catch(Throwable $th)
        {
            Log::info('Erro ProducerController::deleteProducer');
            Log::getMenssage($th);
            return response('Erro ProducerController::deleteProducer' . getMessage($th), 500);
        }
    }
}
