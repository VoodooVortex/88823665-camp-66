<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</head>

<body>
    <form action="{{ url('/mycontroller') }}" method="POST">
        @csrf
        <div class="container card mt-3" style="width: 18rem;">
            <div class="row card-body text-center">
                <div class="my-2 card-title">
                    สูตรคูณ แม่ อะไรดีน้าา
                </div>
                <div class="mb-2">
                    <input type="number" name="numbers" placeholder="กรุณากรอกตัวเลข" class="form-control text-center">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">คำนวณ</button>
                </div>
            </div>
        </div>
    </form>

    @isset($multiplier)
        <div class="container card mt-3" style="width: 18rem;">
            <div class="row card-body text-center pt-0">
                <div class="my-2 card-title m-0">
                    สูตรคูณแม่ <b><u>{{ $multiplier }}</u></b>
                </div>
                <div class="container card" style="width: 18rem;">
                    <div class="row card-body text-center">
                        <div class="my-2 card-title">
                            @for ($i = 1; $i <= 12; $i++)
                                <div class="text-center mb-2">{{ $multiplier }} x {{ $i }} =
                                    {{ $multiplier * $i }}
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        @endisset
</body>

</html>
