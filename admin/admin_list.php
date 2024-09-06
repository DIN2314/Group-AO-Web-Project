<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]. "/msg/msg.php");
        sessionupd();
        timeout();
        u_validate_sec(2);
?>
 
 <?php 
    bootstarp_css("Admin List");  
?>

<body>
 
<?php

?>

<?php 
  ?>
  <h1 class="text-center">Administrators</h1>
  <br>
    <tbody>
      <?php
          view_u_lst('2');
          view_u_lst('1');
      ?>
    </tbody>

    
  </table>

<?php 
  bootstarp_js();
?>
</body>
</html>
