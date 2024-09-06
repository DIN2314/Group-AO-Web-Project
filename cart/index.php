<?php
            include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/cart/cart-ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
            sessionupd();
            timeout();
            if($_SESSION["U_UTYP"]!=9)
            {
                u_validate(0);
            }
            else
            {
                route("/user/login-ad.php");
            }
?>
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="cart">
        <h1>Cart</h1>
        <ul class="listCart"><li>


<?php
    bootstarp_css("Checkout");
?>
<?php
    if(isset($_GET['dit']))
    {
        if(rem_cart($_GET['dit']))
        {
            echo "<script>Alert('Remove Done!');</script>";
        }
        else
        {
            echo "<script>Alert('Remove Failed!');</script>";
        }
    }
    $maxp = view_cat_lst(true);
    if($maxp!=null)
    {
    $disc = ($maxp['0']/100)*25;
    $dilf = (($maxp['1']-1)*100)+350;
    CSumm(($maxp['0']-$disc)+$dilf,$disc,$dilf);
    }
    else
    {
        echo "<script>parent.document.getElementById('id_qty').textContent ='0'</script>";
        echo "<h2>The Cart is Empty</h2>";
    }
    
?>
<?php
    bootstarp_js();
?>
<script src="main.js"></script>