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
            if(empty(Part::index()))
            {
                return response('Attention, you don`t have ServiceOrders',202);
            }
            return response()->json(['msg' => 'sucess', 'data' => $Part],200);
            
        }catch(Throwable $th)
        {
            Log::info('Error in  PartController::index');
            Log::getMenssage($th);
            return response('Erro PartController::index' . getMenssage($th), 401);
        }
    }
    public function getPartById($id)
    {
        try
        {
            if(empty(Part::getPartById($id)))
            {
                return response()->json(['msg' => 'Attention, you don`t have ServiceOrders', 'data' => 'Not Found'],404);
            }
            return response()->json(['msg' => 'sucess','data' => Part::getPartById($id)],200);
        }catch(Throwable $th)
        {
            Log::info('Erro PartController::getPartById');
            Log::getMenssage($th);
            return response('Erro PartController::getPartById' . getMenssage($th), 401);
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

            $PartID = Part::postPart($Part);
            return response()->json(['msg' => 'Congratulations, you created Parts with this ID: '. $PartID, 'data' => getPartById($PartID)] ,201);
        }catch(Throwable $th)
        {
            Log::info('Error in PartController::postPart');
            Log::getMenssage($th);
            return response('Error in PartController::postPart' . getMenssage($th), 500);
        }
    }
    public function updatePart(PartRequest $request,$id)
    {
        try
        {
            $Part['descricao']  = $request->description;
            $Part['idModel']    = $request->idModel;
            $Part['idProducer'] = $request->idProducer;
            $Part['idMark']     = $request->idMark;

            if(!empty(Part::getPartById($id)))
            {
                Part::updatePart($Part,$id);
                return response()->json(['msg' => 'Congratulations, you updated Parts with this ID: ' . $id, 'data' => getPartById($id)], 200);
            }
            return response('Attention, you don`t have Parts with this ID: ' . $id ,202);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::updatePart');
            return response('Erro PartController::updatePart' . $th, 500);
        }
    }
    public function deletePart($id)
    {
        try
        {
            if(empty(Part::getPartById($id)))
            {
                return response()->json(['msg' => 'Attention, you do not have ServiceOrders with this ID: '.$id],404);
            }
            if(Part::deletePart($id) == 1)
            {
                return response()-json(['msg' => 'Congratulations, you deleted ServiceOrders with this ID: ' . $id],200);
            }
            return response(['msg' => 'Danger, it was not possible to delete the ServiceOrder with this ID: ' . $id],405);
        }catch(Throwable $th)
        {
            Log::info('Error in PartController::deletePart');
            Log::getMenssage($th);
            return response('Error in PartController::deletePart' . getMenssage($th), 500);
        }
    }
}
