<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/database/datcmd.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/General/user_info_edit-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        sessionupd();
        timeout();
?>

<?php 
    bootstarp_css("Admin List");  
?>
<body>
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

    <div id="id_divUSERREGINFO">
        <h2>Shipping Address</h2>
        <p>Address: <input type="text" name="txtUADD" id="id_txtUADD"></p>
        <p>Province: <select type="submit" name="lstPROV" id="id_lstPROV"></select></p>
        <p>District: <select name="lstDIST" id="id_lstDIST"></select></p>
        <p><span>City: <select name="txtUCITY" id="id_txtUCITY"></select></span><span>Postal Code: <select name="txtUPCDE" id="id_txtUPCDE"></select></span></p>
        <p>Number: <input type="text" name="txtUNUM" id="id_txtUNUM"></p>
    </div> 

    <div id="id_divUPAYINFO">
        <h2>Payment Method</h2>
        <p>Card-Holder Name: <input type="text" name="txtPNME" id="id_txtPNME"></p>
        <p>Card Number: <input type="text" name="txtPNUM" id="id_txtPNUM"></p>
        <p>Expires: <input type="text" name="txtPEXP" id="id_txtPEXP"></p>
        <p>CVV: <input type="text" name="txtPCVV" id="id_txtPCVV"></p>
    </div>

    <iframe src="" frameborder="none" name="upPiC" id="id_upPiC"></iframe>
    <button type="submit" name="butUPD" id="id_butUPD">Ok</button>
    <button type="submit" name="butRSTPWD" id="id_butRSTPWD">Reset Password</button>

</form>
<?php 
  bootstarp_js();
?>
</body>

<?php
    
    if(isset($_GET["delid"]))
    {
        if(del_user($_GET["delid"]))
        {
            //
        }
        else
        {
            //
        }
    }

    $u_id = $_GET['id'];
    updintf("id_upPiC",$u_id,'1','1');
    usr_info_bsc($u_id);
    usr_info_shadd($u_id);
    usr_info_paym($u_id);
    load_add();

    if(isset($_POST['butUPD']))
    {
        // basic details
        $U_Fnme = $_POST["txtFNME"];
        $U_Mnme = $_POST["txtMNME"];
        $U_Lnme = $_POST["txtLNME"];
        $U_GEN = $_POST["lstGNDR"];
        $U_DOB = $_POST["datDOB"];
        $U_Email = $_POST["txtEMAIL"];

        // Shipping Address
        $shadd_prov = $_POST["lstPROV"];
        $shadd_dist = $_POST["lstDIST"];
        $shadd_city = $_POST["txtUCITY"];
        $shadd_add = $_POST["txtUADD"];
        $shadd_postc = $_POST["txtUPCDE"];
        $shadd_num = $_POST["txtUNUM"];

        // Shipping Address
        $pay_nme = $_POST["txtPNME"];
        $pay_cno = $_POST["txtPNUM"];
        $pay_expy = $_POST["txtPEXP"];
        $pay_cvv = $_POST["txtPCVV"];

        if (edt_user_BSEINFO($U_Fnme, $U_Mnme, $U_Lnme, $U_GEN, $U_DOB, $U_Email, $u_id))
          {
            if (edt_user_SHADD($shadd_prov, $shadd_dist, $shadd_city, $shadd_add, $shadd_postc, $shadd_num,$u_id))
            {
                if (edt_user_PAYM($pay_nme, $pay_cno, $pay_expy, $pay_cvv, $u_id))
                {
                    echo "<script>alert('Modify Done!');</script>";
                }            
                else
                {
                    echo "<script>alert('Modify Failed!1');</script>";
                }
            }
            else
            {
                echo "<script>alert('Modify Failed!2');</script>";
            }
          }
          else
          {
            echo "<script>alert('Modify Failed!3');</script>";
          }
    }

    if(isset($_POST['butRSTPWD']))
    {
        if(rst_pwd($_GET['id']))
        {
            echo "<script>alert('reset Done!')</script>";
        }else
        {
            echo "<script>alert('reset Failed!')</script>";
        }
    }

    if(read_s_data('users','user_typ','user_name',$_GET['id']) != 0)
    {
        //User Shipping Info
        set_doc_contentex('id_divUSERREGINFO','style.display','none');
        //User Payment Info
        set_doc_contentex('id_divUPAYINFO','style.display','none');
    }
?>





