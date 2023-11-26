<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DisburseProjectPayment;

class DisburseProjectPaymentController extends Controller
{
    public function index()
    {
        $disburse_project_payments = DisburseProjectPayment::all();
        $pending_projects = DisburseProjectPayment::where('payment_status', 'pending')->paginate(10);
        $disbursed_projects = DisburseProjectPayment::where('payment_status', 'disbursed')->paginate(10);
        $sl = !is_null(\request()->page) ? (\request()->page - 1) * 10 : 0;
        return view('backend.pages.disburse_project_payment.disburse_project_payment_index', compact('disburse_project_payments', 'pending_projects', 'disbursed_projects', 'sl'));
    }


    public function info(DisburseProjectPayment $disburse_project_payment)
    {
        return view('backend.pages.disburse_project_payment.disburse_project_payment_info', compact('disburse_project_payment'));
    }
    //file upload function
    public function uploadFile($title, $file)
    {

        $file_name = time() . '-' . $title . '.' . $file->getClientOriginalExtension();

        $file->move('storage/project_submission', $file_name);

        return $file_name;
    }
    //file unlink function
    private function unlink($file)
    {
        $pathToUpload = storage_path() . '/app/public/project_initiation/';
        if ($file != '' && file_exists($pathToUpload . $file)) {
            @unlink($pathToUpload . $file);
        }
    }
}
