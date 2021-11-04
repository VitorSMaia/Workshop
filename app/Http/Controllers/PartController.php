<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartRequest;
use App\Models\Part;
use Carbon\Carbon;

class PartController extends Controller
{
    public function index()
    {
        try
        {
            $Part = Part::index();

            if(count($Part) == 0)
            {
                return response('Attention, you don`t have ServiceOrders',202);
            }else{
                return response(json_decode($Part),200);
            }
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::index');
            return response('Erro PartController::index' . $th, 401);
        }
    }
    public function getPartById($id)
    {
        try
        {
            $Part = Part::getPartById($id);
            if(count($Part) == 0)
            {
                return response('Attention, you don`t have ServiceOrders',202);
            }else{
                return response(json_decode($Part),200);
            }
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::getPartById');
            return response('Erro PartController::getPartById' . $th, 401);
        }
    }
    public function postPart(PartRequest $request)
    {
        try
        {
            $Part['descricao']  = $request->description;
            $Part['idModel']    = $request->idModel;
            $Part['idProducer'] = $request->idProducer;
            $Part['idMark']     = $request->idMark;
            $Part['created_at'] = Carbon::now();

            Part::postPart($Part);
            return response('Congratulations, you created Parts with this ID',201);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::postPart');
            return response('Erro PartController::postPart' . $th, 401);
        }
    }
    public function updatePart(PartRequest $request,$id)
    {
        try
        {
            $PartID = Part::getPartById($id);

            $Part['descricao']  = $request->description;
            $Part['idModel']    = $request->idModel;
            $Part['idProducer'] = $request->idProducer;
            $Part['idMark']     = $request->idMark;

            if(count($PartID) == 0)
            {
                return response('Attention, you don`t have ServiceOrders',202);
            }else{
                Part::updatePart($Part,$id);
                return response('Congratulations, you created Parts with this ID',201);
            }
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::updatePart');
            return response('Erro PartController::updatePart' . $th, 401);
        }
    }
    public function deletePart($id)
    {
        try
        {
            if(count(Part::getPartById($id)) == 0)
            {
                return response('Attention, you do not have ServiceOrders with this ID: '.$id,202);
            }
            if(Part::deletePart($id) == 1)
            {
                return response('Congratulations, you deleted ServiceOrders with this ID',200);
            }
            return response('Danger, it was not possible to delete the ServiceOrder with this ID',405);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::deletePart');
            return response('Erro PartController::deletePart' . $th, 401);
        }
    }
}
