<?php
    include_once($_SERVER["DOCUMENT_ROOT"]."/gen-ops.php");
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        route('/');
    }
?>

<?php
        function ordst($ordst)
        {
            switch ($ordst) {
                case '0':
                    return "<span class='badge badge-pill badge-light'>Placed</span>";
                    break;
                case '1':
                    return "<span class='badge badge-pill badge-secondary'>Processing</span>";
                    break;
                case '2':
                    return "<span class='badge badge-pill badge-info'>Handover to Currior</span>";
                    break;
                case '3':
                    return "<span class='badge badge-pill badge-success'>Completed</span>";
                    break;
                case '8':
                    return "<span class='adge badge-warning'>Canceld</span></p></td>";
                    break;    
                default:
                    return "<span class='badge badge-pill badge-danger'>Error</span>";
                    break;
            }
        }

        function ord_lg($date,$ordst,$notes)
        {
            switch ($ordst) {
                case '0':
                    return "<tr><td>$date</td><td><span>The order placed. </span><span>$notes</span></td></tr>";
                    break;
                case '1':
                    return "<tr><td>$date</td><td><span>Order has been taken into Processing. </span><span>$notes</span></td></tr>";
                    break;
                case '2':
                    return "<tr><td>$date</td><td><span>The order handoverd to Currior. </span><span>$notes</span></td></tr>";
                    break;
                case '3':
                    return "<tr><td>$date</td><td><span>The order completed by verifying OTP. </span><span>$notes</span></td></tr>";
                    break;
                case '8':
                    return "<tr><td>$date</td><td><span>The order Canceld. </span><span>$notes</span></td></tr>";
                    break;    
                default:
                    return "<div class='alert alert-danger'><strong>Error !</strong></div>";
                    break;
            }
        }

        function ord_log($ordID)
        {
            $row = get_tdrowwc('oreder_log','order_ord_id',$ordID);
            $i=0;
            if(!$row==null)
            {
            while($i<sizeof($row))
            {
                $date = $row[$i][0];
                $status = $row[$i][1];
                $notes = $row[$i][2];
                echo ord_lg($date,$status,$notes);
                $i++;
            }
            }
            else
            {
                return "<div class='alert alert-danger'><strong>Invalied Order !</strong></div>";
            }
        }

        function ord_info_st($ordst)
        {
            switch ($ordst) {
                case '0':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'> Handover to Currior </span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'>Completed</span> </div>";
                    break;
                case '1':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'> Handover to Currior </span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'>Completed</span> </div>";
                    break;
                case '2':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> Handover to Currior </span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'>Completed</span> </div>";
                    break;
                case '3':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> Handover to Currior </span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Completed</span> </div>";
                    break;
                case '7':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> User Cancel Requested </span> </div>
                        <div class='step'> <span class='icon'> Canceld </span> <span class='text'></span> </div>";
                    break;   
                case '8':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> User Cancel Requested </span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> Canceld </span> </div>";
                    break;  
                case '9':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> Company Canceld </span> </div>";
                    break;    
                default:
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Error</span> </div>";
                    break;
            }
        }

        

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

        function OItem($ordID,$ordTN,$ordDT,$ordST,$paytyp) 
        {
            $element = "                  
                    <tr id='id_butORD".$ordID."'>
                        <td><p>".paytyp($paytyp)."</p></td>
                        <td><p>Order: <span>$ordID</span></p><p>Placed On: <span>$ordDT</span> Tracking No: <span>$ordTN</span></p></td>
                        <td><p>".ordst($ordST)."</p></td>
                    </tr>";
            echo $element;
            set_nav_actp('id_butORD'.$ordID,'/order/orderinfo.php?oid='.$ordID);
        }

        function OItemAD($ordID,$ordTN,$ordDT,$ordST,$paytyp,$usrID) 
        {
            $element = "                  
                    <tr id='id_butORDAD".$ordID."'>
                        <td><span>".paytyp($paytyp)."</span></td>
                        <td><span>$ordID</span></td>
                        <td><span>$ordDT</span></td>
                        <td><span>$ordTN</span></td>
                        <td><span>$usrID</span></td>
                        <td><span>".ordst($ordST)."</span></td>
                    </tr>";
            echo $element;
            set_nav_actp('id_butORDAD'.$ordID,'/order/orderinfo_admin.php?oid='.$ordID);
        }

        function OCItem($productname,$productimage,$price,$qty,$cid) {
            $element = "        
            <tr>
                <td>
                  <div class='d-flex mb-2'>
                    <div class='flex-shrink-0'>
                      <img src='{$productimage}' alt='{$productname}' width='35' class='img-fluid'>
                    </div>
                    <div class='flex-lg-grow-1 ms-3'>
                      <h6 class='small mb-0'>{$productname}</h6>
                      <span class='small'>Item ID: {$cid}</span>
                    </div>
                  </div>
                </td>
                <td>{$qty}</td>
                <td class='text-end'>Rs.".$qty*$price."</td>
            </tr>
            ";
            echo $element;
        }

        function OCSumm($maxp,$disc,$dilf) 
        {
            $element = "
            <tfoot>
              <tr>
                <td colspan='2'>Subtotal</td>
                <td class='text-end'>'Rs.".($maxp+$disc)-$dilf."'</td>
              </tr>
              <tr>
                <td colspan='2'>Dilivery Fee</td>
                <td class='text-end'>'Rs.{$dilf}'</td>
              </tr>
              <tr>
                <td colspan='2'>Discount (Code: NEWYEAR)</td>
                <td class='text-danger text-end'>'-Rs.{$disc}'</td>
              </tr>
              <tr class='fw-bold'>
                <td colspan='2'>TOTAL</td>
                <td class='text-end'>'Rs.{$maxp}'</td>
              </tr>
            </tfoot>";
            echo $element;
            } 

            function ord_add($paytyp,$maxp)
            {
            $add = "
                <div class='card mb-4'>
                <div class='card-body'>
                <div class='row'>
                    <div class='col-lg-6'>
                    <h3 class='h6'>Payment Method</h3>
                    <p>".paytyp($paytyp)."<br>
                    Total: 'Rs.{$maxp}'</p>
                    </div>
                    <div class='col-lg-6'>
                    <h3 class='h6'>Billing address</h3>
                    <address>
                        <strong>
                            <span name='txtNME' id='id_txtNME'>[First Name]</span>
                        </strong><br>
                            <p><span name='txtUADD' id='id_txtUADD'>[Address]</span> </p>
                            <abbr title='Phone'>P:</abbr> <span name='txtUNUM' id='id_txtUNUM'>[Phone]</span>
                            <p>Email : <span name='txtUEMAIL' id='id_txtUEMAIL'>[Email]</span></p>
                    </address>
                    </div>
                </div>
                </div>
            </div>
                ";
                echo $add;
            }
        function curinfo($tracking,$orderst)
        {
            $element = "
                        <div class='col-lg-6'>  
          <div class='card mb-4'>
                <!-- Shipping information -->
                <div class='card-body'>
                  <h3 class='h6'>Currior Respone</h3>
                  <div style ='position:relative; z-index: 1; width:fix-content; background-color:white; display:block;' name='secCURDISP' id='id_secCURDISP'>
                <iframe style = 'position: relative; width:fix-content; height:160px;' src='https://www.fdedomestic.com/track.php?track_number=".$tracking."' frameborder='none' name='dispCURDISP' id='id_dispCURDISP'></iframe>
                </div>
                  <hr>
            </div>
          </div>
        </div>
            ";
        if($orderst=='2')
        {
            echo $element;
        } 
        }

