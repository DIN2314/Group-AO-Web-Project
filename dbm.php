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

        // Host: sql12.freesqldatabase.com
        // Database name: sql12716611
        // Database user: sql12716611
        // Database password: 14k2wby27K
        // Port number: 3306

        // $server_name = "sql12.freesqldatabase.com:3306";
        // $user_name = "sql12716611";
        // $password = "14k2wby27K";
        // $database = "sql12716611";


        
        $server_name = "localhost:3306";
        $user_name = "root";
        $password = "Root@123";
        $database = "if0_36788290_toymart";

        $conn = new mysqli($server_name,$user_name,$password,$database);
        if($conn->connect_error){
            die("Connection Failed: " . $conn->connect_error);
        }
        return $conn;
    }

    function read_DB_INN_JOIN($t_name, $scndt_name, $t_key, $scndt_key, $t_clm,  $t_condition)
    {
        $sql = "SELECT $t_clm FROM $t_name INNER JOIN $scndt_name ON $t_key=$scndt_key WHERE $t_condition;";
        $read_conn = connect();
        $result = $read_conn->query($sql);
        return $result;
        $read_conn->close();
    }

    function read_DB($t_name, $t_clm, $t_condition,bool $wh_req)
    {
        
        if($wh_req)
        {
            $sql = "SELECT $t_clm FROM $t_name WHERE $t_condition;";
        }
        else
        {
            $sql = "SELECT $t_clm FROM $t_name ;";
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