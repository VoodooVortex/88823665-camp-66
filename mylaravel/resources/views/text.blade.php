@extends('layouts.default_menu')

@section('content')
    <form action="{{ url('/test') }}" method="POST">
        @csrf
        <table class="table table-bordered">
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
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your name">
                    </td>
                    <td>
                        <input type="text" name="email" id="email" class="form-control"
                            placeholder="Enter your name">
                    </td>
                    <td>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter your password">
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
