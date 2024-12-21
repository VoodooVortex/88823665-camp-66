<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>

<body>
    <div class='text-center fw-bold my-3'>
        <h3>1-100 เลขไหนเป็นเลขคู่ เลขคี่ </h3>
    </div>

    <?php
    echo "<table class='table table-bordered'>";
    for ($i = 1; $i <= 100; $i++) {
        echo ($i % 2 == 0) ? "<tr><td><div class='text-center'> {$i} = Even number </div></td></tr>" : "<tr><td><div class='text-center'> {$i} = Odd number </div></td></tr>";
    }
    echo "</table>";
    ?>
</body>

</html>