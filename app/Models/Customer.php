<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $connection = 'mysql';
    protected $table = 'customer';

    public function index()
    {
        return Customer::all();
    }
    public function getCustomerById($id)
    {
        return Customer::where('id',$id)
        ->get();
    }
    public function postCustomer($request)
    {
        return Customer::insert([
            "corporate_name" => $request->corporate_name,
            "cnpj_cpf" => $request->cnpj_cpf,
            "idContact" => $request->idContact,
            "created_at" => Carbon::now()
        ]);
    }
    public function updateCustomer($request,$id)
    {
        return Customer::where('id',$id)
        ->update([
            "corporate_name" => $request->corporate_name,
            "cnpj_cpf" => $request->cnpj_cpf,
            "idContact" => $request->idContact
        ]);
    }
    public function deleteCustomer($id)
    {
        return Customer::where('id',$id)
        ->delete();
    }
}
