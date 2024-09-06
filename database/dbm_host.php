<?php
    if(basename($_SERVER['PHP_SELF'])==basename(__FILE__))
    {
        echo "<script>location.href = '/'</script>";
    }
?>

<?php
    function connect()
    {
        // $server_name = "127.0.0.1:3306";
        // $user_name = "root";
        // $password = "Root@123";
        // $database = "toymarket";

        // $server_name = "sql106.infinityfree.com:3306";
        // $user_name = "if0_36788290";
        // $password = "zgJIqAwQJ9i";
        // $database = "if0_36788290_toymart";
        
        $server_name = "sql106.infinityfree.com:3306";
        $user_name = "if0_36788290";
        $password = "zgJIqAwQJ9i";
        $database = "if0_36788290_toymart";


        $conn = new mysqli($server_name,$user_name,$password,$database);
        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function read_DB_INN_JOIN($t_name, $scndt_name, $t_key, $scndt_key, $t_clm,  $t_condition,bool $wh_req)
    {
        if($wh_req)
        {
            $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key WHERE ".$t_condition.";";
        }
        else
        {
            

            if($t_condition!="")
            {
                $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key ".$t_condition.";";
            }
            else
            {
                $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key;";
            }
        }

        $read_conn = connect();
        $result = $read_conn->query($sql);
        return $result;
        $read_conn->close();
    }

    function read_DB_INN_JOIN3($t_name, $scndt_name,$thrdt_name, $t_key, $scndt_key, $thrdt_key, $t_clm,  $t_condition,bool $wh_req)
    {
        if($wh_req)
        {
            $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key WHERE ".$t_condition.";";
        }
        else
        {
            if($t_condition!="")
            {
                $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key ".$t_condition.";";
            }
            else
            {
                $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key;";
            }
            
        }

        $read_conn = connect();
        $result = $read_conn->query($sql);
        return $result;
        $read_conn->close();
    }

    function read_DB($t_name, $t_clm, $t_condition,bool $wh_req)
    {
        
        if($wh_req)
        {
            $sql = "SELECT DISTINCT $t_clm FROM $t_name WHERE $t_condition;";
        }
        else
        {
            if($t_condition!="")
            {
                $sql = "SELECT DISTINCT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key ".$t_condition.";";
            }
            else
            {
                $sql = "SELECT DISTINCT $t_clm FROM $t_name ;";
            }
        }
        $read_conn = connect();
        $result = $read_conn->query($sql);
        return $result;
        $read_conn->close();
    }

    function ex_q($query)
    {
        $conn = connect();
        $sql = $query;

        if($conn->query($sql)===TRUE)
        {
            return true;
        }
        else
        {
            return false;
            echo "Error : " . $conn->error;   
        }
        $conn->close();
    }
?>