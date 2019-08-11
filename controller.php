<?php
require_once('QueryPreparer.php');
require_once('ConnectDB.php');

//connect mySQL
$ip = $_POST["ip"];
//$port = $_POST["port"];
$user = $_POST["user"];
$pw = $_POST["pw"];
$dbName = $_POST["dbName"];
$tblName = $_POST["tblName"];
$update;
$con;
$use;
//columns
$clnName = $_POST['arraycolumn'];
$clnType = $_POST['types'];
$clnLen = $_POST['clnLen'];
$date = $_POST['date'];
$date2 = $_POST['date2'];
$d1;
$d2;
$numOfRows = $_POST['numOfRows'];
$queryPreparer;
$aux;
$query;
//queryConstructor
$x = 0;
$qValue = array();
$count = 0;
//cria valores aleatórios
while($x < $numOfRows){
    $query = "insert into $tblName ( ";
    $count = 0;
    while ($count < count($clnName)){
        switch ($clnType[$count]){
            case 'int':
            $queryPreparer = new QueryPreparer;
            $aux = $clnLen[$count];
            $qValue[$count] = $queryPreparer->magicNum($aux);
            unset($queryPreparer);
            break;
            case 'varchar':
            $queryPreparer = new QueryPreparer;
            $aux = $clnLen[$count];
            $qValue[$count] = $queryPreparer->magicAlpha($aux);
            unset($queryPreparer);
            break;
            case 'name':
            $queryPreparer = new QueryPreparer;
            $aux = $clnLen[$count];
            $qValue[$count] = $queryPreparer->magicNames($aux);
            unset($queryPreparer);
            break;
            case 'date':
            $queryPreparer = new QueryPreparer;
            $qValue[$count] = $queryPreparer->magicDate($date[0], $date2[0]);
            unset($queryPreparer);
            break;
            default:
            echo "esse tipo não existe";
            $qValue[$count] = null;
    }
    $count++;

    }
//add column names in query
    $count =0;
    while($count < count($clnName)){
        $query .= $clnName[$count] . ", ";
        $count++;
    }
//backspace
    $query = substr($query, 0, -2);

//add values in querry

    $query .= ") values (";
    $count =0;

    while($count < count($clnName)){
        $query .= '"' . $qValue[$count] . '", ';
        $count++;
    }
//backspace
    $query = substr($query, 0, -2);
    $query .= ");";

//connect / updatequery

    $con = new ConnectDB;
    $con = $con->connect($ip, $user, $pw, $dbName);
    $update = new ConnectDB;
    $update->update($con, $query);
    unset($con);
    unset($update);
    $x++;
}
echo "update realizado com sucesso!";



