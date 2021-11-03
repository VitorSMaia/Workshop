<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;
use App\Models\Models;

class ModelController extends Controller
{
    public function index()
    {
        try
        {
            $model = Models::index();
            return response($model,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ModelController::index');
            return response('Erro ModelController::index' . $th, 401);
        }
    }
    public function getModelById($id)
    {
        try
        {
            $model = Models::getModelsById($id);
            return response($model,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ModelController::getModelById');
            return response('Erro ModelController::getModelById' . $th, 401);
        }
    }
    public function postModel(ModelRequest $request)
    {
        try
        {
            $model = Models::postModels($request);
            return response($model,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ModelController::postModel');
            return response('Erro ModelController::postModel' . $th, 401);
        }
    }
    public function updateModel(ModelRequest $request,$id)
    {
        try
        {
            $model = Models::updateModels($request,$id);
            return response($model,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ModelController::updateModel');
            return response('Erro ModelController::updateModel' . $th, 401);
        }
    }
    public function deleteModel($id)
    {
        try
        {
            $model = Models::deleteModels($id);
            return response($model,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro ModelController::deleteModel');
            return response('Erro ModelController::deleteModel' . $th, 401);
        }
    }
}
