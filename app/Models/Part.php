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
    public function postPart($Part)
    {
        return Part::insertGetId($Part);
    }
    public function updatePart($Part,$id)
    {
        return Part::where('id',$id)
        ->update($Part);
    }
    public function deletePart($id)
    {
        return Part::where('id',$id)
        ->delete();
    }

}
