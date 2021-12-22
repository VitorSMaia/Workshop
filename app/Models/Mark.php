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

    public static function index()
    {
        return Mark::all();
    }
    public function getMarkById($id)
    {
        return Mark::where('id',$id)
        ->get();
    }
    public static function postMark($description)
    {
        return Mark::insertGetId([
            "descricao" => $description,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
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
