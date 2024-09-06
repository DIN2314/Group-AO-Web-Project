<?php
        include_once($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        if(v_ext("users","user_name","SUPER_USER"))
        {
            
            sessionupd();
            timeout();   
            u_validate_sec(2);
        }

        
?>
 <link href='css/responsive.css' rel='stylesheet'>
<?php
    bootstarp_css("Admin Dashboard"); 
?>
<style>
    
    body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 450px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #34495e;
            font-size: 26px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2980b9;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #3498db;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #9b59b6;
            box-shadow: 0 0 8px rgba(155, 89, 182, 0.5);
        }

        button {
            background: linear-gradient(135deg, #e67e22, #d35400);
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            width: 100%;
        }

        button:hover {
            background: linear-gradient(135deg, #d35400, #e67e22);
            transform: scale(1.05);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group-inline {
            display: flex;
            justify-content: space-between;
            gap: 15px;
        }

        .form-group-inline .form-group {
            flex: 1;
        }

        .error-msg {
            color: #e74c3c;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: center;
        }

        /* Additional styling for a more dynamic look */
        form {
            animation: fadeIn 1.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
</style>
<form method="post">
    <p name="lblMSG" id="id_lblMSG"></p>
    <p>User Name: <input type="text" name="txtUNME" id="id_txtUNME"></p>

    <p>First Name: <input type="text" name="txtFNME" id="id_txtFNME"> Middle Name: <input type="text" name="txtMNME" id="id_txtMNME"></p>

    <p>Last Name: <input type="text" name="txtLNME" id="id_txtLNME"></p><br>



    <p>Gender: <select name="lstGNDR" id="id_lstGNDR"><option>Male</option><option>Female</option></select></p>

    <p>Date of Birth: <input type="date" name="datDOB" id="id_datDOB"></p>



    <p>E Mail: <input type="text" name="txtEMAIL" id="id_txtEMAIL"></p>

    <p>Password: <input type="Password" name="txtPWD" id="id_txtPWD"></p>

    <p>Confirm - Password: <input type="Password" name="txtCPWD" id="id_txtCPWD"></p><br>

    <button type="submit" name="butREG" id="id_butREG">Create</button>



</form>

<?php
    bootstarp_js(); 
?>
</body>

<?php
    if(!v_ext("users","user_name","SUPER_USER"))
    {
        set_doc_contentex('id_txtUNME','disabled','true');
        set_doc_value("id_txtUNME","SUPER_USER");  
        
    }

    if(array_diff_key($_POST,["butREG"]))
    {   if(!v_ext("users","user_name","SUPER_USER"))
        {
            $U_nme = "SUPER_USER";
            $U_typ = 2;
        }
        else
        {
            $U_nme = $_POST["txtUNME"];
            $U_typ = 1;
        }
        
        $U_Fnme = $_POST["txtFNME"];
        $U_Mnme = $_POST["txtMNME"];
        $U_Lnme = $_POST["txtLNME"];
        $U_GEN = $_POST["lstGNDR"];
        $U_DOB = $_POST["datDOB"];
        $U_Email = $_POST["txtEMAIL"];
        $U_Pwd = $_POST["txtPWD"];
        $U_Pwd2 = $_POST["txtCPWD"];

        if($U_Pwd!=$U_Pwd2)
        {
            $msg = "Passwords not match !";
            echo "<script>alert('$msg');</script>";
        }
        else
        {        
          if (reg_user($U_nme, $U_Fnme, $U_Mnme, $U_Lnme, $U_GEN, $U_DOB, $U_Email, $U_Pwd, $U_typ))
          {
              if($U_nme=='SUPER_USER')
              {
                  msg("/Login","Account Created","Now Try To Login With SUPER_USER",true);
              }else
              {
                    msg("/admin/create-admin.php","Account Created","",true);
              }
          }
          else
          {
            msg("/admin/create-admin.php","Failed to Account Created","",true);
          }
      }
    }

?>


