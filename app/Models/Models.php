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
    public function postModels($Model)
    {
        return Models::insertGetId($Model);
    }
    public function updateModels($Model,$id)
    {
        return Models::where('id',$id)
        ->update($Model);
    }
    public function deleteModels($id)
    {
        return Models::where('id',$id)
        ->delete();
    }
}
