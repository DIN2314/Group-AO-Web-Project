<?php
            include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/order/order-ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
            sessionupd();
            timeout();
            u_validate(0);
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
                $paytyp = read_s_data('orders','ord_ptyp','ord_id',$_GET['oid']);
                $ordst = read_s_data('orders','ord_st','ord_id',$_GET['oid']);
                paytyp($paytyp);
                ordst($ordst)
              ?>
            </div>
            <div class="d-flex">
              <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text"></span></button>
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> </a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> </a></li>
                </ul>
              </div>
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
          if($ordst=='3'){
              echo "<div class='alert alert-success'><strong>Order Completed!</strong></div>";
            }else if($ordst=='8')
            {
                echo "<div class='alert alert-danger'><strong>Order Canceled !</strong></div>";
            }
          else
          {
            $ordst = read_s_data('orders','ord_st','ord_id',$_GET['oid']);
            $ordtn = read_s_data('orders','ord_tn','ord_id',$_GET['oid']);
            dilinfo($ordst);
            curinfo($ordtn,$ordst);
          }
        ?>
</div>
</div>

<div class="container">
    <article class="card">
        <header class="card-header"> Order Status</header>
        <div class="card-body">
            <article class="card">
              <div class="track">
                    <?php
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

<form method="post">
<?php
    ord_act_usr($ordst);
?>
</form>



<?php

if(isset($_POST['butINV']))
{
  echo "<script>window.open('/curinfo/invoice.php?oid=".$_GET['oid']."','/curinfo/waybill.php?oid=".$_GET['oid']."');</script>";
}

if(isset($_POST['butREM']))
{
    if(rem_ord($_GET['oid']))
    {
        msg_p("/user/","Order Removed.", "", 1);
    }
    else
    {
        msg_p("/user/","Failed To Remove Order", "", 0);
    }
}
usr_info_bsc_view($_SESSION["U_UNME"]);
usr_info_shadd_view($_SESSION["U_UNME"]);
usr_info_paym_view($_SESSION["U_UNME"]);
ord_info_bsc_view($_GET['oid']);
?>

<?php
    bootstarp_js();
?>