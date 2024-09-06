<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        echo "<script>location.href = '/'</script>";
    }
?>
<?php
    include($_SERVER["DOCUMENT_ROOT"]."/database/datr.php");
?>
<?php

    function timeout()
    {    
            if(!isset($_SESSION["U_UNME"]))
                {
                    echo "<script>location.href = '/Login'</script>";
                }
                

    }

    function login()
    {        
        
        $tmpUNME = $_POST["txtUNAME"];
        $tmpPWD = $_POST["txtPWD"];
        
        if(read_s_data("users","user_pwd","user_name","$tmpUNME")==$tmpPWD)
        {
            $tmpUTYP = read_s_data("users","user_typ","user_name","$tmpUNME");
            if(session_set($tmpUNME,$tmpUTYP))
            {
                if($tmpUTYP==0)
                {
                    echo "<script>parent.document.location.href = '/user'</script>";
                }
                else
                {
                    if(isset($_GET['oid']))
                    {
                        echo "<script>parent.document.location.href = '/order/orderinfo_admin.php?c=".$_GET['oid']."&oid=".$_GET['oid']."'</script>";
                    }
                    else
                    {
                        echo "<script>parent.document.location.href = '/admin'</script>";
                    }
                    
                }
            }
            else
            {
                echo "err";
            }

        }
        else if(read_s_data("users","user_pwd","user_name","$tmpUNME")==false)
        {
            echo "<script>document.getElementById('id_lblERRORPWD').textContent = 'User Name Not Found'; document.getElementById('id_lblERRORPWD').style.color = 'red';</script>";
        }
        else
        {
            echo "<script>document.getElementById('id_lblERRORPWD').textContent = 'Wrong Password'; document.getElementById('id_lblERRORPWD').style.color = 'red';</script>";
        }
    }

    function logout(){
        session_unset();
        session_destroy();
        echo "<script>parent.document.location.href = '/'</script>";
    }

    function logout_g(){
        session_unset();
        session_destroy();
        echo "<script>parent.document.location.href = '/Login/'</script>";
    }

    function session_set($u_name,$u_type)
    {
        // ini_set('session.gc_maxlifetime',15);
        // ini_set('session.cookie_lifetime',15);
        session_start();
        $_SESSION["U_UNME"] = $u_name;
        $_SESSION["U_UTYP"] = $u_type;
        if(isset($_SESSION["U_UNME"]))
        {
            return true;
        }
    }

    function sessionupd()
    {
        if(!isset($_SESSION["U_UNME"]))
        {
            session_start();
            setcookie(session_name(),session_id(),time()+15);
        }
    }

    function u_validate($u_type)
    {
        
        if(!$_SESSION["U_UTYP"]==$u_type)
        {
            logout();
        }
    }


    function u_validate_sec($u_type)
    {
        if($_SESSION["U_UTYP"]!=$u_type)
        {
            msg("/admin/welcome.php","Unauthorized Access", "Try Log With Authorized User", false);

        }
    }

    function su_ave()
    {
        if(!v_ext("users","user_name","SUPER_USER")){
            msg("/admin/create-admin.php","Welcome", "Start Using the System by Creating Super User", true);
        }
    }


?>