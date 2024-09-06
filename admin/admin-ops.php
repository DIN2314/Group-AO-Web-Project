<?php
    include_once ($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php
    function welcome_tit($uname)
    {

        echo "<script>document.getElementById('id_lblhUNME').textContent = '$uname'</script>";
        
    }

    function acc_info($unme,$utyp)
    {   
        $user_dat = get_row('userdat','users_user_name',$unme);
        set_nav_evntf('id_imgUSR','src',"'../uploads/images/user/".$unme.'/main.png'."'");
        set_doc_content('id_lblhUNME',"$user_dat[0]");
        set_doc_content('id_lblUNME',"$unme");
        set_doc_content('id_lblFNME',"$user_dat[0]");
        set_doc_content('id_lblLNME',"$user_dat[2]");
        if($utyp==1)
        {
            set_doc_content('id_lblUTYP','Administrator Account'); 
        }
        else
        {
            set_doc_content('id_lblUTYP','Customer'); 
        }
        set_doc_content('id_lblUMAIL',"$user_dat[5]");
    }
?>
 
