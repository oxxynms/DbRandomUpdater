<?php
class ConnectDB {
    private $con;
    private $update;

function connect($ip, $user, $pw, $dbName){
    $this->con = mysqli_connect($ip, $user, $pw, $dbName);
    if (! $this->con){
        return "falha na conexão";
        die ("falha na conexao com o banco de dados");
    }
    return $this->con;
}

function update($con, $query){
    $this->update = mysqli_query($con, $query);
    if(!$this->update){
        die("falha ao fazer update");
    }else{
        return "<br>update com sucesso!";
    }
}

}