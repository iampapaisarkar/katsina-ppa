<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Http\Services\FileUpload;
use Illuminate\Support\Facades\Auth;
use PDF;

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

        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration', 'queried_by')->where('id', $id);

        if($invoice->exists()){
            if($authUser->hasRole(['ppa'])){
                $invoice = $invoice->first();
            }
            if($authUser->hasRole(['vendor'])){
                $invoice = $invoice->where('user_id', $authUser->id)->first();
            }

            return view('invoice.show', compact('invoice'));

        }else{
            return abort(404);
        }
    }

    public function paymentUpdate(Request $request, $id){
        
        $authUser = Auth::user();

        if(Payment::where(['id' => $id, 'user_id' => $authUser->id])->exists()){
            $this->validate($request, [
                'payment_date' => [
                    'required'
                ],
                'payment_method' => [
                    'required'
                ]
            ]);
        }else{
            $this->validate($request, [
                'evidence_of_payment' => [
                    'required'
                ],
                'payment_date' => [
                    'required'
                ],
                'payment_method' => [
                    'required'
                ]
            ]);
        }

        if($request->file('evidence_of_payment')){
            $evidence_of_payment = FileUpload::upload($request->file('evidence_of_payment'), $private = true, 'vendor', 'evidence_of_payment');
        }else{
            $evidence_of_payment = Payment::where(['id' => $id, 'user_id' => $authUser->id])->first()->evidence_of_payment;
        }

        Payment::where(['id' => $id, 'user_id' => $authUser->id])->update([
            'status' => 'pending',
            'is_online' => false,
            'evidence_of_payment' => $evidence_of_payment,
            'payment_date' => \Carbon\Carbon::parse($request->payment_date)->format('Y-m-d'),
            'payment_method' => $request->payment_method
        ]);


        return back()->withSuccess('Payment update successfully');
    }

    public function download($id){
        
        $authUser = Auth::user();

        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration')->where('id', $id);

        if($invoice->exists()){
        
            if($authUser->hasRole(['ppa'])){
                $invoice = $invoice->first();
            }
            if($authUser->hasRole(['vendor'])){
                $invoice = $invoice->where('user_id', $authUser->id)->first();
            }

            $logo = asset('libs/app-assets/images/logo/logo.png');
            // $logo = "http://127.0.0.1:8000/libs/app-assets/images/logo/logo.png";

            $pdf = PDF::loadView('pdf.invoice', ['invoice' => $invoice, 'logo' => $logo]);
            return $pdf->stream();
        }else{
            return abort(404);
        }
    }

    public function unpaidIndex(Request $request){

        $invoices = Payment::with('user', 'vendor_registration')->where('status', 'unpaid');

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }
        $invoices = $invoices->latest()->paginate($perPage);

        return view('invoice.unpaid.index', compact('invoices'));
    }

    public function unpaidShow($id){
        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration')->where('id', $id)
        ->where('status', 'unpaid')->first();

        if($invoice){
            return view('invoice.unpaid.show', compact('invoice'));
        }else{
            return abort(404);
        }
    }

    public function pendingIndex(Request $request){

        $invoices = Payment::with('user', 'vendor_registration')->where('status', 'pending');

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }
        $invoices = $invoices->latest()->paginate($perPage);

        return view('invoice.pending.index', compact('invoices'));
    }

    public function pendingShow($id){
        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration')->where('id', $id)
        ->where('status', 'pending')->first();

        if($invoice){
            return view('invoice.pending.show', compact('invoice'));
        }else{
            return abort(404);
        }
    }

    public function downloadEvidence($id){
        
        $payment = Payment::where(['id' => $id])->first();

        if($payment){
            $path = storage_path('app'. DIRECTORY_SEPARATOR . 'private' . 
            DIRECTORY_SEPARATOR . $payment->user_id . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . $payment->evidence_of_payment);
            return response()->download($path);
        }else{
            return abort(404);
        }
    }

    public function pendingQueried(Request $request, $id){
        
        $this->validate($request, [
            'reason' => [
                'required'
            ]
        ]);

        Payment::where(['id' => $id, 'status' => 'pending'])->update([
            'status' => 'queried',
            'query' => $request->reason,
            'query_by' => Auth::user()->id,
        ]);

        return redirect('pending-invoice')->withSuccess('Queried successfully');
    }

    public function pendingApproved($id){
        
        Payment::where(['id' => $id])->update([
            'status' => 'paid',
            'approve_by' => Auth::user()->id
        ]);

        return redirect('pending-invoice')->withSuccess('Approved successfully');
    }

    public function queriedIndex(Request $request){

        $invoices = Payment::with('user', 'vendor_registration')->where('status', 'queried');

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }
        $invoices = $invoices->latest()->paginate($perPage);

        return view('invoice.queried.index', compact('invoices'));
    }

    public function queriedShow($id){
        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration', 'queried_by')->where('id', $id)
        ->where('status', 'queried')->first();

        if($invoice){
            return view('invoice.queried.show', compact('invoice'));
        }else{
            return abort(404);
        }
    }

    public function approvedIndex(Request $request){

        $invoices = Payment::with('user', 'vendor_registration')->where('status', 'paid');

        if($request->per_page){
            $perPage = (integer) $request->per_page;
        }else{
            $perPage = 10;
        }
        $invoices = $invoices->latest()->paginate($perPage);

        return view('invoice.approved.index', compact('invoices'));
    }

    public function approvedShow($id){
        $invoice = Payment::with('user', 'service', 'extra_service', 'vendor_registration', 'approved_by')->where('id', $id)
        ->where('status', 'paid')->first();

        if($invoice){
            return view('invoice.approved.show', compact('invoice'));
        }else{
            return abort(404);
        }
    }
}
