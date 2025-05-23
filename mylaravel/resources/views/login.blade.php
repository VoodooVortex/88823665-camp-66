@extends('layouts.default')
@section('title', 'Login')
@section('content')
    <div class="login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="../index2.html"
                        class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                        <h1 class="mb-0"><b>Admin</b>LTE</h1>
                    </a>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    @if (session('error'))
                        @php
                            $error = session('error');
                            echo "<div class='alert alert-danger'>$error</div>";
                        @endphp
                    @endif
                    <form action="{{ url('/login') }}" method="POST">
                        @csrf
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="loginEmail" name="email" type="email" class="form-control" value=""
                                    placeholder="" />
                                <label for="loginEmail">Email</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="loginPassword" name="password" type="password" class="form-control"
                                    placeholder="" />
                                <label for="loginPassword">Password</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        </div>
                        <!--begin::Row-->
                        <div class="row my-3">
                            <div class="col-8 d-inline-flex align-items-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    <label class="form-check-label" for="flexCheckDefault"> Remember Me </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>
                    <!-- /.social-auth-links -->
                    <p class="mb-1"><a href="forgot-password.html">I forgot my password</a></p>
                    <p class="mb-0">
                        <a href="{{ url('register') }}" class="text-center"> Register a new membership </a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->
    </div>

@endsection
