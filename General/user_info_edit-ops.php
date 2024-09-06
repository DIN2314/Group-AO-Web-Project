<?php
        include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
        include_once($_SERVER["DOCUMENT_ROOT"]."/database/datcmd.php");
?>

<?php
    function load_add()
    {

        $row = get_tdclm('p_cds','p_prov');
        $i=0;
        set_lst_empty('id_lstPROV');
        if(!$row==null)
        {
        while($i<sizeof($row)){
            set_lst_add('id_lstPROV',$row[$i][0]);
                  $i++;
            }
        }
        
        $row = get_tdclm('p_cds','p_dist');
        $i=0;
        set_lst_empty('id_lstDIST');
        if(!$row==null)
        {
        while($i<sizeof($row)){
            set_lst_add('id_lstDIST',$row[$i][0]);
                  $i++;
            }
        }

        
        $row = get_tdclm('p_cds','p_cty');
        $i=0;
        set_lst_empty('id_txtUCITY');
        if(!$row==null)
        {
        while($i<sizeof($row)){
            set_lst_add('id_txtUCITY',$row[$i][0]);
                  $i++;
            }
        }

        $row = get_tdclm('p_cds','p_cde');
        $i=0;
        set_lst_empty('id_txtUPCDE');
        if(!$row==null)
        {
        while($i<sizeof($row)){
            set_lst_add('id_txtUPCDE',$row[$i][0]);
                  $i++;
            }
        }
    }
?>





