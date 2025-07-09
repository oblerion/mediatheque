<?php
class DBManager
{
    private $_db;
    private $_isConnect;
    private $_error;
    function __construct($db)
    {
        try{
            $this->_db= new PDO(
            "mysql:dbname=$db;host=localhost;port=3306","root","", 
            array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\'',
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
            ));
            $this->_isConnect=true;
            $this->_error="";
        }
        catch(Exception $e)
        {
            $this->_isConnect=false;
            $this->_error="error : ".$e;
        }
    }
    function GetError()
    {
        return $this->_error;
    }
    function IsConnect()
    {
        return $this->_isConnect;
    }
    function Prepare($sql)
    {
        return $this->_db->prepare($sql);
    }
};
?>