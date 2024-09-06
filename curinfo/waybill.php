<?php
        include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include_once ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
        include_once ($_SERVER["DOCUMENT_ROOT"]. "/curinfo/waybill-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        sessionupd();
        timeout();
        u_validate(1);
?>

<?php
    bootstarp_css("Checkout");
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="waybill.css">

      <?php
                $paytyp = read_s_data('orders','ord_ptyp','ord_id',$_GET['oid']);
                echo  paytyp($paytyp);
      ?>
<table class="header-table">
<tbody>
    </tbody><thead>
    <tr><th colspan="2">Pickup Details</th>
  </tr></thead>
  <tbody>
    <tr>
        <td>Name:</td> <td>Toymart Cooporation (Pvt.) Ltd</td>
    </tr>
    <tr>
        <td>Address:</td> <td>NO.19, Alen Worker st., Colombo 13</td>
    </tr>
    <tr>
        <td>Number:</td> <td>0762228827</td>
    </tr>
    <tr>
        <td>Email:</td> <td>toymart@toymart.com</td>
    </tr>
  </tbody>
</table>
      <?php
          wayb_add();
      ?>
<table class="header">
  <tbody><tr>
    <td>
      <b>Issued On</b>
      <p style="font-weight:normal">
      <?php
                echo read_s_data('orders','ord_dnt','ord_id',$_GET['oid']);
      ?>
      </p>
    </td>
  </tr>


  <tr>
  <?php
              $maxp = wayb_it_lst($_GET['oid']);
  ?>
    <td>
      <b>Weight</b>
      <p style="font-weight:normal">
        <?php
          echo $maxp['1'] . " kg";
        ?>
      </p>
    </td>
  <td>
          <b>Price:</b></br>

      <p style="font-weight:normal">
        <?php
                   if($maxp!=null)
                   {
                   $disc = ($maxp['0']/100)*25;
                   $dilf = (($maxp['1']-1)*100)+350;
                   echo "Rs. ". ($maxp['0']-$disc)+$dilf;
                   }
                   else
                   {
                       echo "<script>parent.document.getElementById('id_qty').textContent ='0'</script>";
                       echo "<h2>Error</h2>";
                   }
          
        ?>
      </p>
    </td></tr>
  
  <tr>
    <td >
      <b>Waybill:</b><br>
      <img width='200px' height ='100' src='' name='imgORDTN' id='id_imgORDTN'>
      <p style='font-size: 13px'>
        <b><span name="lblORDTN" id="id_lblORDTN">[Traking No]</span></b>
      </p>
    </td>
    <td></td>
  <td>
      <b>Order:</b><br>
      <img width='200px' height ='100' src='' name='imgORDID1' id='id_imgORDID1'>
      <p style='font-size: 13px'>
        <b><span class="me-3" name="lblORDID1" id="id_lblORDID1">[ORDER ID]</span></b>
      </p>
    </td></tr>
  <tr row-span="7">
    <td>
      <b>Customer Verification</b><br>
      <img width='100px' height='100px' src='' name='imgCUSVRFY' id='id_imgCUSVRFY'>
      <p style='font-size: 13px'>
      </p>
    </td>
</tbody></table>
<grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></body></html>

<?php
  ord_info_bsc_view($_GET['oid']);
  set_nav_evntf('id_imgORDID1','src','"https://barcode.tec-it.com/barcode.ashx?data='.$_GET["oid"].'&dmsize=Default"');
  $tracking = read_s_data('orders','ord_tn','ord_id',$_GET['oid']);
  set_nav_evntf('id_imgORDTN','src','"https://barcode.tec-it.com/barcode.ashx?data='.$tracking.'&dmsize=Default"');
  $Clink = "http://".$_SERVER['HTTP_HOST']."/Login/index.php?oid=".$_GET['oid'];
  set_nav_evntf('id_imgCUSVRFY','src','"https://qrcode.tec-it.com/API/QRCode?data='.$Clink.'&amp;backcolor=%23ffffff&amp;"');
?>

<?php
    bootstarp_js();
    echo "<script>window.print();</script>";
?>