<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php
        function CItem($productname,$productimage,$price,$qty,$cid,$rem) {
            if($rem)
            {
            $element = "<li>
            <div><img src='{$productimage}' alt='{$productname}'></div>
            <div>{$productname}</div>
            <div>Pice Price: Rs.{$price}</div>
            <div>
                <div class='count' name='lblQTY' id='id_lblQTY' disabled='disabled'>Quentity : {$qty}</div>
                <div name='lblIprice' id='id_lblIprice' disabled='disabled'>Item Price :".$qty*$price."</div>
                <div class='btn btn-danger' name='butREM".$cid."' id='id_butREM".$cid."'>Remove</div>

            </div></li>
            ";}
            else
            {
                $element = "<li>
                <div><img src='{$productimage}' alt='{$productname}'></div>
                <div>{$productname}</div>
                <div>Pice Price: Rs.{$price}</div>
                <div>
                    <div class='count' name='lblQTY' id='id_lblQTY' disabled='disabled'>Quentity : {$qty}</div>
                    <div name='lblIprice' id='id_lblIprice' disabled='disabled'>Item Price :".$qty*$price."</div>
                </div></li>
                ";
            }


            echo $element;
            set_nav_actp('id_butREM'.$cid,'/cart/index.php?dit='.$cid);
        }

        function CSumm($maxp,$disc,$dilf) 
        {
            $row = get_tdclmc('cart','cit_id','users_user_name',$_SESSION["U_UNME"]);
            if($row!=0)
            {
                $rs = count($row);
            }
            else
            {
                $rs = 0;
            }
            $element = "
                    <!-- Payment section -->
            <div class='payment'>
                <h2>Summary</h2>
                <form id='paymentForm'>
                    <label for='cardNumber'>Entities</label>
                    <input type='text' id='cardNumber' required='' value='{$rs}'>
                    
                    <label for='cardName'>Discount</label>
                    <input type='text' id='cardName' required='' value='Rs.{$disc}'>
                    
                    <label for='cardName'>Dilivery Fee</label>
                    <input type='text' id='Dilivery Fee' required='' value='Rs.{$dilf}'>

                    <label for='expiry'>TOTAL PRICE</label>
                    <input type='text' id='expiry' placeholder='MM/YYYY' required='' value='Rs.{$maxp}'>
                    
                    <button type='button' name='butCHKOUT' id='id_butCHKOUT'>Checkout</button>
                </form>
            </div>
        </div>
            ";
           
            echo $element;
            set_nav_actpp('id_butCHKOUT','/checkout/?id='.$_SESSION["U_UNME"]);
            }  
?>