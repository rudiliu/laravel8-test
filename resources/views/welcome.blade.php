@extends('layouts.auth')

@section('content')

<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row welcome">
                            
                            <div class="col-lg-6 d-lg-block bg-login-image" onclick="window.location='{{ route('login') }}';"> 
                            <div class="text-center">
                                <a id="login-form" href="{{ route('login') }}" class="btn">
                                    <h3 class="text-uppercase welcome-login-text" >I want to login</h3>
                                </a>
                            </div>
           
                            </div>
                            <div class="col-lg-6 d-lg-block bg-register-image" onclick="window.location='{{ route('register') }}';">
                                <div class="text-center">
                                    <a id="regsiter-form" href="{{ route('register') }}" class="btn">
                                        <h3 class="text-uppercase welcome-register-text" >I want to register</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
