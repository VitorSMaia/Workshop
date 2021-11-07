<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder_Parts extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'serviceOrder_parts';


    public function postRelation($idServiceOrder,$idParts)
    {
        for( $i = 0; $i < count($idParts); $i++)
        {
            ServiceOrder_Parts::insert([
                'idServiceOrder' => $idServiceOrder,
                'idParts'        => $idParts[$i]
            ]);
        }
    }
}
