<?php
        // include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/admin/admin-ops.php");
        // include ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
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

<?php

?>

<h1 class="text-center">Items</h1>
<form method ="Post">
<p>
      Item ID: 
      <span><input type="text" name="iId" id="id_iId"></span>
      &nbsp
      Item Name: 
      <span><input type="text" name="iNme" id="id_iNme"></span>
      &nbsp      
      Min Price: 
      <span><input type="text" name="iMinp" id="id_iMinp"></span>
      &nbsp      
      Max Price: 
      <span><input type="text" name="iMaxp" id="id_iMaxp"></span>
      &nbsp      
      From: 
      <span><input type="Date" name="iMind" id="id_iMind"></span>
      &nbsp      
      TO: 
      <span><input type="Date" name="iMaxd" id="id_iMaxd"></span>
      &nbsp      
      Brand: 
      <span><select name="txtSPBND" id="id_txtSPBND"></select></span>
      &nbsp      
      category: 
      <span><select name="txtSPCAT" id="id_txtSPCAT"></select></span>
      &nbsp      
      Country: 
      <span><input type="text" name="ispcntry" id="id_ispcntry"></span>
      &nbsp          
      Manufacture: 
      <span><input type="text" name="imanuNme" id="id_imanuNme"></span>
      &nbsp      
      Order By: 
      <span><input type="text" name="ordby" id="id_ordby"></span>
      &nbsp      
      Limit: 
      <span><input type="text" name="limit" id="id_limit"></span>
      &nbsp      
      Sort: 
      <span><select name="sort" id="id_sort"><option value=""></option><option value="1">Ascending</option><option value="2">Descending</option></select></span>
      &nbsp      
</p>
    </span>&nbsp<span><button type="submit" name="butFND" id="id_butFND">Find</button></span></p>
</form>

<?php 
  ?>
  <br>
    <tbody>
      <?php
              
                    
                          load_cat_band();
                    if(isset($_POST['butFND'])){
                          if(isset($_POST["iId"])){$iId = $_POST["iId"];}else{$iId ="";}
                          if(isset($_POST["iNme"])){$iNme = $_POST["iNme"];}else{$iNme ="";}
                          if(isset($_POST["iMaxp"])){$iMaxp = $_POST["iMaxp"];}else{$iMaxp ="";}
                          if(isset($_POST["iMinp"])){$iMinp = $_POST["iMinp"];}else{$iMinp ="";}
                          if(isset($_POST["iMaxd"])){$iMaxd = $_POST["iMaxd"];}else{$iMaxd ="";}
                          if(isset($_POST["iMind"])){$iMind = $_POST["iMind"];}else{$iMind ="";}
                          if(isset($_POST["txtSPBND"])){$ispBnd = $_POST["txtSPBND"];}else{$ispBnd ="";}
                          if(isset($_POST["txtSPCAT"])){$ispCat = $_POST["txtSPCAT"];}else{$ispCat ="";}
                          if(isset($_POST["ispcntry"])){$ispcntry = $_POST["ispcntry"];}else{$ispcntry ="";}
                          if(isset($_POST["ispMaxag"])){$ispMaxag = $_POST["ispMaxag"];}else{$ispMaxag ="";}
                          if(isset($_POST["ispMinag"])){$ispMinag = $_POST["ispMinag"];}else{$ispMinag ="";}
                          if(isset($_POST["imanuNme"])){$imanuNme = $_POST["imanuNme"];}else{$imanuNme ="";}
                          if(isset($_POST["ordby"])){$ordby = $_POST["ordby"];}else{$ordby ="";}
                          if(isset($_POST["limit"])){$limit = $_POST["limit"];}else{$limit ="";}
                          if(isset($_POST["sort"])){$sort = $_POST["sort"];}else{$sort ="";}
                          if($iId==""&&$iNme==""&&$iMaxp==""&&$iMinp==""&&$iMaxd==""&&$iMind==""&&$ispBnd==""&&$ispCat==""&&$ispcntry==""&&$ispMaxag==""&&$ispMinag==""&&$imanuNme){$whreq = "0";}else{$whreq = "1";}
                          view_itm_lst_user($iId,$iNme,$iMaxp,$iMinp,$iMaxd,$iMind,$ispBnd,$ispCat,$ispcntry,$ispMaxag,$ispMinag,$imanuNme,$ordby,$limit,$sort,"HIDE","HIDE","4",$whreq);
                    }
      ?>
    </tbody>

    
  </table>
</body>
</html>
