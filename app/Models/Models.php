<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Models extends Model
{
    use HasFactory;
    
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'model';

    public function index()
    {
        return Models::all();
    }
    public function getModelsById($id)
    {
        return Models::where('id',$id)
        ->get();
    }
    public function postModels($request)
    {
        return Models::insert([
            "descricao" => $request->description,
            "created_at" => Carbon::now()
        ]);
    }
    public function updateModels($request,$id)
    {
        return Models::where('id',$id)
        ->update([
            "descricao" => $request->description
        ]);
    }
    public function deleteModels($id)
    {
        return Models::where('id',$id)
        ->delete();
    }
}
