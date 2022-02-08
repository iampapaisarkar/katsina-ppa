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

        $invoice = Payment::with('user', 'service', 'extra_service')->where('id', $id);

        if($authUser->hasRole(['ppa'])){
            $invoice = $invoice->first();
        }
        if($authUser->hasRole(['vendor'])){
            $invoice = $invoice->where('user_id', $authUser->id)->first();
        }

        // dd($invoice);

        return view('invoice.show', compact('invoice'));
    }
}
