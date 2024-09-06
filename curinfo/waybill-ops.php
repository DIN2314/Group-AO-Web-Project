<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php

        function paytyp($paytyp)
        {
            switch ($paytyp) {
                case '1':
                    return "<span class='btn btn-outline-success'>Paid</span>";
                    break;
                case '2':
                    return "<span class='btn btn-outline-warning'>COD</span>";
                    break;

                default:
                    return "<span class='badge badge-pill badge-danger'>Error</span>";
                    break;
            }
        }

        

        function waybItem($order,$tracking,$Confirm)
        {
            // set_nav_evntf('id_imgORDTN','src','"https://barcode.tec-it.com/barcode.ashx?code=Code128&translate-esc=on&data=ABC-abc-1234&dmsize=Default"');
            // set_nav_evntf('id_imgORDID1','src',"$order");
            // set_nav_evntf('id_imgCUSVRFY','src',"'$Confirm'");
            
        }
            function wayb_add()
            {
            $add = "
              <table class='header-table'>
                    <tbody>
                        </tbody><thead>
                        <tr><th colspan='2'>Reciptant Details</th>
                    </tr></thead>
                    <tbody>
                        <tr>
                            <td>Name:</td> <td><span name='txtNME' id='id_txtNME'>[Name]</span></td>
                        </tr>
                        <tr>
                            <td>Address:</td> <td><span name='txtUADD' id='id_txtUADD'>[Address]</span> </td>
                        </tr>
                        <tr>
                            <td>Number:</td> <td><span name='txtUNUM' id='id_txtUNUM'>[Phone]</span></td>
                        </tr>
                        <tr>
                            <td>Email:</td> <td><span name='txtUEMAIL' id='id_txtUEMAIL'>[Email]</span></td>
                        </tr>
                    </tbody>
                </table> ";  


                echo $add;
            }

?>