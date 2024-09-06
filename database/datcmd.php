<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        echo "<script>location.href = '/'</script>";
    }
?>
<?php
        include_once($_SERVER["DOCUMENT_ROOT"]."/database/datr.php");
?>
<?php

    // user Operations

    function set_s_data($t_name,$v_name,$set_v,$c_f_name,$f_val)
    {
        $sql="UPDATE `$t_name` SET `$v_name` = '$set_v' WHERE (`$c_f_name` = '$f_val');";
        if(ex_q($sql))
        {
            return true;
        }
        else
        {   
            return false;
        }
    }

    function set_s_data_rc($t_name,$v_name,$set_v,$condt)
    {
        $sql="UPDATE `$t_name` SET `$v_name` = '$set_v' WHERE (".$condt.");";
        if(ex_q($sql))
        {
            return true;
        }
        else
        {   
            return false;
        }
    }
       function rst_pwd($u_id) //user Paaword Reset (Reset to 'user name'with '.1234')
       {
            $sql="UPDATE `users` SET `user_pwd` = '$u_id.1234' WHERE (`user_name` = '$u_id');";
            if(ex_q($sql))
            {
                return true;
            }
            else
            {   
                return false;
            }
       }

       function reg_user($U_nme, $U_Fnme, $U_Mnme, $U_Lnme, $U_GEN, $U_DOB, $U_Email, $U_Pwd, $U_typ) //add New User
       {
           if(!v_ext("users","user_name",$U_nme))
   
           {
   
               $sql_U= "INSERT INTO `users` (`user_name`, `user_pwd`, `user_typ`, `status`) VALUES ('$U_nme', '$U_Pwd', '$U_typ', '0');";
   
               $sql_U_D= "INSERT INTO `userdat` (`fnme`, `mnme`, `lnme`, `DOB`, `gender`, `email`, `users_user_name`) VALUES ('$U_Fnme', '$U_Mnme', '$U_Lnme', '$U_DOB', '$U_GEN', '$U_Email', '$U_nme');";
   
               $sql_U_SHADD= "INSERT INTO `cus_shadd` (`cus_province`, `cus_district`, `cus_city`, `cus_add`, `cus_postc`, `cus_num`, `users_user_name`) VALUES (null, null, null, null, null,null, '$U_nme');";
               
               $sql_U_PAYM= "INSERT INTO `cus_paym` (`paym_nme`, `paym_cno`, `paym_expy`, `paym_cvv`, `users_user_name`) VALUES (null, null, null, null, '$U_nme');";
               
               if(ex_q($sql_U))
   
               {
   
                   if(ex_q($sql_U_D))
                   {
   
                       if(ex_q($sql_U_SHADD))
                       {
                           if(ex_q($sql_U_PAYM))
                           {
                               return true;
                           }
                           else
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
                       echo "<script>document.getElementById('id_lblMSG').textContent = 'User Data insert Failed!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                       return false;
                   }
   
               }
               else
               {
                   echo "<script>document.getElementById('id_lblMSG').textContent = 'User Id insert Failed!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                   return false;
               }
   
           }
   
           else
           {
   
               echo "<script>document.getElementById('id_lblMSG').textContent = 'User Already Exsists.'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
   
           }
   
       }

       function edt_user_BSEINFO($U_Fnme, $U_Mnme, $U_Lnme, $U_GEN, $U_DOB, $U_Email, $u_id) //Modify User Basic Info
        {
            $sql_U_D="UPDATE `userdat` SET `fnme` = '$U_Fnme', `mnme` = '$U_Mnme', `lnme` = '$U_Lnme', `DOB` = '$U_DOB', `gender` = '$U_GEN', `email` = '$U_Email' WHERE (`users_user_name` = '$u_id');";
            if(ex_q($sql_U_D))
            {
                return true;
            }
            else
            {   
                return false;
            }
       }

       function edt_user_SHADD($shadd_prov, $shadd_dist, $shadd_city, $shadd_add, $shadd_postc, $shadd_num, $u_id) //Modify User Shipping Address
       {
            $sql_SHADD="UPDATE `cus_shadd` SET `cus_province` = '$shadd_prov', `cus_district` = '$shadd_dist', `cus_city` = '$shadd_city', `cus_add` = '$shadd_add', `cus_postc` = '$shadd_postc', `cus_num` = '$shadd_num' WHERE (`users_user_name` = '$u_id');";
            if(ex_q($sql_SHADD))
            {
                return true;
            }
            else
            {   
                return false;
            }
       }
        
       function edt_user_PAYM($pay_nme, $pay_cno, $pay_expy, $pay_cvv, $u_id) //Modify User Payment Method
       {
            $sql_PAYM="UPDATE `cus_paym` SET `paym_nme` = '$pay_nme', `paym_cno` = '$pay_cno', `paym_expy` = '$pay_expy', `paym_cvv` = '$pay_cvv' WHERE (`users_user_name` = '$u_id');";
            if(ex_q($sql_PAYM))
            {
                return true;
            }
            else
            {   
                return false;
            }
       }

    function del_user($u_id) //Delete User
    {
        $u_typ = read_s_data('users','user_typ','user_name',$u_id);

        if((!v_ext("order_itms","users_user_name",$u_id)&&!v_ext("cart","users_user_name",$u_id)&&!v_ext("orders","users_user_name",$u_id)))
        {
            $sql_u = "DELETE FROM `users` WHERE (`user_name` = '$u_id');";
            $sql_U_D="DELETE FROM `userdat` WHERE (`users_user_name` = '$u_id');";
            $sql_SHADD="DELETE FROM `cus_shadd` WHERE (`users_user_name` = '$u_id');";
            $sql_PAYM="DELETE FROM `cus_paym` WHERE (`users_user_name` = '$u_id');";
            if(ex_q($sql_PAYM))
            {
                if(ex_q($sql_SHADD))
                {
                    if(ex_q($sql_U_D))
                    {
                        if(ex_q($sql_u))
                        {
                            if($u_typ=='1')
                            {
                                msg("/admin/admin_list.php","Delete Done!", "", True);
                            }
                            elseif($u_typ=='0')
                            {
                                msg("/admin/user_list.php","Delete Done!", "", True);
                            }
                            return true;   
                        }
                        else
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
            if($u_typ=='1')
            {
                $sql_u = "DELETE FROM `users` WHERE (`user_name` = '$u_id');";
                $sql_U_D="DELETE FROM `userdat` WHERE (`users_user_name` = '$u_id');";
                $sql_SHADD="DELETE FROM `cus_shadd` WHERE (`users_user_name` = '$u_id');";
                $sql_PAYM="DELETE FROM `cus_paym` WHERE (`users_user_name` = '$u_id');";
                if(ex_q($sql_PAYM))
                {
                    if(ex_q($sql_SHADD))
                    {
                        if(ex_q($sql_U_D))
                        {
                            if(ex_q($sql_u))
                            {
                                if($u_typ=='1')
                                {
                                    msg("/admin/admin_list.php","Delete Done!", "", True);
                                }
                                elseif($u_typ=='0')
                                {
                                    msg("/admin/user_list.php","Delete Done!", "", True);
                                }
                                return true;   
                            }
                            else
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
                        return false;
                    }
                }
                else
                {   
                    return false;
                }
            }
            elseif($u_typ=='0')
            {
                msg("/admin/user_list.php","Cannot delete This User", "There are Pending Operations with This User, Alternative You Can Block.", false);
            }
        }
    }

    // Items Operations
    function create_item($It_name, $it_des, $it_qty, $It_price, $manu_name, $manu_add, $manu_email, $manu_tp, $spc_brand, $spc_category, $spc_country, $spc_reqag, $spc_weight, $spc_depth, $spc_width, $spc_height) //add New Item
    {
        $it_id=rand_id('IT');
        while(v_ext("items","it_id",$it_id))
        {
            $it_id=rand_id('IT');
        }

            $sql_IT= "INSERT INTO `items` (`it_id`, `It_name`, `it_des`, `it_qty`, `It_price`,`it_date` ) VALUES ('$it_id', '$It_name', '$it_des', '$it_qty', '$It_price','".date("Y-m-d")."');";

            $sql_IT_MANU= "INSERT INTO `manufactures` (`manu_name`, `manu_add`, `manu_email`, `manu_tp`, `items_it_id`) VALUES ('$manu_name', '$manu_add', '$manu_email', '$manu_tp', '$it_id');";

            $sql_IT_SPC= "INSERT INTO `itspec` (`Brand_Brand_nme`, `category_cat_nme`, `spc_country`, `spc_reqag`, `spc_weight`, `spc_depth`, `spc_width`, `spc_height`, `items_it_id`) VALUES ('$spc_brand', '$spc_category', '$spc_country', '$spc_reqag', '$spc_weight', '$spc_depth', '$spc_width', '$spc_height', '$it_id');";
            
            if(ex_q($sql_IT))
            {

                if(ex_q($sql_IT_MANU))
                {

                    if(ex_q($sql_IT_SPC))
                    {
                            return $it_id;
                    }
                    else
                    {
                        echo "<script>document.getElementById('id_lblMSG').textContent = 'Item Data insert Failed!1'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                        return false;
                    }

                }
                else
                {
                    echo "<script>document.getElementById('id_lblMSG').textContent = 'Item Data insert Failed!2'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                    return false;
                }

            }
            else
            {
                echo "<script>document.getElementById('id_lblMSG').textContent = 'Item Data insert Failed!3'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                return false;
            }

    }

  function edt_item($it_id, $It_name, $it_des, $It_price, $manu_name, $manu_add, $manu_email, $manu_tp, $spc_brand, $spc_category, $spc_country, $spc_reqag, $spc_weight, $spc_depth, $spc_width, $spc_height) //add New Item
    {
            $sql_IT= "UPDATE `items` SET `It_name` = '$It_name', `it_des` = '$it_des', `It_price` = '$It_price' WHERE (`it_id` = '$it_id');";

            $sql_IT_MANU= "UPDATE `manufactures` SET `manu_name` = '$manu_name', `manu_add` = '$manu_add', `manu_email` = '$manu_email', `manu_tp` = '$manu_tp' WHERE (`items_it_id` = '$it_id');";

            $sql_IT_SPC= "UPDATE `itspec` SET `Brand_Brand_nme` = '$spc_brand', `category_cat_nme` = '$spc_category', `spc_country` = '$spc_country', `spc_reqag` = '$spc_reqag', `spc_weight` = '$spc_weight', `spc_depth` = '$spc_depth', `spc_width` = '$spc_width', `spc_height` = '$spc_height' WHERE (`items_it_id` = '$it_id');";
            
            if(ex_q($sql_IT))
            {

                if(ex_q($sql_IT_MANU))
                {

                    if(ex_q($sql_IT_SPC))
                    {
                            return true;
                    }
                    else
                    {
                        echo "<script>document.getElementById('id_lblMSG').textContent = 'Item Data Update Failed!1'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                        return false;
                    }

                }
                else
                {
                    echo "<script>document.getElementById('id_lblMSG').textContent = 'Item Data Update Failed!2'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                    return false;
                }

            }
            else
            {
                echo "<script>document.getElementById('id_lblMSG').textContent = 'Item Data Update Failed!3'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                return false;
            }

    }

    function del_item($it_id) //Delete Item
    {
    if((!v_ext("order_itms","items_it_id",$it_id)&&!v_ext("cart","items_it_id",$it_id)))
        {
         $sql_u = "DELETE FROM `items` WHERE (`it_id` = '$u_id');";
         $sql_U_D="DELETE FROM `manufactures` WHERE (`items_it_id` = '$u_id');";
         $sql_SHADD="DELETE FROM `itspec` WHERE (`items_it_id` = '$u_id');";
             if(ex_q($sql_SHADD)){
                 if(ex_q($sql_U_D))
                 {
                     if(ex_q($sql_u))
                     {
                        msg("/items/item_info.php","Item Deleted", "", true);
                        return true;   
                     }
                     else
                     {
                        msg("/items/item_info.php","Item Delete Failed", "Stage 1", false);
                        return false;
                     }
                 }
                 else
                 {
                    msg("/items/item_info.php","Item Delete Failed", "Stage 2", false);
                     return false;
                 }
             }
             else
             {
                msg("/items/item_info.php","Item Delete Failed", "Stage 3", false);
                 return false;
             }
        }
        else
        {
            msg("/items/item_info.php","There are Pending Orders with This Item", "", false);
            return false;
        }
    }

    function add_cart($item_id,$u_id,$qty)
    {
        $cat_id=rand_id('CAT');
        while(v_ext("cart","cit_id",$cat_id))
        {
            $cat_id=rand_id('CAT');
        }
        $condt = "`items_it_id`='".$item_id."' && `users_user_name`='".$u_id."'";
        if(!(v_extrc("cart",$condt)))
        {
            $sql_CAT= "INSERT INTO `cart` (`cit_id`, `items_it_id`, `users_user_name`, `Qty`) VALUES ('$cat_id', '$item_id', '$u_id', '$qty');";
            if(ex_q($sql_CAT))
            {
                echo "<script>document.getElementById('id_lblMSG').textContent = 'Added to the cart!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                return true;
            }
            else
            {
                echo "<script>document.getElementById('id_lblMSG').textContent = 'Adding Failed'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                return false;
            }
        }
        else
        {
            $it_qty = read_s_data_rc('cart','Qty',$condt);
            $it_n_qty = $it_qty + $qty;
            if(set_s_data_rc('cart','Qty',$it_n_qty,$condt))
            {
                echo "<script>document.getElementById('id_lblMSG').textContent = 'Added to the cart!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                return true;
            }else
            {
                echo "<script>document.getElementById('id_lblMSG').textContent = 'Adding Failed'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                return false;
            }
        }
    }

    function rem_cart($cat_id)
    {
        $sql_CAT= "DELETE FROM `cart` WHERE (`cit_id` = '$cat_id');";
        if(ex_q($sql_CAT))
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Removed!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return true;
        }
        else
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Remove Failed'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return false;
        }

    }

        function rem_ord($ord_id)
    {
        $sql_ORD0= "DELETE FROM `oreder_log` WHERE (`order_ord_id` = '$ord_id');";
        $sql_ORD1= "DELETE FROM `order_itms` WHERE (`order_ord_id` = '$ord_id');";
        $sql_ORD2= "DELETE FROM `orders` WHERE (`ord_id` = '$ord_id');";
        if(ex_q($sql_ORD0))
        {
            if(ex_q($sql_ORD1))
            {
                if(ex_q($sql_ORD2))
                {
                    echo "<script>document.getElementById('id_lblMSG').textContent = 'Remove Done'; document.getElementById('id_lblMSG').style.color = 'Green';</script>";
                    return true;
                }
                else
                {
                    echo "<script>document.getElementById('id_lblMSG').textContent = 'Remove Failed'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                    return false;
                }
            }
            else
            {
                    echo "<script>document.getElementById('id_lblMSG').textContent = 'Remove Failed'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
                    return false;
            }
        }
        else
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Remove Failed'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return false;
        }

    }

    function create_cat($cat_name)
    {
        $sql_CAT= "INSERT INTO `category` (`cat_nme`) VALUES ('$cat_name');";
        if(ex_q($sql_CAT))
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Category Add Done!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return true;
        }
    }
    function remove_cat($cat_name)
    {
        $sql_CAT= "DELETE FROM `category` WHERE (`cat_nme` = '$cat_name');";
        if(ex_q($sql_CAT))
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Category Removed Done!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return true;
        }
    }

    function create_brand($brnd_name)
    {
        $sql_CAT= "INSERT INTO `brand` (`Brand_nme`) VALUES ('$brnd_name');";
        if(ex_q($sql_CAT))
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Category Add Done!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return true;
        }
    }
    function remove_brand($brnd_name)
    {
        $sql_CAT= "DELETE FROM `brand` WHERE (`Brand_nme` = '$brnd_name');";
        if(ex_q($sql_CAT))
        {
            echo "<script>document.getElementById('id_lblMSG').textContent = 'Category Removed Done!'; document.getElementById('id_lblMSG').style.color = 'red';</script>";
            return true;
        }
    }
    
    function create_order($o_u_id, $paytyp)
    {
        $date = date("Y-m-d H:i:s");
        $ord_id=rand_id('ORD');
        while(v_ext("orders","ord_id",$ord_id))
        {
            $ord_id=rand_id('ORD');
        }

        $ord_OTP=rand_id('');
        while(v_ext("orders","ord_otp",$ord_OTP))
        {
            $ord_OTP=rand_id('');
        }
        $oi_id1=rand_id('');
        while(v_ext("orders","oi_id",$oi_id1))
        {
            $oi_id1=rand_id('');
        }
        $rownme = get_row('userdat','users_user_name',$o_u_id);
        $rowadd = get_row('cus_shadd','users_user_name',$o_u_id);
        $rec_name = "".$rownme[0]." ".$rownme[1]." ".$rownme[2]."";
        $rec_add = "".$rowadd[3].", ".$rowadd[2].", ".$rowadd[1].", ".$rowadd[0]." (".$rowadd[4].") ";
        $rec_tp = $rowadd[5];
        $rec_email = $rownme[5];
        $sql_ORD= "INSERT INTO `orders` (`ord_id`, `ord_dnt`, `ord_otp`, `ord_ptyp`, `users_user_name`, `rec_name`, `rec_add`, `rec_tp`, `rec_email`, `oi_id`) VALUES ('$ord_id', '$date', '$ord_OTP', '$paytyp', '$o_u_id', '$rec_name', '$rec_add', '$rec_tp', '$rec_email', '$oi_id1');";
        if(ex_q($sql_ORD))
        {

            if(order_log($ord_id,'0',''))
            {
                $row = get_tdrowwc('cart','users_user_name',$o_u_id);
                $i=0;
                if(!$row==null)
                {                
                    while($i<sizeof($row))
                    {
                        $oi_id=rand_id('');
                        while(v_ext("order_itms","oi_id",$o_u_id))
                        {
                            $oi_id=rand_id('');
                        }
                        $price = read_s_data('items','It_price','it_id',$row[$i][1]);
                        $sql_ORDIT= "INSERT INTO `order_itms` (`qty`, `order_ord_id`, `order_users_user_name`, `items_it_id`, `oi_id`,`price`) VALUES ('".$row[$i][3]."', '$ord_id', '$o_u_id', '".$row[$i][1]."', '$oi_id','$price');";
                        if(ex_q($sql_ORDIT))
                        {
                            $i++; 
                        }
                        else
                        {
                            msg("Order Not Placed!", "Stage 1", false);
                            return false;  
                        }   
                        
                    }
                    return $ord_id;
                }
                
            }
            else
            {
                msg("Order Not Placed!", "Stage 2", false);
                return false;
            }
        }
        else
        {
                msg("Order Not Placed!", "Stage 3", false);
        }
    }

    
    function order_log($order_id,$status,$notes)
    {
        $date = date("Y-m-d H:i:s");
        $sql_ORDLOG = "INSERT INTO `oreder_log` (`date`, `status`, `notes`, `order_ord_id`) VALUES ('$date', '$status', '$notes', '$order_id');";
        $sql_ORDLOG2 = "UPDATE `orders` SET `ord_st` = '$status' WHERE (`ord_id` = '$order_id');";
        if(ex_q($sql_ORDLOG))
        {
            if(ex_q($sql_ORDLOG2))
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    function waybill_upoad($order_id,$waybill)
    {
        $sql_WBU = "UPDATE `orders` SET `ord_tn` = '$waybill' WHERE (`ord_id` = '$order_id');";
        if(ex_q($sql_WBU))
        {
                return true;
        }
        else
        {
            return false;
        }
    }

    function clear_crt($u_id)
    {
        $sql_DCART= "DELETE FROM `cart` WHERE (`users_user_name` = '$u_id');";
        if(ex_q($sql_DCART))
        {
            return true;
        }
    }
?>