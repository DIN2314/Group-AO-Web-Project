<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        sessionupd();
        timeout();
        u_validate(1);
?>

<form method="POST">
    <p name="lblMSG" id="id_lblMSG"></p>

    <p>Item Id: <input type="text" name="txtITID" id="id_txtITID"></p>

    <p>Item Name: <input type="text" name="txtITNME" id="id_txtITNME"></p> </br>

    <p>Current Stock: <input type="text" name="txtITQTY" id="id_txtITQTY" disabled="Disabled"></p> <hr>

    <p>Amount: <input type="text" name="txtITAMNT" id="id_txtITAMNT"></p>

    <p>
        <span><button type="submit" name="butADD" id="id_butADD">Add to Stock</button></span>
        &nbsp
        <span><button type="submit" name="butREM" id="id_butREM">Remove From Stock</button></span>
    </p>
</form>

<?php
    $it_id= $_GET["it"];
    $it_name = read_s_data('items','It_name','it_id',$it_id);
    $it_qty = read_s_data('items','it_qty','it_id',$it_id);
    set_doc_value('id_txtITID',$it_id);
    set_doc_value('id_txtITNME',$it_name);
    set_doc_value('id_txtITQTY',$it_qty);

    

    if(isset($_POST['butADD']))
    {
        $it_amount = $_POST['txtITAMNT'];
        $it_n_qty = $it_qty + $it_amount;
        if(set_s_data('items','it_qty',$it_n_qty,'it_id',$it_id))
        {
            echo "<script>alert('Stock Changed!');</script>";
            route("/items/item_stock_edit.php?it=".$it_id);

        }else
        {
            echo "<script>alert('Stock Change Failed!');</script>";
            route("/items/item_stock_edit.php?it=".$it_id);
        }
    }

    if(isset($_POST['butREM']))
    {
        $it_amount = $_POST['txtITAMNT'];
        $it_n_qty = $it_qty - $it_amount;
        if(set_s_data('items','it_qty',$it_n_qty,'it_id',$it_id))
        {
            echo "<script>alert('Stock Changed!');</script>";
        }else
        {
            echo "<script>alert('Stock Change Failed!');</script>";
        }
    }
?>


