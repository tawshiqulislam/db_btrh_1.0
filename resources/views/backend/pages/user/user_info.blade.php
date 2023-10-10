@extends("backend.layouts.master")
@section("content")
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route("user.index") }}">User</a></li>
                <li class="breadcrumb-item active">Info</li>
            </ol>
        </nav>
        <hr>
    </div><!-- End Page Title -->

    <div class="container">
        <a href="{{ route("user.index") }}" class="btn btn-primary btn-sm mb-3 text-white"><i class="fa-solid fa-backward"></i>
            Back</a>
        <div class="row">
            <!-- Single user Card -->
            <div class="col-md-12 mx-auto">
                <div class="card">
                    <div class="row p-2">
                        <div class="col-md-6">
                            @if ($user->pro_pic)
                                <img style="width:200px" src="{{ asset("storage/user/" . $user->pro_pic) }}"
                                    class="card-img-top border border-1 p-2 rounded" alt="{{ $user->name }}">
                            @endif
                        </div>
                        <div class="col-md-12">
                            <div class="card-header d-flex justify-content-between">

                                <h5>{{ $user->name ?? "" }}</h5>

                                <a href="{{ route("user.edit", $user->id) }}" class=" btn btn-primary btn-sm text-white"><i
                                        class="fa-solid fa-file-pen"></i>
                                    Edit</a>

                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <p class="card-text"><strong>Username:</strong> {{ $user->username ?? "" }}</p>
                            </div>

                            <div class="col-md-6">
                                <p class="card-text"><strong>Email:</strong> {{ $user->email ?? "" }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Phone number:</strong> {{ $user->phone_no ?? "" }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Address:</strong> {{ $user->address ?? "" }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>ID Number:</strong> {{ $user->id_number ?? "" }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>ID type:</strong> {{ $user->id_type ?? "" }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Security question 1:</strong> {{ $user->sq_no_1 ?? "" }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Security question 1 answer:</strong>
                                    {{ $user->sq_no_1_ans ?? "" }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Security question 2:</strong> {{ $user->sq_no_2 ?? "" }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Security question 2
                                        answer:</strong>{{ $user->sq_no_2_ans ?? "" }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Date of Birth:</strong> {{ $user->date_of_birth ?? "" }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
