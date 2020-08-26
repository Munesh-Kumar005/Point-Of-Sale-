<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>pos!</title>
</head>

<body>

    <div class="text-center bg-primary">
        <h2>Zeeshan Cloth Pos System</h2>
    </div>


    <div class="container-fluid text-center">
        <div class="col-sm-8">
            <form class="form-horizontal" id="frminvoice">
                <table class="table table-bordered">
                    <caption>Add Products</caption>
                    <tr>
                        <th>Product-Code</th>
                        <th>Product-Name</th>
                        <th>Prize</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Option</th>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" class="form-control" id="procode" name="procode" placeholder="Enter Code" required>
                        </td>

                        <td>
                            <input type="text" class="form-control" id="pname" name="pname" placeholder="Enter Name" required>
                        </td>

                        <td>
                            <input type="text" class="form-control" id="price" name="price" placeholder="price" required>
                        </td>

                        <td>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder=" quantity" required>
                        </td>

                        <td>
                            <input type="text" class="form-control" id="total" name="total" placeholder=" Total" required>
                        </td>

                        <td>
                            <button type="button" class="btn btn-success" id="add" name="add" onclick=" addProduct()">Add</button>
                        </td>

                    </tr>
                </table>
            </form>

            <table class="table table-bordered" id="product_list">
                <caption>Products</caption>
                <thead>
                    <tr>
                        <th style="width: 40px ">Remove</th>
                        <th>Product-Code</th>
                        <th>Product-Name</th>
                        <th>Unit-Prize</th>
                        <th>Quantity</th>
                        <th>Amount</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>

        <div class="col-sm-4 align-right">
            <div class="form-group text-left">
                <label>Total</label>
                <input type="text" class="form-control" id="finaltotal" name="finaltotal" placeholder=" Total" required>
            </div>

            <div class="form-group text-left">
                <label>Pay Amount</label>
                <input type="text" class="form-control" id="pay" name="pay" placeholder="Pay" required>
            </div>

            <div class="form-group text-left">
                <label>Balance</label>
                <input type="text" class="form-control" id="bal" name="bal" placeholder=" Balance" required>
            </div>
            <!--

            <div class="form-group text-left">
               
                <a href="print.php" id="print" name="print" class="btn btn-primary">Print Bill</a>
            </div>
            -->

        </div>

    </div>


    <script src="components/jquery/dist/jquery.js"></script>
    <script src="components/jquery/dist/jquery.min.js"></script>
    <script src="components/jquery.validate.min.js"></script>


    <script>
        getProductCode();

        function getProductCode() {

            $("#procode").empty();
            $("#procode").keyup(function(e) {
                $.ajax({
                    type: "POST",
                    url: "get_product.php",
                    dataType: "JSON",
                    data: {
                        procode: $("#procode").val()
                    },
                    success: function(data) {
                        $("#pname").val(data[0].productname);
                        $("#price").val(data[0].price);
                        $("#qty").focus();




                    }

                });

            });



        }

    


        $(function() {
            $("#price , #qty").on("keydown keyup click", qty);

            function qty() {
                var sum = (
                    Number($("#price").val()) * Number($("#qty").val()));
                $("#total").val(sum);
                //console.log(sum);
            }
        });



        $(function() {
            $("#pay , #finaltotal").on("keydown keyup click", finaltotal);

            function finaltotal() {
                var sum = (
                    Number($("#pay").val()) - Number($("#finaltotal").val()));
                $("#bal").val(sum);
                //console.log(sum);
            }
        });







        function addProduct() {
            var products = {
                procode: $("#procode").val(),
                pname: $("#pname").val(),
                price: $("#price").val(),
                qty: $("#qty").val(),
                total: $("#total").val(),
                button: '<button type="button" class="btn btn-danger">Delete</button>'


            };

            addRow(products);
            $("#frminvoice")[0].reset();
        }


        var total = 0;

        function addRow(products) {
            var $table = $("#product_list tbody");
            var $row =
                $("<tr>" + "<td><Button type='button' name='record ' class=' btn btn-danger btn - xs ' onclick='deleterow(this)'>Delete</Button></td>" +
                    "<td>" + products.procode + "</td>" +
                    "<td>" + products.pname + "</td>" +
                    "<td>" + products.price + "</td>" +
                    "<td>" + products.qty + "</td>" +
                    "<td>" + products.total + "</td>" +
                    "</tr>");

            $row.data("procode", products.procode);
            $row.data("pname", products.pname);
            $row.data("price", products.price);
            $row.data("qty", products.qty);
            $row.data("total", products.total);

            total += Number(products.total);

            $('#finaltotal').val(total);

            $table.append($row);


            $row.find('deleterow').click(function(event) {
                deleteRow($(event.currentTarget).parent('tr'));

            });
        }

        function deleterow(e) {
            product_total_cost = parseInt($(e).parent().parent().find('td:last').text(), 10);
            total -= product_total_cost;
            $('#finaltotal').val(total);
            $(e).parent().parent().remove();



        }
    </script>


</body>

</html>