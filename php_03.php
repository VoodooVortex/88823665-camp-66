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

    <form class="my-3" action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="container card" style="width: 18rem;">
            <div class="row card-body text-center">
                <div class="my-2 card-title">
                    สูตรคูณ แม่ อะไรดีน้าา
                </div>
                <div class="mb-2">
                    <input type="number" name="multi" placeholder="กรุณากรอกตัวเลข" class="form-control text-center">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">คำนวณ</button>
                </div>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $multi = $_POST['multi'];
        if (empty($multi)) {
            echo "<div class='text-center text-danger font-weight-bold'> <b>**กรุณากรอกข้อมูลด้วยครับ**</b> </div>";
        } else {
            echo "<div class='text-center fw-bold mb-2 text-decoration-underline'> สูตรคูณแม่ {$multi} </div>";
            for ($i = 1; $i < 13; $i++) {
                echo "<div class='text-center'> {$multi} x {$i} = " . ($i * $multi) . "</div>";
            }
        }
    }
    ?>
</body>

</html>