<?php
            include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
            include_once ($_SERVER["DOCUMENT_ROOT"]. "/curinfo/invoice-ops.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
            include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
            sessionupd();
            timeout();

?>

<?php
    bootstarp_css("Checkout");
?>

<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="invoice.css">

<div class="container invoice">
  <div class="invoice-header">
    <div class="row">
      <div class="col-xs-8">
        <h1>Invoice</h1>
        <h4 class="text-muted" name="lblPTYP" id="id_lblPTYP">
        <?php
                $paytyp = read_s_data('orders','ord_ptyp','ord_id',$_GET['oid']);
                echo paytyp($paytyp);
        ?>
        </h4>
        <h4 class="text-muted">NO: <span class="me-3" name="lblORDID1" id="id_lblORDID1">[ORDER ID]</span> | Date: <span class="me-3" name="lblORDTD" id="id_lblORDTD">[order Date]</span> </h4>
        <h4 class="text-muted">Tracking: <span name="lblORDTN" id="id_lblORDTN">[Traking No]</span></h4>
      </div>
      <div style="display:inline-block; margin-left:14%;"></div>
      <div class="col-xs-4">
        <div class="media">
          <div class="media-left">
            <img class="media-object logo" src="https://dummyimage.com/70x70/000/fff&amp;text=TM">
          </div>
          <ul class="media-body list-unstyled">
            <li><strong>Toy Mart Cooperation(Pvt.)Ltd</strong></li>
            <li>Online Marketplace</li>
            <li>NO.19, Alen Worker st, Colombo 13</li>
            <li>info@toymart.com</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="invoice-body">
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Customer Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
              <?php
                  inv_add();
              ?>
              <dt>&nbsp;</dt>
              <dd>&nbsp;</dd>
          </dl></div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Products</h3>
      </div>
      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th>Item / Details</th>
            <th class="text-center colfix">Qty</th>
            <th class="text-center colfix">Total</th>
          </tr>
        </thead>
        <tbody>
        <?php
              $maxp = inv_it_lst($_GET['oid']);
        ?>
        </tbody>
      </table>
    </div>
    <div class="panel panel-default">
        <?php
                    if($maxp!=null)
                    {
                    $disc = ($maxp['0']/100)*25;
                    $dilf = (($maxp['1']-1)*100)+350;
                    invSumm(($maxp['0']-$disc)+$dilf,$disc,$dilf);
                    }
                    else
                    {
                        echo "<script>parent.document.getElementById('id_qty').textContent ='0'</script>";
                        echo "<h2>Error</h2>";
                    }
                ?>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <i>Comments / Notes</i>
            <hr style="margin:3px 0 5px">
          </div>
        </div>
      </div>
      <div class="col-xs-5">
        
      </div>
    </div>

  </div>
  <div class="invoice-footer">
    Thank you for choosing our services.
    <br> We hope to see you again soon
    <br>
    <strong>~Group AO~</strong>
  </div>
</div>

<?php
  usr_info_bsc_view($_SESSION["U_UNME"]);
  usr_info_shadd_view($_SESSION["U_UNME"]);
  usr_info_paym_view($_SESSION["U_UNME"]);
  ord_info_bsc_view($_GET['oid']);
?>

<?php
    bootstarp_js();
    echo "<script>window.print();</script>";
?>