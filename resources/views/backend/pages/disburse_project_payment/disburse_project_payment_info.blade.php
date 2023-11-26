@extends("backend.layouts.master")
@section("content")
    <!-- Page Title -->
    <div class="pagetitle">
        <h1>Disburse Project Payment</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("disburse_project_payment.index") }}">Disburse Project Payment</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div>
    <!-- main container -->
    <div class="container">
        <a href="{{ route("disburse_project_payment.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single project_initiation Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="card-header">

                        {{ $disburse_project_payment->project_initiation->name }}
                        @if ($disburse_project_payment->payment_status == "pending")
                            <a type="button" data-bs-toggle="modal" data-bs-target="#makeInvoiceModal" class=" btn btn-success text-white btn-sm float-end"><i class="fa-solid fa-file-invoice"></i>
                                Make Invoice</a>
                        @endif
                        {{-- @if ($disburse_project_payment->isApproved == true)
                            <a data-bs-toggle="modal" data-bs-target="#disburseProjectPaymentModal" type="button" class=" btn btn-success text-white btn-sm float-end">
                                <i class="fa-solid fa-sack-dollar"></i>
                                Send for disbursing payment</a>
                        @endif --}}
                    </div>
                    <div class="card-body mt-2">
                        <p><strong>Project Description: </strong>{{ $disburse_project_payment->description ?? "" }}</p>
                        <p><strong>Payment Status: </strong>{{ $disburse_project_payment->payment_status ?? "" }}</p>
                        <p><strong>Send By: </strong>{{ $disburse_project_payment->disburse_project_payment_send_by->username ?? "" }}</p>
                        <p><strong>isDisbursed: </strong>{{ $disburse_project_payment->isDisbursed ? "Yes" : "No" }}</p>
                        <p><strong>Disbursed By: </strong>{{ $disburse_project_payment->disburse_project_payment_disbursed_by->username ?? "Not disbursed yet!" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("backend.pages.disburse_project_payment.disburse_project_payment_make_invoice_modal")
@endsection
