@extends('layouts.default_menu')

@section('content')
    <form action="{{ url('/product') }}" method="post">
        @csrf
        <div class="row mt-3">
            <div class="col-6">
                <label for="">Category Name</label>
                <input type="text" name="category_name" class="form-control" id="">
            </div>
        </div>

        <button class="btn btn-primary mt-3" id="btn-add-product-list" type="button">+ เพิ่ม Product</button>

        {{-- product_list go to watch under in tag script --}}
        <div class="row mt-3" id="product_list">
            <div class="col-6">
                <label for="">Product Name <button type="button"
                        class="btn btn-danger ml-2 my-2 btn-del-product-list">ลบ</button></label>
                <input type="text" name="product_name[]" class="form-control" id="">
            </div>
        </div>

        <button type="submit" class="btn btn-success my-3">บันทึก</button>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td class="text-center">#</td>
                <td>Category Name</td>
                <td>ProductLis Name</td>
                <td>num of product</td>
                <td>User Name</td>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($category as $cate)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $cate->name }}</td>
                    <td>
                        <ul>
                            @foreach ($product as $pro)
                                @if ($cate->id == $pro->category_id)
                                    <li>{{ $pro->name }}</li>
                                @endif
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        @foreach ($product as $pro)
                            @foreach ($user as $i)
                                @if ($cate->id == $pro->category_id && $i->id == $pro->user_id)
                                    <div>{{ $i->name }}</div>
                                @endif
                            @endforeach
                        @endforeach
                    </td>
                </tr>
            @endforeach --}}

            {{-- sum all product --}}
            <tr>{{ $countPro }}</tr>

            @foreach ($categories as $cate)
                @php
                    $countProduct = 0;
                @endphp
                <tr>
                    <td class="text-center">{{ $loop->iteration }}.</td>
                    <td>{{ $cate->name }}</td>
                    <td>
                        <ul>
                            @foreach ($cate->products as $pro)
                                <li>{{ $pro->name }}</li>
                                @php
                                    $countProduct++;
                                @endphp
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{ $countProduct }}
                    </td>
                    <td>
                        <div>{{ $cate->products->first()->users->name }}</div>
                    </td>
                    <td>
                        <form action="{{ url('/product') }}" onsubmit="return confirm_delete(event)" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $cate->id }}" id="">
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
        $(document).ready(function() {
            $('#btn-add-product-list').on('click', function() {
                $('#product_list').append(
                    `
                    <div class="col-6">
                        <label for="">Product Name <button type="button"
                            class="btn btn-danger ml-2 my-2 btn-del-product-list">ลบ</button></label>
                        <input type="text" name="product_name[]" class="form-control" id="">
                    </div>
                `)
            })

            $(document).on('click', '.btn-del-product-list', function() {
                $(this).parent().parent().remove();
            })
        });

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
