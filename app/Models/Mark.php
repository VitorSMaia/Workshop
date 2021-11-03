<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mark extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'mark';

    public function index()
    {
        return Mark::all();
    }
    public function getMarkById($id)
    {
        return Mark::where('id',$id)
        ->get();
    }
    public function postMark($request)
    {
        return Mark::insert([
            "descricao" => $request->description,
            "created_at" => Carbon::now()
        ]);
    }
    public function updateMark($request,$id)
    {
        return Mark::where('id',$id)
        ->update([
            "descricao" => $request->description
        ]);
    }
    public function deleteMark($id)
    {
        return Mark::where('id',$id)
        ->delete();
    }
}
