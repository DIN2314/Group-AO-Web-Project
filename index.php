<?php
    include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
      include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
      include_once($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php"); 
      include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
      include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
      del_u_u_cat_bnd();
?>

<?php 
bootstarp_css("Welcome");
?>

<?php
    session_set("Guest",9);
    route("/user");
?>

<?php 
bootstarp_js();
?>

<?php
    
    // $b1 = new prompt_box();

    //   echo "<script>alert('".$out."')</script>";
    //   $out = $b1->dispout('a','b');
?>