function tno_set_ad($orderst)
{

    $element = "
        <div class='card mb-4'>
            <!-- Shipping information -->
            <div class='card-body'>
            <h3 class='h6'>Dilivery Information</h3>
            <form method='post'>
            <p><strong>Tracking No: </strong>
            <span><input type='text' name='txtTNO' id='id_txtTNO'></span> <i class='bi bi-box-arrow-up-right'></i> </span></p>
    ";

    if($orderst=='2')
    {
        $element = $element . "
            <p><input class='btn btn-primary' type='submit' name='butWBM' id='id_butWBM' value='Modify'>&nbsp <input class='btn btn-primary' type='submit' name='butWB' id='id_butWB' value='WayBill'></p>
            </form>
            <hr>
            </div>
        </div>
        ";
    }else
    {
        $element = $element . "
        <p><input class='btn btn-primary' type='submit' name='butSTOCU' id='id_butSTOCU' value='Compele Processing and Send to Currior'></p>
        </form>
        <hr>
        </div>
        </div>
    ";
    }
    echo $element;
}

function complete_ord_intf_ad($orderst)
{

    $element = "
        <div class='card mb-4'>
            <!-- Shipping information -->
            <div class='card-body'>
            <h3 class='h6'>Completing Verification</h3>
            <form method='post'>
            <p><strong>OTP: </strong>
            <span><input type='text' name='txtOTP' id='id_txtOTP'></span> <i class='bi bi-box-arrow-up-right'></i> </span></p>
    ";

    if($orderst=='2')
    {
        $element = $element . "
            <p><input class='btn btn-primary' type='submit' name='butOTPVERY' id='id_butOTPVERY' value='Verify and Complete'></p>
            </form>
            <hr>
            </div>
        </div>
        ";
    }else
    {
        $element = "Oder is stiill not sent to Currior";
    }
    echo $element;
}

