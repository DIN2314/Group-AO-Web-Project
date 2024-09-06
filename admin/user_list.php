<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
?>

<?php
        sessionupd();
        timeout();
        u_validate(1);
?>

 <link href='style/css/admin.css' rel='stylesheet'>
 <link href='css/responsive.css' rel='stylesheet'>
<?php 
    bootstarp_css("User List");  
?>

<body>
 
<?php

?>

<?php 
  ?>
  <h1 class="text-center">Users</h1>
  <br>
    <tbody>
      <?php
          view_u_lst('0');
      ?>
    </tbody>

    
  </table>

  <?php 
bootstarp_js();
?>
</body>
</html>