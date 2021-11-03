<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Part extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'parts';

    public function index()
    {
        return Part::all();
    }
    public function getPartById($id)
    {
        return Part::where('id',$id)
        ->get();
    }
    public function postPart($request)
    {
        return Part::insert([
            "descricao"     => $request->description,
            "idModel"       => $request->idModel,
            "idProducer"    => $request->idProducer,
            "idMark"        => $request->idMark,
            "created_at"    => Carbon::now()
        ]);
    }
    public function updatePart($request,$id)
    {
        return Part::where('id',$id)
        ->update([
            "descricao"     => $request->description,
            "idModel"       => $request->idModel,
            "idProducer"    => $request->idProducer,
            "idMark"        => $request->idMark
        ]);
    }
    public function deletePart($id)
    {
        return Part::where('id',$id)
        ->delete();
    }

}
