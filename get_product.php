
<?php include "db.php"?>
<?php
$pro_code = $_POST['procode'];
$stmt= $conn->prepare("select id,productcode,productname,price from products where productcode = ?");
$stmt->bind_param("s", $pro_code);
$stmt->bind_result($id,$productcode,$productname,$price);

if($stmt->execute()){
    while($stmt->fetch())
    {
        $output[] = array("id"=>$id,"productcode"=> $productcode,"productname"=> $productname,"price"=> $price);
    }
    echo json_encode($output);

    

}

?>