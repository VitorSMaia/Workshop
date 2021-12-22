<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ModelRequest;
use App\Models\Models;
use Carbon\Carbon;

class ModelController extends Controller
{
    public function index()
    {
        try
        {
            return view('model');
        }catch(Throwable $th)
        {
            Log::info('Error in ModelController::index');
            Log::info(getMenssage($th));
            return response('Error in ModelController::index' . getMessage($th), 401);
        }
    }
    public function getModelById($id)
    {
        try
        {
            $Model = Models::getModelsById($id);
            if(!empty($Model))
            {
                return $Models;
            }
            return response('Attention, you don`t have Model with this ID: ' . $id ,202);
        }catch(Throwable $th)
        {
            Log::info('Erro ModelController::getModelById');
            Log::info(getMenssage($th));
            return response('Erro ModelController::getModelById' . getMenssage($th), 401);
        }
    }
    public function postModel(ModelRequest $request)
    {
        try
        {

            $Model = [
                "descricao"     => $request->description,
                "created_at"    => Carbon::now()
            ];
            $ModelID = Models::postModels($Model);
            return response("Congratulations, you created Model with this ID: " . $ModelID ,201);
        }catch(Throwable $th)
        {
            Log::info('Erro ModelController::postModel');
            Log::getMenssage($th);
            return response('Erro ModelController::postModel' . getMessage($th), 401);
        }
    }
    public function updateModel(ModelRequest $request,$id)
    {
        try
        {
            $Model = [
                "descricao" => $request->description
            ];
            
            $ModelID = Models::updateModels($Model,$id);
            return response("Congratulations, you edited Model with this ID: " . $ModelID ,201);
        }catch(Throwable $th)
        {
            Log::info('Error in ModelController::updateModel');
            Log::info(getMenssage($th));
            return response('Erro ModelController::updateModel' . getMenssage($th), 401);
        }
    }
    public function deleteModel($id)
    {
        try
        {
            if(count(Models::getModelsById($id)) == 0)
            {
                return response('Attention, you do not have Model with this ID: '.$id ,202);
            }
            if(Models::deleteModels($id) == 1)
            {
                return response('Congratulations, you deleted Model with this ID: ' . $id ,200);
            }
            return response('Danger, it was not possible to delete the Model with this ID: ' . $id ,405);
        }catch(Throwable $th)
        {
            Log::info('Error ModelController::deleteModel');
            Log::info(getMenssage($th));
            return response('Erro ModelController::deleteModel' . getMenssage($th), 401);
        }
    }
}
