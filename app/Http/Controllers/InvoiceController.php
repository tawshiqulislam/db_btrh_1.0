<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\DisburseProjectPayment;

class InvoiceController extends Controller
{
    public function store(Request $request, $id)
    {
        $project_initiation_id = DisburseProjectPayment::find($id)->project_initiation->id;
        try {
            Invoice::create([
                'project_initiation_id' =>  $project_initiation_id,
                'amount' => $request->amount,
                'generated_by' => auth()->user()->id,
            ]);
            DisburseProjectPayment::find($id)->update([
                'payment_status' => 'disbursed',
                'isDisbursed' => true,
                'disbursed_by' => auth()->user()->id
            ]);
            toastr()->success('Invoice has been created successfully!', 'Congrats');
            return redirect()->back();
        } catch (Exception $e) {
            toastr()->error('Something went wrong!', 'Oops');
            return redirect()->back();
        }
    }
}
