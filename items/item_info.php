<?php
        // include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        // include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/items/items-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        sessionupd();
        timeout();
        u_validate(1);
?>

<?php 
bootstarp_css("Item Info");
?>

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
        <p>Brand: <input type="text" name="txtSPBND" id="id_txtSPBND"></p>
        <p>Category: <input type="text" name="txtSPCAT" id="id_txtSPCAT"></p>
        <p>Country: <input type="text" name="txtSPCNT" id="id_txtSPCNT"></p>
        <p>Age: <input type="text" name="txtSPAG" id="id_txtSPAG"></p>
        <p>Weight: <input type="text" name="txtSPWIGHT" id="id_txtSPWIGHT"></p>
        <p>Depth: <input type="text" name="txtSPDEP" id="id_txtSPDEP"></p>
        <p>Width: <input type="text" name="txtSPWIDTH" id="id_txtSPWIDTH"></p>
        <p>Height: <input type="text" name="txtSPHEIGHT" id="id_txtSPHEIGHT"></p>        
    </div>
</form>

<?php 
bootstarp_js();
?>
</body>

<?php
        if(isset($_GET["delid"]))
        {
            if(del_item($_GET["delid"]))
            {
                //DO NOTHING
            }
            else
            {
                //DO NOTHING
            }
        }
        else
        {
            $it_id= $_GET["it"];
            item_info($it_id);
        }

?>