function ord_act_usr($orderst)
{
    $rem_list_element = 
    "
        <div class='container'>
            <article class='card'>
                <header class='card-header'>Action</header>
                <div class='card-body'>
                <input class='btn btn-primary' type='submit' name='butREM' id='id_butREM' value='Remove'> 
                </div>
            </article>
        </div>
    ";
    if($orderst=='3'||$orderst=='8'||$orderst=='9')
    {
        echo $rem_list_element;
    }

}

function ord_act_admin($orderst)
{
    $cncl_ord_element = 
    "
        <div class='container'>
            <article class='card'>
                <header class='card-header'>Actions</header>
                <div class='card-body'>
                <p><strong>Reason : </strong>
                <span><input type='text' name='txtRES' id='id_txtRES'></span> <i class='bi bi-box-arrow-up-right'></i> </span></p>
                <input class='btn btn-primary' type='submit' name='butCNCL' id='id_butCNCL' value='Cancel'> 
                </div>
            </article>
        </div>
    ";
    if($orderst=='0'||$orderst=='1'||$orderst=='2')
    {
        echo $cncl_ord_element;
    }
}
       function dilinfo($orderst)
        {
            $element = "
                        <div class='container'>
<div calss='row'>
        <div class='col-lg-6'>  
          <div class='card mb-4'>
                <!-- Shipping information -->
                <div class='card-body'>
                  <h3 class='h6'>Dilivery Information</h3>
                  <strong>Tracking No: </strong>
                  <span><a href='#' class='text-decoration-underline' target='_blank' name='lblORDTN' id='id_lblORDTN'>[Traking No]</a> <i class='bi bi-box-arrow-up-right'></i> </span>
                          </br>
                  <strong>OTP: </strong>
                  <span name='lblORDOTP' id='id_lblORDOTP'>[OTP]</a> <i class='bi bi-box-arrow-up-right'></i> </span>

                <form method='post'>
                    <p><input class='btn btn-primary' type='submit' name='butINV' id='id_butINV' value='Invoice'></p>
                </form>
                  <hr>
            </div>
          </div>
        </div>
            ";
        if($orderst!='0'&&$orderst!='1')
        {
            echo $element;
        } 
        }

        function complete_ord($oid,$otp)
        {
            $dotp = read_s_data('orders','ord_otp','ord_id',$oid);
            if($dotp==$otp)
            {
                order_log($oid,'3',"Via OTP Submission.");
                echo "<script>alert('Order Completed')</script>";
                logout();
            }
            else
            {
              echo "<script>alert('OTP Not Matched')</script>";
              logout();
            }
        }

        function cancel_ord($oid,$res)
        {
                if(order_log($oid,'8',"REASON : ".$res."."))
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }
?>