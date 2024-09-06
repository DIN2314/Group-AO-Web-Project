<?php
            include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/order/order-ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
            sessionupd();
            timeout();
            u_validate(1);
?>
<link rel="stylesheet" href="orderinfo.css">

<?php
    bootstarp_css("Checkout");
?>



<div class="container-fluid">

<div class="container">
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order # <span name="lblORDID" id="id_lblORDID">[ORDER ID]</span></h2>
  </div>

  <!-- Main content -->
  <div class="row">
    <div class="col-lg-12">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <span class="me-3" name="lblORDTD" id="id_lblORDTD">[order Date]]</span>
              #<span class="me-3" name="lblORDID1" id="id_lblORDID1">[ORDER ID]</span>
              <?php
                $ordUSR = read_s_data('orders','users_user_name','ord_id',$_GET['oid']);
                $paytyp = read_s_data('orders','ord_ptyp','ord_id',$_GET['oid']);
                $ordst = read_s_data('orders','ord_st','ord_id',$_GET['oid']);
                paytyp($paytyp);
                ordst($ordst)
              ?>
            </div>
          </div>
          <table class="table table-borderless">
            <tbody>
                <?php
                    $maxp = ord_it_lst($_GET['oid']);
                ?>
            </tbody>
                <?php
                    if($maxp!=null)
                    {
                    $disc = ($maxp['0']/100)*25;
                    $dilf = (($maxp['1']-1)*100)+350;
                    OCSumm(($maxp['0']-$disc)+$dilf,$disc,$dilf);
                    }
                    else
                    {
                        echo "<script>parent.document.getElementById('id_qty').textContent ='0'</script>";
                        echo "<h2>Error</h2>";
                    }
                ?>
          </table>
        </div>
      </div>
            <?php
                ord_add($paytyp,($maxp['0']-$disc)+$dilf);
            ?>

  <?php
if(!isset($_GET['c']))
{

    switch ($ordst) 
    {
        case '0':
            order_log($_GET['oid'],'1','');
            break;
        case '1':
            tno_set_ad($ordst);
            break;
        case '2':
        tno_set_ad($ordst);
            $ordtn = read_s_data('orders','ord_tn','ord_id',$_GET['oid']);
            dilinfo($ordst);
            curinfo($ordtn,$ordst);
            break;
        case '3':
            echo "<div class='alert alert-success'><strong>Order Completed!</strong></div>";
            break;
        case '8':
            echo "<div class='alert alert-danger'><strong>Order Canceled !</strong></div>";
            break;
        default:
            echo "Error";
            break;
    }

}else{
  if(v_ext('orders','ord_id',$_GET['c']))
  {
    complete_ord_intf_ad($ordst);
  }
  else
  {
    echo "<script>alert('Order Not Exist')</script>";
    logout();
  }
}

    ?>

<div class="container">
    <article class="card">
        <header class="card-header"> Order Status</header>
        <div class="card-body">
            <article class="card">
              <div class="track">
                    <?php
                        $ordst = read_s_data('orders','ord_st','ord_id',$_GET['oid']);
                        echo ord_info_st($ordst);
                    ?>
              </div>
            </article>
        </br>
            <article class="card">
              <table>
                <tbody>
                    <?php
                        ord_log($_GET['oid']);
                    ?>
                </tbody>
              </table>
            </article>
        </div>
    </article>
</div>
</div>


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
ord_info_bsc_view($_GET['oid']);
usr_info_bsc_view($ordUSR);
usr_info_shadd_view($ordUSR);
usr_info_paym_view($ordUSR);

echo "<form method='post'>";
$ordst = read_s_data('orders','ord_st','ord_id',$_GET['oid']);
    ord_act_admin($ordst);
echo "</form>";

if(isset($_POST['butSTOCU']))
{ 
  
  if(ord_update_stock($_GET['oid']))
  {
      order_log($_GET['oid'],'2',"Tracking No: ".$_POST['txtTNO']."");
      waybill_upoad($_GET['oid'],$_POST['txtTNO']);
      

      echo "<script>window.open('/curinfo/waybill.php?oid=".$_GET['oid']."','/curinfo/waybill.php?oid=".$_GET['oid']."');</script>";
      route("/order/orderinfo_admin.php?oid=".$_GET['oid']);
  }
}

if(isset($_POST['butWBM']))
{ 
      $oldTN = read_s_data('orders','ord_tn','ord_id',$_GET['oid']);
      waybill_upoad($_GET['oid'],$_POST['txtTNO']);
      order_log($_GET["oid"],"2","Currior Response: Tracking Number Changed. (".$oldTN." To ".$_POST["txtTNO"].")");
      echo "<script>window.open('/curinfo/waybill.php?oid=".$_GET['oid']."','/curinfo/waybill.php?oid=".$_GET['oid']."');</script>";
      route("/order/orderinfo_admin.php?oid=".$_GET['oid']);
}

if(isset($_POST['butWB']))
{ 
      echo "<script>window.open('/curinfo/waybill.php?oid=".$_GET['oid']."','/curinfo/waybill.php?oid=".$_GET['oid']."');</script>";
}

if(isset($_POST['butINV']))
{
  echo "<script>window.open('/curinfo/invoice.php?oid=".$_GET['oid']."','/curinfo/waybill.php?oid=".$_GET['oid']."');</script>";
}

if(isset($_POST['butOTPVERY']))
{
  complete_ord($_GET['c'],$_POST['txtOTP']);
}

if(isset($_POST['butCNCL']))
{
    if(cancel_ord($_GET['oid'],$_POST['txtRES']))
    {
        msg("/order/order_list-admin.php","Order Cancled", "", 1);
    }
    else
    {
        msg("/order/order_list-admin.php","Failed to cancel order !", "", 0);
    }
}
?>

<?php
    bootstarp_js();
?>
</body>