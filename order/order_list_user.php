<?php

            include($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
            include ($_SERVER["DOCUMENT_ROOT"]. "/items/items-ops.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/order/order-ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
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
    
<?php
    bootstarp_css("Order List");
?>
<link rel="stylesheet" href="style.css">

<table class="table table-striped table-hover">

<tbody>
<?php
    if(!view_ord_lst_usr()){
        echo "<h2>There Are No Orders Available</h2>";
    }
?>
</tbody>
</table>

<?php
    bootstarp_js();
?>
<script src="main.js"></script>