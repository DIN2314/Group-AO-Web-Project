<?php

        include_once($_SERVER["DOCUMENT_ROOT"]."/items/items-ops.php");
        sessionupd();
        timeout();
        u_validate(1);
?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="POST">
    <p name="lblMSG" id="id_lblMSG"></p>

    <p>Item Name: <input type="text" name="txtITNME" id="id_txtITNME"></p>

    <p>Description: <input type="text" name="txtITDEC" id="id_txtITDEC"></p>

    <p>Qty: <input type="text" name="txtITQTY" id="id_txtITQTY"></p>

    <p>Price: <input type="text" name="txtITPRICE" id="id_txtITPRICE"></p>

    <div id="id_divMANUFACT">
        <h2>Manufacture</h2>
        <p>Name: <input type="text" name="txtMNUNME" id="id_txtMNUNME"></p>
        <p>Address: <input type="text" name="txtMNUADD" id="id_txtMNUADD"></p>
        <p>E-mail: <input type="text" name="txtMNUEMAIL" id="id_txtMNUEMAIL"></p>
        <p>Telephone Number: <input type="text" name="txtMNUTP" id="id_txtMNUTP"></p>
    </div> 

    <div id="id_divSPEC">
        <h2>Specifications</h2>
        <p>Category: <select name="txtSPCAT" id="id_txtSPCAT"></select>&nbsp<input type="button" name="butCADD" id="id_butCADD" value="Add New"></p>
        <div id="id_pneCAT" style="display:none;"><p>New Category: <input type="text" name="txtNSPCAT" id="id_txtNSPCAT"></p></div>
        <p>Brand: <select name="txtSPBND" id="id_txtSPBND"></select>&nbsp<input type="button" name="butBADD" id="id_butBADD" value="Add New"></p>
        <div id="id_pneBND" style="display:none;"><p>New Brand: <input type="text" name="txtNSPBND" id="id_txtNSPBND"></p></div>
        <p>Country: <input type="text" name="txtSPCNT" id="id_txtSPCNT"></p>
        <p>Age: <input type="text" name="txtSPAG" id="id_txtSPAG"></p>
        <p>Weight: <input type="text" name="txtSPWIGHT" id="id_txtSPWIGHT"></p>
        <p>Depth: <input type="text" name="txtSPDEP" id="id_txtSPDEP"></p>
        <p>Width: <input type="text" name="txtSPWIDTH" id="id_txtSPWIDTH"></p>
        <p>Height: <input type="text" name="txtSPHEIGHT" id="id_txtSPHEIGHT"></p>        
    </div>

    <button type="submit" name="butADD" id="id_butADD">Create</button>
</form>
<script src="Script.js"></script>
</body>
</html>
<?php
    load_cat_band();

   if(isset($_POST['butADD']))
   {
    //Basic Item Data
    $It_name = $_POST['txtITNME'];
    $it_des = $_POST['txtITDEC'];
    $it_qty = $_POST['txtITQTY'];
    $It_price = $_POST['txtITPRICE'];

    //Item Manufactures Data
    $manu_name = $_POST['txtMNUNME'];
    $manu_add = $_POST['txtMNUADD'];
    $manu_email = $_POST['txtMNUEMAIL'];
    $manu_tp = $_POST['txtMNUTP'];

    //Item Specification Data
    $spc_Ncategory = $_POST['txtNSPCAT'];
    $spc_Nbrand = $_POST['txtNSPBND'];
    if(!$spc_Nbrand=="")
    {
        create_brand($spc_Nbrand);
        $spc_brand=$spc_Nbrand;
    }else
    {
        $spc_brand = $_POST['txtSPBND'];
    }
    
    if(!$spc_Ncategory=="")
    {
        create_cat($spc_Ncategory);
        $spc_category=$spc_Ncategory;
    }else
    {
        $spc_category = $_POST['txtSPCAT'];
    }



    $spc_country = $_POST['txtSPCNT'];
    $spc_reqag = $_POST['txtSPAG'];
    $spc_weight = $_POST['txtSPWIGHT'];
    $spc_depth = $_POST['txtSPDEP'];
    $spc_width = $_POST['txtSPWIDTH'];
    $spc_height = $_POST['txtSPHEIGHT'];

       if ($it_id = create_item($It_name, $it_des, $it_qty, $It_price, $manu_name, $manu_add, $manu_email, $manu_tp, $spc_brand, $spc_category, $spc_country, $spc_reqag, $spc_weight, $spc_depth, $spc_width, $spc_height))
         {
                   echo "<script>alert('".$it_id." Add Done!');</script>";
                   route("/items/item_pics_upload.php?I=".$it_id);
        }            
        else
        {
                   echo "<script>alert('Add Failed!');</script>";
       }
   }
?>


