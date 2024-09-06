<?php

        include($_SERVER["DOCUMENT_ROOT"]. "/user/user-ops.php");
        include ($_SERVER["DOCUMENT_ROOT"]. "/items/items-ops.php");
        sessionupd();
        timeout();
        if($_SESSION["U_UTYP"]!=9)
        {
            u_validate(0);
        }
        
?>

<?php
        bootstarp_css("Items");  
?>
<link href="css/styles.css" rel="stylesheet">

<body>
<?php
                head_m1();
                get_cat();
                get_brnd();
                static_sites();
                search();
                head_m2();
                head_m3();
?>
    


    <div style ='position:absolute; z-index: 1; width:fix-content; background-color:white; left:80%; display:none;' name='secCART' id='id_secCART'>
        <iframe style = 'position: fixed; width:380px; height:600px;' src='/cart/' frameborder='none' name='dispCART' id='id_dispCART'></iframe>
    </div>

    <div style = "position: relative;">
        <iframe style = "position: relative; width:100%;" src="/items/items_list-user_main.php" frameborder="none" name="disp" id="id_disp"></iframe>
    </div>
    
    <script type="text/javascript" src="/user/script.js"></script>
<?php
    footer();
    bootstarp_js(); 
?>

<script>
    function resizeIframe() {
        var iframe = parent.document.getElementById("id_disp");
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight   
        + "px";
        }
        function resizeIframe2()
        {
        if((document.getElementById('id_disp').contentWindow.document.body.scrollHeight!=0)||(document.getElementById('id_disp').style.height != 0)){

                    var iframe = document.getElementById('id_disp');
            iframe.style.height = iframe.contentWindow.document.body.scrollHeight   
        + 'px';
        }
        }

        // Call the resizeIframe function when the iframe content loads
        document.getElementById('id_disp').onload=resizeIframe2;
</script>

<!-- Bootstrap core JS-->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
<!-- Core theme JS-->

<script src='script.js'></script>
<script src='js/scripts.js'></script>
</body>
</html>

<?php
        set_nav_act('id_butORD','/order/order_list_user.php');
        set_nav_act('id_butINFOEDT','/General/user_info_edit.php?id='.$_SESSION["U_UNME"]);
        welcome_tit($_SESSION["U_UNME"]);
        acc_info($_SESSION["U_UNME"],$_SESSION["U_UTYP"]);
        if(isset($_POST["butLOUT"]))
        {
            logout();
        }
        if(isset($_POST["butLIN"]))
        {
            logout_g();
        }
?>



