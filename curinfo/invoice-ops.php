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
                case '9':
                    return "<span class='adge badge-warning'>Canceld</span></p></td>";
                    break;    
                default:
                    return "<span class='badge badge-pill badge-danger'>Error</span>";
                    break;
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
                case '9':
                    return "        
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Placed</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'>Order Processing</span> </div>
                        <div class='step active'> <span class='icon'>  </span> <span class='text'> Canceld </span> </div>
                        <div class='step'> <span class='icon'>  </span> <span class='text'></span> </div>";
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

        function invItem($productname,$price,$qty) {
            $element = "        
                       <tr>
            <td>
              {$productname}
            </td>
            <td class='text-right'>
              <span class='mono'>{$qty}</span>
            </td>
            <td class='text-right'>
              <strong class='mono'>Rs.".$qty*$price."</strong>
            </td>
          </tr>
            ";
            echo $element;
        }

        function invSumm($maxp,$disc,$dilf) 
        {
            $element = "
            <div class='panel panel-default'>
            <table class='table table-bordered table-condensed'>
              <thead>
                <tr>
                  <td class='text-center col-xs-1'>Sub Total</td>
                  <td class='text-center col-xs-1'>Discount</td>
                  <td class='text-center col-xs-1'>Total</td>
                  <td class='text-center col-xs-1'>Dilivery Fee</td>
                  <td class='text-center col-xs-1'>Final</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th class='text-center rowtotal mono'>Rs.".($maxp+$disc)-$dilf."</th>
                  <th class='text-center rowtotal mono'>-Rs.{$disc}</th>
                  <th class='text-center rowtotal mono'>Rs.".(($maxp+$disc)-$dilf)-$disc."</th>
                  <th class='text-center rowtotal mono'>Rs.{$dilf}</th>
                  <th class='text-center rowtotal mono'>Rs.{$maxp}</th>
                </tr>
              </tbody>
            </table>
          </div>";


            echo $element;
            } 

            function inv_add()
            {
            $add = "
                <div class='panel-body'>
                <dl class='dl-horizontal'>
                  <dt>Name</dt>
                  <dd><span name='txtNME' id='id_txtNME'>[Name]</span></dd>
                  <dt>Address</dt>
                  <dd><span name='txtUADD' id='id_txtUADD'>[Address]</span> </dd>
                  <dt>Phone</dt>
                  <dd><span name='txtUNUM' id='id_txtUNUM'>[Phone]</span></dd>
                  <dt>Email</dt>
                  <dd><span name='txtUEMAIL' id='id_txtUEMAIL'>[Email]</span></dd>
                  <dt>&nbsp;</dt>
                  <dd>&nbsp;</dd>
              </dl></div>  ";  
                echo $add;
            }

?>