@extends('layouts.default_menu')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-12">
                <div class="card-header">
                    <h3 class="card-title">User List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th style="width: 240px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $i)
                                <tr class="align-middle">
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $i->name }}</td>
                                    <td>{{ $i->email }}</td>
                                    <td>
                                        <a href="{{ url('/user/' . $i->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ url('user') }}" class="d-inline-flex"
                                            onsubmit="return confirm_delete(event)" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $i->id }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection

@section('scripts')
    <script>
        confirm_delete = async (event) => {
            event.preventDefault();
            let result = await Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            })

            if (result.isConfirmed) {
                await Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
                event.target.submit();
            }
        }
    </script>
@endsection
