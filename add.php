<?php include './indkoeb.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Infoscreen</title>
        <style type="text/css">
            input{
                max-width: 50px;
            }
        </style>
    </head>
    <body>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Item</td><td>:</td><td><input type="text" name="p_item"></td>
                </tr>
                <tr>
                    <td>Qty</td><td>:</td><td><input type="number" name="p_qty"></td><td><input type="text" name="p_qty_type"></td>
                </tr>
                <tr>
                    <td><input name="submit" value="Add" type="submit"></td>
                </tr>
            </table>
        </form>
        <?php
        // define variables and set to empty values
        if (isset($_POST['submit'])) {
            $p_date = date("d-m-Y");
            $p_item = $_POST['p_item'];
            $p_qty = $_POST['p_qty'];
            $p_qty_type = $_POST['p_qty_type'];

            $ready = true;

            if (empty($_POST["p_item"])) {
                echo "*Item is required<br>";
                $ready = false;
            }
            if (empty($_POST["p_qty"])) {
                echo "*Qty is required<br>";
                $ready = false;
            }
            if (empty($_POST["p_qty_type"])) {
                echo "*Qty Type is required<br>";
                $ready = false;
            }
            if ($ready) {
                add($p_date, $p_item, $p_qty, $p_qty_type);
                makelist();
            } else {
                echo "Nothing happened :-(, did you remember to fill out all the fields?<br>";
            }
        }
        ?>
    </body>
</html>