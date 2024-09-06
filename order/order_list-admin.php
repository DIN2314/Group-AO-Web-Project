<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
        // include ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
        include_once ($_SERVER["DOCUMENT_ROOT"]. "/order/order-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        sessionupd();
        timeout();
        u_validate(1);
?>
 
 <?php
    bootstarp_css("Orders Admin");
  ?>
<link rel="stylesheet" href="style.css">

<body>

<h1 class="text-center">Orders</h1>
<form method ="Post">
    <p>User ID: 
      <span><input type="text" name="txtUID" id="id_txtUID"></span>
      &nbsp
      Order ID: <span><input type="text" name="txtOID" id="id_txtOID"></span>
      &nbsp
      From: <span><input type="Date" name="dteFROM" id="id_dteFROM"></span>
      &nbsp
      TO: <span><input type="Date" name="dteTO" id="id_dteTO"></span>
      &nbsp
      Status: <span><select name="lstST" id="id_lstST"><option value="">[Select]</option><option value="0">Placed</option><option value="1">Processing</option><option value="2">In Dilivery</option><option value="3">Completed</option></select></span>
      &nbsp
      Payment Type: <select name="lstPTYP" id="id_lstPTYP"><option value="">[Select]</option><option value="1">PAID</option><option value="2">COD</option></select>
    </p>
    <button type="submit" name="butFND" id="id_butFND">Find</button>
  </form>

<?php 
  ?>
  <br>
  <table class="table table-striped table-hover">

  <tbody>
      <?php

          view_ord_lst_admin($_GET['oid'],$_GET['uid'],$_GET['frm'],$_GET['to'],$_GET['st'],$_GET['ptyp']);
          
          if(isset($_POST['butFND']))
          {

            route('/order/order_list-admin.php?'.'oid='.$_POST['txtOID'].'&'.'uid='.$_POST['txtUID'].'&'.'frm='.$_POST['dteFROM'].'&'.'to='.$_POST['dteTO'].'&'.'st='.$_POST['lstST'].'&'.'ptyp='.$_POST['lstPTYP']);
          }
      ?>
</tbody>
</table>
<?php
    bootstarp_js();
?>
</body>
</html>
