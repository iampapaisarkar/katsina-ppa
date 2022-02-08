<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index(Request $request){

        $authUser = Auth::user();
        $invoices = Payment::with('user');

        if($authUser->hasRole(['ppa'])){

            if($request->per_page){
                $perPage = (integer) $request->per_page;
            }else{
                $perPage = 10;
            }
            $invoices = $invoices->latest()->paginate($perPage);

        }else if($authUser->hasRole(['vendor'])){

            if($request->per_page){
                $perPage = (integer) $request->per_page;
            }else{
                $perPage = 10;
            }

            $invoices = $invoices->latest()->where('user_id', $authUser->id)->paginate($perPage);
        }

        return view('invoice.index', compact('invoices'));
    }

    public function show($id){
        $authUser = Auth::user();

        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration')->where('id', $id);

        if($authUser->hasRole(['ppa'])){
            $invoice = $invoice->first();
        }
        if($authUser->hasRole(['vendor'])){
            $invoice = $invoice->where('user_id', $authUser->id)->first();
        }

        return view('invoice.show', compact('invoice'));
    }

    public function paymentUpdate(Request $request, $id){
        
        $this->validate($request, [
            'evidence_of_payment' => [
                'required'
            ],
            'payment_date' => [
                'required'
            ],
            'payment_method' => [
                'required'
            ],
        ]);

        return back()->withSuccess('Payment update successfully');
    }
}
