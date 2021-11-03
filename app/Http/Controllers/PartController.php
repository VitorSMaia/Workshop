<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartRequest;
use App\Models\Part;

class PartController extends Controller
{
    public function index()
    {
        try
        {
            $Part = Part::index();
            return response($Part,200);
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
            return response($Part,200);
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
            $Part = Part::postPart($request);
            return response($Part,201);
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
            $Part = Part::updatePart($request,$id);
            return response($Part,200);
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
            $Part = Part::deletePart($id);
            return response($Part,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro PartController::deletePart');
            return response('Erro PartController::deletePart' . $th, 401);
        }
    }
}
