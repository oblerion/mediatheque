<?php 
function connexion(){
$ma_db= new PDO(
"mysql:dbname=mediatheque ;host=localhost;port=3306","root","", 
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES \'UTF8\'',
PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
)
);
return $ma_db;
}
