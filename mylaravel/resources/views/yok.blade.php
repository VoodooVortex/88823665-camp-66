@extends('layouts.default_menu')
@section('content')
    <form action="{{ url('/yok') }}" method="POST">
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
                        <input type="text" name="namepk" id="name" class="form-control" placeholder="Enter your name">
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
    <table class="table table-bordered">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-12">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <div class="card-header">
                                    <h3 class="card-title">User List</h3>
                                </div>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th style="width: 240px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pk as $i)
                                    <tr class="align-middle">
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $i->name }}</td>
                                        <td>{{ $i->email }}</td>
                                        <td>
                                            <form action="{{ url('/yok') }}" onsubmit="return confirm_delete(event)"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $i->id }}"
                                                    id="">
                                                <button type="submit" class="btn btn-danger">ลบ</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        </tbody>
    </table>
@endsection

@section('scripts')
    <script>
        function confirm_delete(event) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(() => {
                        event.target.submit();
                    });
                }
            });
        }
    </script>
@endsection

</html>
