<!-- <form method="post">
    <p name="lblMSG" id="id_lblMSG"></p>
    <p>User Name: <input type="text" name="txtUNME" id="id_txtUNME"></p>

    <p>First Name: <input type="text" name="txtFNME" id="id_txtFNME"> Middle Name: <input type="text" name="txtMNME" id="id_txtMNME"></p>

    <p>Last Name: <input type="text" name="txtLNME" id="id_txtLNME"></p><br>



    <p>Gender: <select name="lstGNDR" id="id_lstGNDR"><option>Male</option><option>Female</option></select></p>

    <p>Date of Birth: <input type="date" name="datDOB" id="id_datDOB"></p>



    <p>E Mail: <input type="text" name="txtEMAIL" id="id_txtEMAIL"></p>

    <p>Password: <input type="Password" name="txtPWD" id="id_txtPWD"></p>

    <p>Confirm - Password: <input type="Password" name="txtCPWD" id="id_txtCPWD"></p><br>

    <p><input type="checkbox" name="chkACCLIC" id="id_chkACCLIC" > I Accept The License Agreement.</p><br>

    <button type="submit" name="butREG" id="id_butREG">Register</button>



</form> -->
<?php
 include ($_SERVER["DOCUMENT_ROOT"]."/register/reg-ops.php");
 include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
 include($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
 ?>


<?php 
    bootstarp_css("Login");
?>
<link href="styles.css" rel="stylesheet" type="text/css">

<body>
    <div class="background">
        <!-- If you have a background image or animation, place it here -->
    </div>
    <div class="login-container">
        <form method="post" class="container">
            <h1>Sign Up</h1>
          <p>&nbsp;</p>
<p>Please fill in this form to create an account.</p>
            <p id="id_lblERRORPWD"></p>
            <hr>
        		<div class="input-group">
                <label for="username"><b><br>
                  Username</b></label>
                <input type="text" placeholder="Enter Username" name="txtUNME" id="id_txtUNME" required>
          </div> 

          <div class="input-group">
                <label for="Firstname"><b><br>
                  First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="txtFNME" id="id_txtFNME" required>
          </div>

          <div class="input-group">
                <label for="Middlename"><b><br>
                  Middle Name</b></label>
                <input type="text" placeholder="Enter Middle Name" name="txtMNME" id="id_txtMNME" required>
          </div>

          <div class="input-group">
                <label for="Lastname"><b><br>
                  Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="txtLNME" id="id_txtLNME" required>
          </div>

          <div class="input-group">
                <label for="Gender"><b><br>
                  Gender</b></label>
                  <select name="lstGNDR" id="id_lstGNDR" required><option>Male</option><option>Female</option></select>
          </div>
		
          <div class="input-group">
                <label for="DOB"><b><br>
                  Date of Birth</b></label>
                  <input type="date" name="datDOB" id="id_datDOB">
          </div>

          <div class="input-group">
                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="txtEMAIL" id="id_txtEMAIL" required>
            </div>
        
            <div class="input-group">
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="txtPWD" id="id_txtPWD" required>
            </div>
        
            <div class="input-group">
                <label for="psw-repeat"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="txtCPWD" id="id_txtCPWD" required>
            </div>
            <p name="lblPWDERR" id="id_lblPWDERR"></p>
            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms &amp; Privacy</a>.</p>
          <p>&nbsp;</p>
          <div class="clearfix">
        <button type="submit" name="butREG" id="id_butREG">Sign Up</button>
        <p class="cancelbtn">&nbsp;</p>
        <p class="cancelbtn"><a href="/">Cancel</a>&nbsp;</p>
</div>
</div>
</br>

        </form>
    </div>
    <?php 
    bootstarp_js();
    ?>
    <script src="script.js"></script> <!-- If you have any JavaScript -->
</body>
</html>


<?php
    if(array_diff_key($_POST,["butREG"]))
    {
        $U_nme = $_POST["txtUNME"];
        $U_Fnme = $_POST["txtFNME"];
        $U_Mnme = $_POST["txtMNME"];
        $U_Lnme = $_POST["txtLNME"];
        $U_GEN = $_POST["lstGNDR"];
        $U_DOB = $_POST["datDOB"];
        $U_Email = $_POST["txtEMAIL"];
        $U_Pwd = $_POST["txtPWD"];
        $U_Pwd2 = $_POST["txtCPWD"];
        $U_typ = 0;

        if($U_Pwd!=$U_Pwd2)
        {
            $msg = "Passwords not match !";
            echo "<script>alert('$msg');</script>";
        }
        else
        {        
          if (reg_user($U_nme, $U_Fnme, $U_Mnme, $U_Lnme, $U_GEN, $U_DOB, $U_Email, $U_Pwd, $U_typ))
          {
              msg('/Login','You Are Registered', "User Name : ". $U_nme, 1);
          }
          else
          {
              echo "<script>alert('You Cannot Register at now!');</script>";
              echo "<script>location.href = '/Login'</script>";
          }
      }
    }

?>





