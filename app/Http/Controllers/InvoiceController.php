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
        // $authUser = Auth::user();

        // $invoices = Payment::with('user', 'service');

        // if($authUser->hasRole(['sadmin'])){
            
        //     if($request->per_page){
        //         $perPage = (integer) $request->per_page;
        //     }else{
        //         $perPage = 10;
        //     }
    
        //     if(!empty($request->search)){
        //         $search = $request->search;
        //         $invoices = $invoices->where(function($q) use ($search){
        //             $q->where('order_id', 'like', '%' .$search. '%');
        //         });
        //     }
        //     $invoices = $invoices->latest()->paginate($perPage);

        // }else if($authUser->hasRole(['hospital_pharmacy', 'community_pharmacy', 'distribution_premises', 'manufacturing_premises', 'ppmv'])){

        //     $invoices = $invoices->latest()->where('user_id', $authUser->id)->get();
        // }

        // return view('invoice.index', compact('invoices'));
        return view('invoice.show');
    }
}
