<?php
        include($_SERVER["DOCUMENT_ROOT"]. "/gateway/p_gateway.php");

    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php

    function add()
    {
        $add = "
                    <ul class='list-unstyled mb-1-9'>
                        <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Receiption Name:</span> 
                            <span name='txtFNME' id='id_txtFNME'>[First Name]</span> 
                            <span name='txtMNME' id='id_txtMNME'>[Middle Name]</span> 
                            <span name='txtLNME' id='id_txtLNME'>[Last Name]</span> 
                        </li>
                        <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Address:</span> 
                            <span name='txtUADD' id='id_txtUADD'>[Address]</span> </br>
                            <span name='txtUCITY' id='id_txtUCITY'>[City]</span>, </br>
                            <span name='lstDIST' id='id_lstDIST'>[District]</span>,
                            <span name='lstPROV' id='id_lstPROV'>[Province]</span> </br>
                            <span name='txtUPCDE' id='id_txtUPCDE'>[Postal Code]</span>
                        </li>
                        <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Email:</span> 
                            <span name='txtEMAIL' id='id_txtEMAIL'>[Email]</span> 
                        </li>
                        <li class='mb-2 mb-xl-3 display-28'><span class='display-26 text-secondary me-2 font-weight-600'>Number:</span> 
                            <span name='txtUNUM' id='id_txtUNUM'>[Phone]</span>
                        </li>
                    </ul>
        ";
        echo $add;
    }

    function card()
    {
        $card = "
                    <link rel='stylesheet' href='style.css'>
                            <div class='col-xl-7 col-lg-8 col-md-9 col-sm-11'>
                                <div class='card border-0'>
                                    <div class='row justify-content-center'>
                                        <h3 class='mb-4'>Credit Card Checkout</h3>
                                    </div>
                                    <div class='row'>
                                        <div class='col'>
                                            <div class='form-group'>
                                                <p class='text-muted text-sm mb-0'>Name on the card</p>
                                                <input type='text' name='txtPNME' id='id_txtPNME' placeholder='Name' size='15'>
                                            </div>
                                            <div class='form-group'>
                                                <p class='text-muted text-sm mb-0'>Card Number</p>
                                                <div class='row px-3'>
                                                    <input type='text' name='txtPNUM' id='id_txtPNUM' placeholder='0000 0000 0000 0000' size='18' minlength='19' maxlength='19'>
                                                </div>
                                            </div>
                                            <div class='form-group'>
                                                <p class='text-muted text-sm mb-0'>Expiry date</p>
                                                <input type='text' name='txtPEXP' id='id_txtPEXP' placeholder='MM/YY' size='6' minlength='5' maxlength='5'>
                                            </div>
                                            <div class='form-group'>
                                                <p class='text-muted text-sm mb-0'>CVV/CVC</p>
                                                <input type='password' name='txtPCVV' id='id_txtPCVV' placeholder='000' size='1' minlength='3' maxlength='3'>
                                            </div>
                                        </div>
                                </div>
                            </div>
                    <script src='Script.js'></script>
        ";
        echo $card;
    }

    function plc_ORD($u_id,$paytyp)
    {
        switch ($paytyp) {
            case '1':
                if(p_process())
                {
                    if($ord_id=create_order($u_id, $paytyp))
                    {
                        
                        if(clear_crt($u_id))
                        {
                            msg_p("/user/","Order Placed!", " Oredr Id:".$ord_id."", 1);
                        }
                        else
                        {
                            msg_p("/user/","Order Not Placed!", "", 0);
                        }
                    }
                    else
                    {
                        msg_p("/user/","Order Not Placed!", "", 0);
                    }
                }
                else
                {
                    msg_p("/user/","Payment Process Failed!", "", 0);
                }
                break;
            case '2':
                if($ord_id=create_order($u_id, $paytyp))
                    {
                        if(clear_crt($u_id))
                        {
                            msg_p("/user/","Order Placed!", " Oredr Id:".$ord_id."", 1);
                        }
                        else
                        {
                            msg_p("/user/","Order Not Placed!", "", 0);
                        }
                    }
                    else
                    {
                        msg_p("/user/","Order Not Placed!", "", 0);
                    }
                break;

            default:
                msg_p("/user/","Please Select Payment Type !", "", 0);
                break;
        }
    }
?>
