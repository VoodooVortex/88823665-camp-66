<!DOCTYPE html>
<htmlo lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>

    <body>
        <table class="table table-bordered">
            <tr>
                <th colspan="13">
                    <div class="text-center">สูตรคูณแม่ 2</div>
                </th>
            </tr>
            <?php
            for ($i = 1; $i < 13; $i++) {
                echo "<tr class='text-center'>";
                echo "<td> 2 x {$i} = " . ($i * 2) . " </td>";
                echo "</tr>";
            }
            ?>
            </tr>
        </table>
    </body>
</htmlo