<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
        sessionupd();
        timeout();
?>

<form method="post">

    <div>    
        <p>User Name: <input type="text" name="txtUNME" id="id_txtUNME"></p>

        <p>User Type: <input type="text" name="txtUNME" id="id_txtUTYP"></p>

        <p>First Name: <input type="text" name="txtFNME" id="id_txtFNME"> Middle Name: <input type="text" name="txtMNME" id="id_txtMNME"></p>

        <p>Last Name: <input type="text" name="txtLNME" id="id_txtLNME"></p><br>

        <p>Gender: <select name="lstGNDR" id="id_lstGNDR"><option>Male</option><option>Female</option></select></p>

        <p>Date of Birth: <input type="date" name="datDOB" id="id_datDOB"></p>

        <p>E Mail: <input type="text" name="txtEMAIL" id="id_txtEMAIL"></p>

        <p>Status: <input type="text" name="txtUNME" id="id_lblst"></p>
    </div>
        
    <div id="id_divUPAYINFO">
        <h2>Shipping Address</h2>
        <p>Address: <input type="text" name="txtUADD" id="id_txtUADD"></p>
        
        <p>District: <select name="lstDIST" id="id_lstDIST">
            <option>Kandy</option>
            <option>Matale</option>
            <option>Nuwara Eliya</option>
            <option>Anuradhapura</option>
            <option>Polonnaruwa</option>
            <option>Kurunegala</option>
            <option>Puttalam</option>
            <option>Kegalle</option>
            <option>Ratnapura</option>
            <option>Galle</option>
            <option>Hambantota</option>
            <option>Matara</option>
            <option>Badulla</option>
            <option>Moneragala</option>
            <option>Colombo</option>
            <option>Gampaha</option>
            <option>Kalutara</option>
            <option>Ampara</option>
            <option>Batticaloa</option>
            <option>Trincomalee</option>
            <option>Jaffna</option>
            <option>Mannar</option>
            <option>Mullaitivu</option>
            <option>Vavuniya</option>

        </select></p>
        <p>Province: <select name="lstPROV" id="id_lstPROV">
            <option>Central Province</option>
            <option>North Central Province</option>
            <option>North Western Province</option>
            <option>Sabaragamuwa Province</option>
            <option>Southern Province</option>
            <option>Province of Uva</option>
            <option>Western Province</option>
            <option>Eastern Province</option>
            <option>Northern Province</option>
        </select></p>
        <p><span>City: <select name="txtUCITY" id="id_txtUCITY"><option>Central Province</option><option>Central Province1</option></select></span><span>Postal Code: <input type="text" name="txtUPCDE" id="id_txtUPCDE"></span></p>
        <p>Number: <input type="text" name="txtUNUM" id="id_txtUNUM"></p>
    </div> 

    <div id="id_divUSERREGINFO">
        <h2>Payment Method</h2>
        <p>Card-Holder Name: <input type="text" name="txtPNME" id="id_txtPNME"></p>
        <p>Card Number: <input type="text" name="txtPNUM" id="id_txtPNUM"></p>
        <p>Expires: <input type="text" name="txtPEXP" id="id_txtPEXP"></p>
        <p>CVV: <input type="text" name="txtPCVV" id="id_txtPCVV"></p>
    </div>


</form>

<?php

    usr_info_bsc($_GET['id']);
    usr_info_shadd($_GET['id']);
    usr_info_paym($_GET['id']);

    if(read_s_data('users','user_typ','user_name',$_GET['id']) != 0)
    {
        //User Shipping Info
        set_doc_contentex('id_divUSERREGINFO','style.display','none');
        //User Payment Info
        set_doc_contentex('id_divUPAYINFO','style.display','none');
    }

?>


