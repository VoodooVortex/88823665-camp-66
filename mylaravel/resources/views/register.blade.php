@extends('layouts.default')
@section('title', 'Register')
@section('content')
    <div class="register-page">
        <div class="register-box">
            <!-- /.register-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <a href="../index2.html"
                        class="link-dark text-center link-offset-2 link-opacity-100 link-opacity-50-hover">
                        <h1 class="mb-0"><b>Admin</b>LTE</h1>
                    </a>
                </div>
                <div class="card-body register-card-body">
                    <p class="register-box-msg">Register a new membership</p>
                    <form action="{{ url('/register') }}" onsubmit="return myFunction()" method="post">
                        @csrf
                        <div class="input-group mb-1">
                            <input id="name" name="name" type="text" class="form-control" oninput="checkName()"
                                placeholder="Full Name" />
                            <div class="input-group-text"><span class="bi bi-person"></span></div>
                            <div class="valid-feedback">
                                OK
                            </div>
                            <div class="invalid-feedback" id="invalid-name">
                                <b><u>กรุณากรอกข้อมูล</u></b>
                            </div>
                        </div>

                        <div class="input-group mb-1">
                            <input id="email" name="email" type="email" class="form-control" oninput="checkEmail()"
                                placeholder="Email" />
                            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                            <div class="valid-feedback">
                                OK
                            </div>
                            <div class="invalid-feedback" id="invalid-email">
                                <b><u>กรุณากรอกข้อมูล</u></b>
                            </div>
                        </div>

                        <div class="input-group mb-1">
                            <input id="pass" name="password" type="password" class="form-control"
                                oninput="checkPassword()" placeholder="Password" />
                            <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                            <div class="valid-feedback">
                                OK
                            </div>
                            <div class="invalid-feedback" id="invalid-password">
                                <b><u>กรุณากรอกข้อมูล</u></b>
                            </div>
                        </div>

                        <!--begin::Row-->
                        <div class="row my-3">
                            <div class="col-8 d-inline-flex align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label" for="myCheckbox">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                    <input class="form-check-input" type="checkbox" value="" oninput="checkCheckbox()"
                                        id="myCheckbox" />
                                    <div class="valid-feedback">
                                        OK
                                    </div>
                                    <div class="invalid-feedback" id="invalid-checkbox">
                                        <b><u>กรุณายืนยัน</u></b>
                                    </div>
                                </div>
                            </div>

                            <!-- /.col -->
                            <div class="col-4">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </form>

                    <p class="mb-0">
                        <a href="{{ url('login') }}" class="link-primary text-center"> I already have a membership </a>
                    </p>
                </div>
                <!-- /.register-card-body -->
            </div>
        </div>
    </div>
    <!-- /.register-box -->
@endsection

@section('scripts')
    <script>
        checkName = () => {
            let name = $('#name')
            if (name.val() == '') {
                name.addClass('is-invalid')
                name.removeClass('is-valid')
                return false
            } else {
                name.addClass('is-valid')
                name.removeClass('is-invalid')
            }
            return true
        }

        checkEmail = () => {
            let email = $('#email')
            if (email.val() == '' || !email.val().includes('@') || !email.val().includes('.')) {
                email.addClass('is-invalid')
                email.removeClass('is-valid')
                return false
                // $('#invalid-email').show();
            } else {
                email.addClass('is-valid')
                email.removeClass('is-invalid')
                // $('#invalid-email').hide();
            }
            return true
        }

        checkPassword = () => {
            let pass = $('#pass')
            if (pass.val() == '' || !/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])/.test(pass.val())) {
                pass.addClass('is-invalid')
                pass.removeClass('is-valid')
                return false
            } else {
                pass.addClass('is-valid')
                pass.removeClass('is-invalid')
            }
            return true
        }

        checkCheckbox = () => {
            let myCheckbox = $('#myCheckbox')
            if (!myCheckbox.prop('checked')) {
                myCheckbox.addClass('is-invalid')
                myCheckbox.removeClass('is-valid')
                return false
            } else {
                myCheckbox.addClass('is-valid')
                myCheckbox.removeClass('is-invalid')
            }
            return true
        }

        function myFunction() {
            // let name = document.getElementById('name')
            // let email = $('#email').val()
            // $('#invalid-name').html('vksdnvksvdvds')
            return checkName() && checkEmail() && checkPassword() && checkCheckbox()
        }
    </script>
@endsection
