@extends('layouts.auth')
@section('content')
<div class="auth-wrapper">
    <div class="auth-sidecontent">
        <div class="text-start px-3 px-md-5">
            <a href="/" class="d-block mt-5 rounded p-2"><img src="{{asset('assets/images/favicon.png')}}" alt="img"></a>
            <p class="text-white  display-1">CLEVERS SCHOOLS.</p>
        </div>
    </div>
    <div class="auth-form">

            <div class="card my-5 mx-3">
                <form method="post" action="/resetpassword">
                    @csrf
                <div class="card-header bg-danger">
                    <h4 class="text-center text-white mb-0 f-w-500">Reset Password</h4>
                </div>
                @if($errors->any())
                    <div class="alert alert-danger m-2">
                        <h6 class="alert-heading">
                            <span class="fa fa-exclamation-triangle"></span> Please Fix The Following Errors
                        </h6>
                        <ol>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ol>
                    </div>
                @endif
                    <div class="card-body">
                        <input type="hidden" value="{{$token}}" name="token">
                        <div class="form-group mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="Email Address">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" id="floatingInput1" placeholder="Confirm Password">
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-danger">Reset Password</button>
                        </div>
                    </div>
                    <div class="card-footer border-top">
                    <div class="d-flex justify-content-between align-items-end">
                        <div>
                            <h6 class="f-w-500 mb-0">Go Back To</h6>
                            <a href="/login" class="link-info fw-bold">Login</a>
                        </div>
                        <a href="/"><img width="50" height="50" src="{{asset('assets/images/favicon.png')}}" alt="img"></a>
                    </div>
                </div>
                </form>

            </div>

    </div>
</div>
@endsection
