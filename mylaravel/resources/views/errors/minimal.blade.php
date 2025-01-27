@extends('layouts.default')
@section('title')
    <title>@yield('title')</title>
@endsection

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.5.0/css/all.min.css" rel="stylesheet">

    <style>
        .headline {
            font-size: 100px;
            font-family: 'Source Sans Pro', sans-serif;
        }

        body {
            margin: 0;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
        }

        .error-page {
            margin: 20px auto 0;
            width: 640px;
        }

        .error-content {
            display: block;
            margin-left: 200px;
        }

        .search-form {
            box-sizing: border-box;
        }

        .form-control::placeholder {
            color: rgba(0, 0, 0, 0.5);
        }
    </style>

    <section>
        <div class="error-page">
            @php $yieldContent = $__env->yieldContent('code'); @endphp
            @if ($yieldContent === '404')
                @php
                    $styleText = 'text-warning';
                    $btnStyle = 'btn-warning';
                    $content =
                        '<p>We could not find the page you were looking for. Meanwhile, you may
                        <a href="' .
                        url('/') .
                        ' ">return to dashboard</a> or try using the search form.</p>';
                @endphp
            @elseif ($yieldContent === '500')
                @php
                    $styleText = 'text-danger';
                    $btnStyle = 'btn-danger';
                    $content =
                        '<p>We will work on fixing that right away.
                        Meanwhile, you may <a href="' .
                        url('/') .
                        '">return to dashboard</a> or try using the search form.</p>';
                @endphp
            @else
                @php
                    $styleText = 'text-black';
                    $btnStyle = 'btn-primary';
                @endphp
            @endif

            <h2 class="headline fw-lighter {{ $styleText }}" style="float: left; margin-top: 8px;">
                @yield('code')
            </h2>

            <div class="error-content">
                <h3 class="fw-lighter">
                    <i class="fas fa-exclamation-triangle {{ $styleText }}"></i>
                    Oops! {{ $yieldContent === '404' ? 'Page not found.' : 'Something went wrong.' }}
                    <div style="display: none;">@yield('message')</div>
                </h3>

                {!! $content !!}

                <form class="search-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn {{ $btnStyle }}"><i
                                    class="fw-bold fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
