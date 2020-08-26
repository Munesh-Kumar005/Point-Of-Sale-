<?php include "db.php"; ?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>print!</title>
</head>

<body>
    <div class="container">
        <div class="col-xs-12">
            <div class="print text-center " style="border:1px solid black; width:88mm; background-color:white; padding:10px;
    margin:0 auto;">

                <div class="text-center ">
                    <h2>
                        Zeeshan Cloth Store
                    </h2>
                </div>
                <div class="text-center ">
                    <h4>
                        Purchase invoice
                    </h4>
                </div>
                <br>

                <div class="text-left ">
                    <?php
                    $mydate = getdate(date("U"));
                    echo "<b>" . "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]" . "</b>";
                    ?>


                </div>


                <div class="text-right ">
                    number111

                </div>
                <br>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <td class="text-center"><b>ID</b></td>
                            <td class="text-center"><b>Item</b></td>
                            <td class="text-center"><b>Qty</b></td>
                            <td class="text-center"><b>Price</b></td>
                            <td class="text-center"><b>Total</b></td>

                        </tr>
                    </thead>
                    <tr>

                        <td class="text-center"><b>11</b></td>
                        <td class="text-center"><b>khaadii</b></td>
                        <td class="text-center"><b>1</b></td>
                        <td class="text-center"><b>1000</b></td>
                        <td class="text-center"><b>1000</b></td>
                    </tr>

                    <tr>

                        <td class="text-center"><b>11</b></td>
                        <td class="text-center"><b>khaadii</b></td>
                        <td class="text-center"><b>1</b></td>
                        <td class="text-center"><b>1000</b></td>
                        <td class="text-center"><b>1000</b></td>
                    </tr>

                </table>

                <div class="text-right ">

                    Total: <b>11112222</b>

                </div>

                <div class="text-right ">

                    Pay Amount: <b>11112222</b>

                </div>

                <div class="text-right ">

                    Balance: <b>11112222</b>

                </div>
            </div>

        </div>
    </div>




    <script src="components/jquery/dist/jquery.js"></script>
    <script src="components/jquery/dist/jquery.min.js"></script>
    <script src="components/jquery.validate.min.js"></script>


</body>

</html>