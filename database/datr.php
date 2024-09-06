<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        echo "<script>location.href = '/'</script>";
    }
?>

<?php
        include($_SERVER["DOCUMENT_ROOT"]."/database/dbm.php");
?>

<?php

        function read_s_data($t_name,$v_name,$c_f_name,$f_val)
        {
            $condt = "$c_f_name = '$f_val'";
            $read_result = read_db($t_name,$v_name,$condt,true);
            if($read_result !== false && $read_result->num_rows > 0)
            {
                while($row = $read_result->fetch_assoc())
                {
                    return $row[$v_name];
                }
            }else{return false;}
        }

        function read_s_data_rc($t_name,$v_name,$condt)
        {
            $read_result = read_db($t_name,$v_name,$condt,true);
            if($read_result !== false && $read_result->num_rows > 0)
            {
                while($row = $read_result->fetch_assoc())
                {
                    return $row[$v_name];
                }
            }else{return false;}
        }

        function get_row($t_name,$c_f_name,$f_val)
        {
            $condt = "$c_f_name = '$f_val'";
            $read_r_result = read_db($t_name,"*",$condt,true);
            if($read_r_result !== false && $read_r_result->num_rows > 0)
            {
                $row = $read_r_result->fetch_row();
                return $row;
            }else{return false;}
        }

        function get_tdrow($t_name)
        {
            $out = [];
            $read_r_tdresult = read_db($t_name,"*","",false);
            if($read_r_tdresult !== false && $read_r_tdresult->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresult))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;

        }

        function get_tdclm($t_name,$t_clm)
        {
            $out = [];
            $read_r_tdresult = read_db($t_name,$t_clm,"",false);
            if($read_r_tdresult !== false && $read_r_tdresult->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresult))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;

        }
        function get_tdclmc($t_name,$t_clm,$c_f_name,$f_val)
        {
            $condt = "$c_f_name = '$f_val'";
            $out = [];
            $read_r_tdresultwc = read_db($t_name,$t_clm,$condt,true);
            if($read_r_tdresultwc !== false && $read_r_tdresultwc->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresultwc))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;

        }

        function get_tdroww_innj($t_name, $scndt_name, $t_key, $scndt_key)
        {
            $out = [];
            $read_r_tdresultwc = read_DB_INN_JOIN($t_name, $scndt_name,$t_key, $scndt_key, "*", "",false);
            if($read_r_tdresultwc !== false && $read_r_tdresultwc->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresultwc))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;
        }

        function get_tdroww_innj3($t_name, $scndt_name,$thrdt_name, $t_key, $scndt_key, $thrdt_key, $t_condition,bool $wh_req)
        {
            
            $out = [];
            if($wh_req)
            {
                $read_r_tdresultwc3 = read_DB_INN_JOIN3($t_name, $scndt_name,$thrdt_name, $t_key, $scndt_key, $thrdt_key, "*", $t_condition,true);
            }
            else
            {
                $read_r_tdresultwc3 = read_DB_INN_JOIN3($t_name, $scndt_name,$thrdt_name, $t_key, $scndt_key, $thrdt_key, "*", $t_condition,false);
            }

            if($read_r_tdresultwc3 !== false && $read_r_tdresultwc3->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresultwc3))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;
        }

        function get_tdrowwc($t_name,$c_f_name,$f_val)
        {
            $condt = "$c_f_name = '$f_val'";
            $out = [];
            $read_r_tdresultwc = read_db($t_name,"*",$condt,true);
            if($read_r_tdresultwc !== false && $read_r_tdresultwc->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresultwc))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;
        }

        function get_tdrowwrc($t_name,$condt)
        {
            $out = [];
            $read_r_tdresultwrc = read_db($t_name,"*",$condt,true);
            if($read_r_tdresultwrc !== false && $read_r_tdresultwrc->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresultwrc))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;

        }

        function get_tdrowwc_innj($t_name, $scndt_name, $t_key, $scndt_key, $c_f_name, $f_val)
        {
            $condt = "$c_f_name = "."'".$f_val."'";
            $out = [];
            $read_r_tdresultwc = read_DB_INN_JOIN($t_name, $scndt_name,$t_key, $scndt_key, "*", $condt,true);
            if($read_r_tdresultwc !== false && $read_r_tdresultwc->num_rows > 0)
            {
                while($row=mysqli_fetch_row($read_r_tdresultwc))
                {
                    $out[]=$row;
                }
            }else{return false;}

            return $out;

        }

        function v_ext($t_nme,$t_clm,$t_val)
        {
            $sql = "SELECT CONVERT((SELECT (EXISTS (SELECT * FROM `$t_nme` WHERE `$t_clm` = '$t_val'))),CHAR)as res";
            $ext_conn = connect();
            
            $result = $ext_conn->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    if($row["res"])
                    {
                        return true;
                    }
    
                    else
                    {
                        return false;
                    }
                }
                }else{echo "No Anything";}
                $ext_conn->close;
        }

        function v_extrc($t_nme,$condt)
        {

            $sql = "SELECT CONVERT((SELECT (EXISTS (SELECT * FROM `$t_nme` WHERE ($condt)))),CHAR)as res";
            $ext_conn = connect();
            
            $result = $ext_conn->query($sql);
            if($result->num_rows>0)
            {
                while($row = $result->fetch_assoc())
                {
                    if($row["res"])
                    {
                        return true;
                    }
    
                    else
                    {
                        return false;
                    }
                }
                }else{echo "No Anything";}
                $ext_conn->close;
        }
?>