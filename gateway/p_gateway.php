<?php
    include_once ($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php
    function p_process()
    {
        return true;
    }
?>