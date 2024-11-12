<?php

    include("config.php");


    class Database{
        
        //properties
        public $server_name = SERVER;
        public $username = USERNAME;
        public $password = PASSWORD;
        public $db_name = DATABASE_NAME;
        
        public $error;
        public $conn;
        
        
        
        //methods
        public function __construct(){
            
            $this->dbConnect();
        }
        
        
        //database connection 
        public function dbConnect(){
            
            $this->conn = mysqli_connect($this->server_name, $this->username, $this->password, $this->db_name);
            
            if($this->conn){
                
            }else{
                $this->error = "Database Connection Failed";
                
                return false;
            }
            
        }
        
        
        //insert function
        public function insert($sql){
            
            $result = mysqli_query($this->conn, $sql) or die ($this->conn->error.__LINE__);
            
            if($result){
                return $result;
            }else{
                return false;
            } 
            
        }
        
        
        //select function
        public function select($sql){
            
            $result = mysqli_query($this->conn, $sql) or die ($this->conn->error.__LINE__);
            
            if(mysqli_num_rows($result) >0){
                return $result;
            }else{
                return false;
            }
            
        }
        
        
        
        //update function
        public function update($sql){
            
            $result = mysqli_query($this->conn, $sql) or die ($this->conn->error.__LINE__);
            
            if($result){
                return $result;
            }else{
                return false;
            } 
            
        }
        
        
        //delete function
        public function delete($sql){
            
            $result = mysqli_query($this->conn,$sql) or die ($this->conn->error.__LINE__);
            
            if($result){
                return $result;
            }else{
                return false;
            } 
            
        }
        
    }









?>