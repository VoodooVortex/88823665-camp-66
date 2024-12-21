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
        <div class="container card" style="width: 30rem;">
            <div class="row card-body text-center">
                <div class="my-2 card-title">
                    เลขคู่ หรือ เลขคี่น้าา
                </div>
                <div class="mb-2 col form-floating">
                    <input type="number" name="start" id="startInput" placeholder="กรุณากรอกตัวเลข" class="form-control text-center">
                    <label for="startInput">เริ่มจากเลข</label>
                </div>
                <div class="mb-2 col form-floating">
                    <input type="number" name="end" id="endInput" placeholder="กรุณากรอกตัวเลข" class="form-control text-center">
                    <label for="endInput">ถึงเลข</label>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">คำนวณ</button>
                </div>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $start = $_POST['start'];
        $end = $_POST['end'];
        if (empty($start) || empty($end)) {
            echo "<div class='text-center text-danger font-weight-bold'> <b>**กรุณากรอกข้อมูลให้ครบด้วยครับ**</b> </div>";
        } else {
            echo "<div class='text-center fw-bold mb-2 text-decoration-underline'> {$start} ถึง {$end} </div>";
            for ($i = $start; $i <= $end; $i++) {
                if ($i % 2 == 0) {
                    echo "<div class='text-center'> {$i} = Even number </div>";
                } else {
                    echo "<div class='text-center'> {$i} = Odd number </div>";
                }
            }
        }
    }
    ?>
</body>

</html>