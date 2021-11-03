<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ServiceOrder extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'service_order';


    public function index()
    {
        return ServiceOrder::all();
    }

    public function postServiceOrder($ServiceOrder)
    {
        return ServiceOrder::insert([
            "OS"            => $ServiceOrder['OS'],
            "titulo"        => $ServiceOrder['title'],
            "descricao"     => $ServiceOrder['description'],
            "idMark"        => $ServiceOrder['idMark'],
            "idModel"       => $ServiceOrder['idModel'],
            "idCustomer"    => $ServiceOrder['idCustomer'],
            "dtAbertura"    => $ServiceOrder['dtAbertura'],
            "created_at"    => $ServiceOrder['dtAbertura']
        ]);
    }
    public function updateServiceOrder($ServiceOrder, $id)
    {
        return ServiceOrder::where('id',$id)
        ->update([
            "idMark"        => $ServiceOrder['idMark'],
            "idModel"       => $ServiceOrder['idModel'],
            "idCustomer"    => $ServiceOrder['idCustomer']
        ]);
    }
    public function deleteServiceOrder($id)
    {
        return ServiceOrder::where('id',$id)
        ->delete();
    }
    public function GeneratedOrderService()
    {
        return ServiceOrder::select('OS')
        ->get();
    }
}
