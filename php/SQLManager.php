<?php
include_once "DBManager.php";
class SQLManager
{
    private $_dbmanager;
    private $_list;
    function __construct($db)
    {
        $this->_dbmanager = new DBManager($db);
        $this->_list = [];
    }
    function Prepare($name,$sql)
    {
        $this->_list[$name] = $this->_dbmanager->Prepare($sql);
    }
    function Execute($name)
    {
        if(isset($this->_list[$name]))
        {
            $instru = $this->_list[$name];
            $instru->execute();
            $instru->SetFetchMode(PDO::FETCH_ASSOC);
            // on récupére un tab associatif avec comme clé le nom des colonnes
            return $instru->fetchAll();
        }
        return "";
    }
};

?>