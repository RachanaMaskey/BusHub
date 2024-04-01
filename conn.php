<?php

class connec
{
    public $username="root";
    public $password="root";
    public $server_name="localhost";
    public $db_name="busticket";
    public $conn;

    function __construct()
    {
        $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
        if($this->conn->connect_error)
        {
            die("Connection Failed");
        }
        // else
        // {
        //     echo "connected";
        // }
    }

    function select_all($table_name)
    {
        $sql="SELECT * FROM $table_name";
        $result=$this->conn->query($sql);
        return $result;
    }
    
    function select_by_query($query)
    {
        $result=$this->conn->query($query);
        return $result;
    }

    function select_showdt()
    {
        // $sql="SELECT busticket.path.id, busticket.path.route_date, busticket.path.ticket_price, busticket.path.no_seats, route.name AS 'route_name', path_time.time, bus.no FROM busticket.path, route,path_time, bus where busticket.path.route_time_id=path_time.id AND busticket.path.bus_id=bus.id;";
        $sql="SELECT busticket.route.id, busticket.route.name AS 'route_name' FROM busticket.route;";
        $result=$this->conn->query($sql);
        return $result;
    }

    function select($table_name,$id)
    {
        $sql="SELECT * FROM $table_name where id=$id";
        $result=$this->conn->query($sql);
        return $result;
    }

    
    function select_login($table_name,$email)
    {
        $sql="SELECT * FROM $table_name where email='$email'";
        $result=$this->conn->query($sql);
        return $result;
    }

    function insert($query,$msg)
    {
        if($this->conn->query($query)===TRUE)
        {
            echo '<script> alert("'.$msg.'");</script>';
            // echo '<script> alert("'.$msg.'");</script>' ;
        }
        else
        {
            // echo $this->conn->error;
            echo '<script> alert("'.$this->conn->error.'");</script>' ;
        }
    }

    function insert_lastid($query)
    {
        $last_id;
        if($this->conn->query($query)===TRUE)
        {
            $last_id=$this->conn->insert_id;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;  
        }
        return $last_id;
    }

    function update($query,$msg)
    {
        if($this->conn->query($query)===TRUE)
        {
            echo '<script> alert("'.$msg.'");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>' ;
        }
    }

    function delete($table_name,$id)
    {
        $query="Delete from $table_name WHERE id=$id";
        if($this->conn->query($query)===TRUE)
        {
            echo '<script> alert("'.$msg.'");</script>';
        }
        else
        {
            echo '<script> alert("'.$this->conn->error.'");</script>' ;
        }
    }
}
?>