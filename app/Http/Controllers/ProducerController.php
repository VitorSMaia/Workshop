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
            return response($Producer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ProducerController::index');
            return response('Erro ProducerController::index' . $th, 401);
        }
    }
    public function getProducerById($id)
    {
        try
        {
            $Producer = Producer::getProducerById($id);
            return response($Producer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ProducerController::getProducerById');
            return response('Erro ProducerController::getProducerById' . $th, 401);
        }
    }
    public function postProducer(ProducerRequest $request)
    {
        try
        {
            $Producer = Producer::postProducer($request);
            return response($Producer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ProducerController::postProducer');
            return response('Erro ProducerController::postProducer' . $th, 401);
        }
    }
    public function updateProducer(ProducerRequest $request,$id)
    {
        try
        {
            $Producer = Producer::updateProducer($request,$id);
            return response($Producer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ProducerController::updateProducer');
            return response('Erro ProducerController::updateProducer' . $th, 401);
        }
    }
    public function deleteProducer($id)
    {
        try
        {
            $Producer = Producer::deleteProducer($id);
            return response($Producer,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ProducerController::deleteProducer');
            return response('Erro ProducerController::deleteProducer' . $th, 401);
        }
    }
}
