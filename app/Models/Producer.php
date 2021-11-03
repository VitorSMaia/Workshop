<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Producer extends Model
{
    use HasFactory;

    
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'producer';

    public function index()
    {
        return Producer::all();
    }
    public function getProducerById($id)
    {
        return Producer::where('id',$id)
        ->get();
    }
    public function postProducer($request)
    {
        return Producer::insert([
            "descricao" => $request->description,
            "created_at" => Carbon::now()
        ]);
    }
    public function updateProducer($request,$id)
    {
        return Producer::where('id',$id)
        ->update([
            "descricao" => $request->description
        ]);
    }
    public function deleteProducer($id)
    {
        return Producer::where('id',$id)
        ->delete();
    }
}
