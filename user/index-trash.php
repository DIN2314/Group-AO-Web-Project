<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
        include ($_SERVER["DOCUMENT_ROOT"]. "/items/items-ops.php");
        sessionupd();
        timeout();
        u_validate(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="css/styles.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        head_m1();
        get_cat();
        get_brnd();
        search();
        head_m2(); 
        head_m3();   
        head_m4();   
    ?>

                <?php
                        if(isset($_GET['iId'])){$iId = $_GET['iId'];}else{$iId ="";}
                        if(isset($_GET['iNme'])){$iNme = $_GET['iNme'];}else{$iNme ="";}
                        if(isset($_GET['iMaxp'])){$iMaxp = $_GET['iMaxp'];}else{$iMaxp ="";}
                        if(isset($_GET['iMinp'])){$iMinp = $_GET['iMinp'];}else{$iMinp ="";}
                        if(isset($_GET['iMaxd'])){$iMaxd = $_GET['iMaxd'];}else{$iMaxd ="";}
                        if(isset($_GET['iMind'])){$iMind = $_GET['iMind'];}else{$iMind ="";}
                        if(isset($_GET['ispBnd'])){$ispBnd = $_GET['ispBnd'];}else{$ispBnd ="";}
                        if(isset($_GET['ispCat'])){$ispCat = $_GET['ispCat'];}else{$ispCat ="";}
                        if(isset($_GET['ispcntry'])){$ispcntry = $_GET['ispcntry'];}else{$ispcntry ="";}
                        if(isset($_GET['ispMaxag'])){$ispMaxag = $_GET['ispMaxag'];}else{$ispMaxag ="";}
                        if(isset($_GET['ispMinag'])){$ispMinag = $_GET['ispMinag'];}else{$ispMinag ="";}
                        if(isset($_GET['imanuNme'])){$imanuNme = $_GET['imanuNme'];}else{$imanuNme ="";}
                        if(isset($_GET['ordby'])){$ordby = $_GET['ordby'];}else{$ordby ="";}
                        if(isset($_GET['sort'])){$sort = $_GET['sort'];}else{$sort ="";}
                        view_itm_lst_user($iId, $iNme,$iMaxp,$iMinp,$iMaxd,$iMind,$ispBnd,$ispCat,$ispcntry,$ispMaxag,$ispMinag,$imanuNme,$ordby,$sort);
                ?>
                </div>
            </div>
        </section>
        <?php
            footer();
        ?>
</body>
</html>




<?php
        set_nav_actp('id_butORD','/order/order_list_user.php');
        set_nav_act('id_butINFOEDT','/General/user_info_edit.php?id='.$_SESSION["U_UNME"]);
        welcome_tit($_SESSION["U_UNME"]);
        acc_info($_SESSION["U_UNME"],$_SESSION["U_UTYP"]);
        if(isset($_POST["butLOUT"]))
        {
            logout();
        }
?>



