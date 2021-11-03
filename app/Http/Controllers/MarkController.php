<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MarkRequest;
use App\Models\Mark;

class MarkController extends Controller
{
    public function index()
    {
        try
        {
            $mark = Mark::index();
            return response($mark,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro MarkController::index');
            return response('Erro MarkController::index' . $th, 401);
        }
    }
    public function getMarkById($id)
    {
        try
        {
            $mark = Mark::getMarkById($id);
            return response($mark,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro MarkController::getMarkById');
            return response('Erro MarkController::getMarkById' . $th, 401);
        }
    }
    public function postMark(MarkRequest $request)
    {
        try
        {
            $mark = Mark::postMark($request);
            return response($mark,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro MarkController::postMark');
            return response('Erro MarkController::postMark' . $th, 401);
        }
    }
    public function updateMark(MarkRequest $request,$id)
    {
        try
        {
            $mark = Mark::updateMark($request,$id);
            return response($mark,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro MarkController::updateMark');
            return response('Erro MarkController::updateMark' . $th, 401);
        }
    }
    public function deleteMark($id)
    {
        try
        {
            $mark = Mark::deleteMark($id);
            return response($mark,200);
        }catch(Throwable $th)
        {
            Log::getMenssage($th);
            Log::info('Erro MarkController::deleteMark');
            return response('Erro MarkController::deleteMark' . $th, 401);
        }
    }
}
