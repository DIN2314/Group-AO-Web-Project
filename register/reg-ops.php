<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        echo "<script>location.href = '/'</script>";
    }
?>

<?php
    include ($_SERVER["DOCUMENT_ROOT"]. "/database/datcmd.php");
?>

<?php
    function upd_user($U_nme, $U_Fnme, $U_Mnme, $U_Lnme, $U_GEN, $U_DOB, $U_Email, $U_Pwd)

    {

        if(v_ext("users","user_name",$U_nme))

        {

            $sql_U= "UPDATE `users` SET `user_pwd` = '$U_Pwd', `status` = '2' WHERE (`user_name` = '$U_nme');";

            $sql_U_D= "UPDATE `userdat` SET `fnme` = '$U_Fnme', `mnme` = '$U_Mnme', `lnme` = '$U_Lnme', `DOB` = '$U_DOB', `gender` = '$U_GEN', `email` = '$U_Email' WHERE (`users_user_name` = '$U_nme');";

            

            $U_ADD_CONN = connect();

            if(mysqli_query($U_ADD_CONN,$sql_U))

            {

                if(mysqli_query($U_ADD_CONN,$sql_U_D))

                {

                    return true;

                }else

                {

                    return false;

                }

            }

            else

            {

                return false;

            }

        }

        else

        {

            echo "<script>document.getElementById('id_lblUNMEERR').textContent = 'User Not Found.'; document.getElementById('id_lblUNMEERR').style.color = 'red';</script>";

        }

    }



    function req_del_user($U_nme)

    {

        if(v_ext("users","user_name",$U_nme))

        {

            $sql_req_D= "UPDATE `users` SET `status` = '3' WHERE (`user_name` = '$U_nme');";

            

            $U_ADD_CONN = connect();

            if(mysqli_query($U_ADD_CONN,$sql_req_D))

            {

                    return false;

            }

            else

            {

                return false;

            }

        }

        else

        {

            echo "<script>document.getElementById('id_lblUNMEERR').textContent = 'User Not Found.'; document.getElementById('id_lblUNMEERR').style.color = 'red';</script>";

        }

    }



    function app_user($U_nme)

    {

        if(v_ext("users","user_name",$U_nme))

        {

            $sql_req_D= "UPDATE `users` SET `status` = '1' WHERE (`user_name` = '$U_nme');";

            

            $U_ADD_CONN = connect();

            if(mysqli_query($U_ADD_CONN,$sql_req_D))

            {

                    return false;

            }

            else

            {

                return false;

            }

        }

        else

        {

            echo "<script>document.getElementById('id_lblUNMEERR').textContent = 'User Not Found.'; document.getElementById('id_lblUNMEERR').style.color = 'red';</script>";

        }

    }

?>