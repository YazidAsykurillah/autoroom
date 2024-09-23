<?php

namespace App\Http\Controllers\Datatables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DataTables;
use App\PurchaseOrderCustomer;

class PurchaseOrderCustomerDatatablesController extends Controller
{
    public function index()
    {
        $data = PurchaseOrderCustomer::query()
        ->with(
            [
                'quotation_customer'=>function($query){
                    return $query->select(
                        'quotation_customers.id',
                        'quotation_customers.code',
                        'quotation_customers.customer_id',
                    );
                }
            ]
        )
        ->with(
            [
                'quotation_customer.customer'=>function($query){
                    return $query->select(
                        'customers.id',
                        'customers.name',
                    );
                }
            ]
        )
        ->with(
            [
                'receiver'=>function($query){
                    return $query->select('users.id','users.name');
                }
            ],
        )
        ->select('purchase_order_customers.*');
        return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return NULL;
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
