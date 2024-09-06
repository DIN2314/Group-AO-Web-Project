<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/Login/User-Ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/register/reg-ops.php");
        include($_SERVER["DOCUMENT_ROOT"]. "/gen-ops.php");
        sessionupd();
        timeout();
        u_validate(1);
?>

<form method="POST">
    <p>Main: </br><iframe frameborder="none" name="upPiC" id="id_upPiC"></iframe></p>
    <p>Showcase 1: </br> <iframe  frameborder="none" name="upPiC1" id="id_upPiC1"></iframe></p>
    <p>Showcase 2: </br><iframe  frameborder="none" name="upPiC2" id="id_upPiC2"></iframe></p>
    <p>Showcase 3: </br><iframe  frameborder="none" name="upPiC3" id="id_upPiC3"></iframe></p>
    <p>Mini Ad: </br><iframe frameborder="none" name="upPiC4" id="id_upPiC4"></iframe></p>
    <p>Main Ad: </br><iframe  frameborder="none" name="upPiC5" id="id_upPiC5"></iframe></p>
    
    <button type="submit" name="butDNE" id="id_butADD">Done</button>
</form>

<?php
    $it_id = $_GET["I"];
    updintf("id_upPiC",$it_id,'2','1');
    updintf("id_upPiC1",$it_id,'2','2');
    updintf("id_upPiC2",$it_id,'2','3');
    updintf("id_upPiC3",$it_id,'2','4');
    updintf("id_upPiC4",$it_id,'2','5');
    updintf("id_upPiC5",$it_id,'2','6');

    if(isset($_POST['butDNE']))
    {
        echo "<script>alert('done');</script>";
        route("/admin/welcome.php");
    }
?>