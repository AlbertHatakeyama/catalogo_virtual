<?php 
/*if(($_SERVER['REMOTE_ADDR'] != "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1") and substr_count($_SERVER['REQUEST_URI'], "/sig/")){
    @header('Content-Type: text/html; charset=windows-1252');
}*/

@ini_set("auto_detect_line_endings", true);
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);

Class Connection {

    //PRODUÇÃO
    private   $server = "";
    private   $user = "";
    private   $pass = "";
    
    //LOCAL
    private   $local_server = "mysql:host=localhost;dbname=catalogo_virtual";
    private   $local_user = "root";
    private   $local_pass = "Mysql@2002";
    
    private   $options = array(
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                            PDO::ATTR_EMULATE_PREPARES => false,
                            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                        );
    protected $con;
    
    
    public function openConnection(){
        
        if($_SERVER['REMOTE_ADDR'] == "127.0.0.1" or $_SERVER['REMOTE_ADDR'] == "::1"){
            $server = $this->local_server;
            $user   = $this->local_user;
            $pass   = $this->local_pass;
        }
        else{
            $server = $this->server;
            $user   = $this->user;
            $pass   = $this->pass;
        }

        try{            
            $this->con = new PDO($server, $user, $pass, $this->options);
            return $this->con;
        }
        catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
    public function closeConnection(){
        $this->con = null;
    }
    
}