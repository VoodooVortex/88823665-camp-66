@extends('layouts.default_menu')

@section('content')
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    name
                </th>
                <th>
                    email
                </th>
                <th colspan="4">
                    password
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $i)
                <tr>
                    <td>
                        {{ $i->name }}
                    </td>
                    <td>
                        {{ $i->email }}
                    </td>
                    <td>
                        {{ $i->password }}
                    </td>
                    <td>
                        <form action="{{ url('/display-test/' . $i->id) }}" method="GET">
                            <button class="btn btn-warning">แก้ไข</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ url('/display-test/' . $i->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('/test') }}" onsubmit="return confirm_delete(event)" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $i->id }}" id="">
                            <button type="submit" class="btn btn-danger">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
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
