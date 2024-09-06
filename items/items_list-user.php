<?php
        // include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
        // include ($_SERVER["DOCUMENT_ROOT"]. "/database/datr.php");
        include ($_SERVER["DOCUMENT_ROOT"]. "/items/items-ops.php");
        sessionupd();
        // timeout();
        if($_SESSION["U_UTYP"]!='9')
        {
            u_validate(0);
        }
?>

<?php
        bootstarp_css("Items");  
?>

<link href="css/styles.css" rel="stylesheet">

<section class='shop_section'>
    
        <?php

            head_m3();   
        ?>



                <?php
                    if(isset($_GET['iId'])){$iId = $_GET['iId'];}else{$iId ='';}
                    if(isset($_GET['iNme'])){$iNme = $_GET['iNme'];}else{$iNme ='';}
                    if(isset($_GET['iMaxp'])){$iMaxp = $_GET['iMaxp'];}else{$iMaxp ='';}
                    if(isset($_GET['iMinp'])){$iMinp = $_GET['iMinp'];}else{$iMinp ='';}
                    if(isset($_GET['iMaxd'])){$iMaxd = $_GET['iMaxd'];}else{$iMaxd ='';}
                    if(isset($_GET['iMind'])){$iMind = $_GET['iMind'];}else{$iMind ='';}
                    if(isset($_GET['ispBnd'])){$ispBnd = $_GET['ispBnd'];}else{$ispBnd ='';}
                    if(isset($_GET['ispCat'])){$ispCat = $_GET['ispCat'];}else{$ispCat ='';}
                    if(isset($_GET['ispcntry'])){$ispcntry = $_GET['ispcntry'];}else{$ispcntry ='';}
                    if(isset($_GET['ispMaxag'])){$ispMaxag = $_GET['ispMaxag'];}else{$ispMaxag ='';}
                    if(isset($_GET['ispMinag'])){$ispMinag = $_GET['ispMinag'];}else{$ispMinag ='';}
                    if(isset($_GET['imanuNme'])){$imanuNme = $_GET['imanuNme'];}else{$imanuNme ='';}
                    if(isset($_GET['ordby'])){$ordby = $_GET['ordby'];}else{$ordby ='';}
                    if(isset($_GET['limit'])){$limit = $_GET['limit'];}else{$limit ='';}
                    if(isset($_GET['sort'])){$sort = $_GET['sort'];}else{$sort ='';}
                    if(isset($_GET['chead'])){$chead = $_GET['chead'];}else{$chead ='';}
                    if(isset($_GET['cshead'])){$cshead = $_GET['cshead'];}else{$cshead ='';}
                    if(isset($_GET['whreq'])){$whreq = $_GET['whreq'];}else{$whreq ='';}
                    view_itm_lst_user($iId,$iNme,$iMaxp,$iMinp,$iMaxd,$iMind,$ispBnd,$ispCat,$ispcntry,$ispMaxag,$ispMinag,$imanuNme,$ordby,$limit,$sort,$chead,$cshead,"1",$whreq);

                ?>
                </div>
            </div>
</section>

</body>

