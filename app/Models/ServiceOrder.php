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

    public function getServiceOrderById($id)
    {
        return ServiceOrder::where('id',$id)
        ->get();
    }

    public function postServiceOrder($ServiceOrder,$Parts)
    {

        $idServiceOrder = ServiceOrder::insertGetId($ServiceOrder);
        ServiceOrder_Parts::postRelation($idServiceOrder,$Parts);
        return $idServiceOrder;
    }
    public function updateServiceOrder($ServiceOrder, $id)
    {
        return ServiceOrder::where('id',$id)
        ->update($ServiceOrder);
    }
    public function deleteServiceOrder($id)
    {
        return ServiceOrder::where('id',$id)
        ->delete();
    }
    public function getOrderService()
    {
        return ServiceOrder::select('OS')
        ->get();
    }
}
