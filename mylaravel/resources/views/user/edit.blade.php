@extends('layouts.default')
@section('title', 'Register')
@section('content')
    <div class="register-page">
        <div class="register-box">
            <!-- /.register-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="{{ url('user') }}"
                        class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                        <h1 class="mb-0">Edit User</h1>
                    </a>
                </div>
                <div class="card-body register-card-body">
                    <p class="register-box-msg">Edit User</p>
                    <form action="{{ url('/user') }}" method="post">
                        @csrf
                        @method('put')
                        <input type="hidden" name="id" value="{{ $users->id }}">
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="registerFullName" value="{{ $users->name }}" name="name" type="text"
                                    class="form-control" placeholder="" />
                                <label for="registerFullName">Full Name</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-person"></span></div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="registerEmail" value="{{ $users->email }}" name="email" type="email"
                                    class="form-control" placeholder="" />
                                <label for="registerEmail">Email</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                        </div>
                        <div class="input-group mb-1">
                            <div class="form-floating">
                                <input id="registerPassword" name="password" type="password" class="form-control"
                                    placeholder="" />
                                <label for="registerPassword">Password</label>
                            </div>
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                        </div>
                        <!--begin::Row-->
                        <div class="row my-3 justify-content-center">
                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>
                </div>
                <!-- /.register-card-body -->
            </div>
        </div>
    </div>
    <!-- /.register-box -->
@endsection
