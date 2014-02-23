<?php

//deal with database
class SqlHelper {

    public $conn;
    public $dbname = "chat";
    public $username = "root";
    public $password = "root";
    public $host = "localhost";

    public function __construct() {
        $this->conn = mysql_connect($this->host, $this->username, $this->password);
        if (!$this->conn) {
            die("connection failed" . mysql_error());
        }
        mysql_select_db($this->dbname, $this->conn);
    }

    public function execute_dql($sql) {
        $res = mysql_query($sql, $this->conn) or die($sql);
        return $res;
    }

    public function execute_dql2($sql) {
        $arr = array();
        $res = mysql_query($sql, $this->conn) or die(mysql_error());
        //$res->$arr
        while ($row = mysql_fetch_assoc($res)) {
            $arr[] = $row;
        }
        //close $res
        //mysql_free_result($res);
        return $arr;
    }

    public function execute_dml($sql) {
        $b = mysql_query($sql, $this->conn) or die(mysql_error());
        if (!$b) {
            return 0;
        } else {
            if (mysql_affected_rows($this->conn) > 0) {
                return 1;
            } else {
                return 2;
            }
        }
    }

    public function close_connect() {
        if (!empty($this->conn)) {
            mysql_close($this->conn);
        }
    }

}
