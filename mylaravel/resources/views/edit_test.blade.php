@extends('layouts.default_menu')

@section('content')
    <h4>แก้ไข</h4>
    <form action="{{ url('/display-test') }}" method="POST">
        @csrf
        @method('PUT')
        <table class="table table-bordered">
            <input type="hidden" name="id" value="{{ $user->id }}">
            <thead>
                <tr>
                    <th>
                        name
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        password
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}"
                            placeholder="Enter your name">
                    </td>
                    <td>
                        <input type="text" name="email" id="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Enter your name">
                    </td>
                    <td>
                        <input type="password" name="password" id="password" value="{{ $user->password }}"
                            class="form-control" placeholder="Enter your password">
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
@endsection
