<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/checkout/checkout-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/cart/cart-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
        // include($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
        sessionupd();
        timeout();
        u_validate(0);
?>

<?php
    bootstarp_css("Cart");
?>

<h1>Checkout</h1>


<?php
    $maxp = view_cat_lst(false);
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

<h3>Reciption Details</h3>

<?php
    add();
?>

<h3>Pay Using</h3>

<form method="post">
    <p><span><input type="radio" name="paytyp" id="id_paytyp" value="1"> Card</span>&nbsp<span><input type="radio" name="paytyp" id="id_paytyp" value="2"> COD</span></p>
    <input type="submit" name="butPORD" id="id_butPORD" value="Pay & Place Oder">
</form>

<?php
    bootstarp_js();
?>

<?php
        usr_info_bsc_view($_GET['id']);
        usr_info_shadd_view($_GET['id']);
        usr_info_paym_view($_GET['id']);
        set_doc_contentex('id_butCHKOUT','style.display','none');
        if(isset($_POST['butPORD']))
        {
            plc_ORD($_SESSION['U_UNME'],$_POST['paytyp']);
        }
?>