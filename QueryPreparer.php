<?php

class QueryPreparer {
    private $d1;
    private $d2;
    private $date1;
    private $date2;
    private $count;
    private $qint;
    private $qName;
    private $qDate;
    private $randNum;
    private $qAlpha;
    private $x;
    private $dicionary = array(
        'irineu', 'Ornella', 'Bruno', 'silva', 'coiso',
        'Joyce', 'Malu','Enzo', 'Analu', 'Fernando', 'Maria', 'Isis', 'Carlos', 'Eduardo', 'Louise',
        'Heloise', 'Lucas', 'Gabriel', 'Vitoria', 'Andre', 'Cecília', 'Jose', 'Ana', 'Liz', 'Yago', 'Joana',
	    'Luana', 'Anthony', 'Gabriel', 'Antônia', 'Ruan', 'Isabel',	'Miguel', 'Henrique', 'Bruna', 'Oliver'
     );
     private $alphaNumeric = array (
         'a', 'b', 'c', 'd', 'e', 'f', 'h', 'i', 'j', 'k',
        'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'x', 'z', 'w', 'y', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0'
        );

    //cria numeros aleatórios
    public function magicNum($qtd){
        while ($this->count < $qtd){
            $this->randNum = rand(0, 9);
            $this->qint = $this->qint .= $this->randNum;
            $this->count ++;
            }
        return $this->qint;
    }

    //cria nomes aleatórios
    public function magicNames($qtd){
        for ($x = 0; $this->x < $qtd; $this->x++){
        $this->randNum = rand(1, 35);
        $this->qName = $this->qName . ' ' . $this->dicionary[$this->randNum];
        }
        return $this->qName;
    }
    //cria datas aleatorias com intervalo de tempo
    public function magicDate($date1, $date2){
        $this->d1 = strtotime($date1);
        $this->d2 = strtotime($date2);
        $this->randNum = $this->d2 - $this->d1;
        $this->randNum = rand(0, $this->randNum);
        $this->qDate = $this->d1 + $this->randNum;
        return date('Y-m-d',  $this->qDate);    
    }
    //cria alphanumerico aleatório
    public function magicAlpha($qtd){
        for ($x = 0; $this->x < $qtd; $this->x++){
            $this->randNum = rand(0, 34);
            $this->qAlpha = $this->qAlpha . $this->alphaNumeric[$this->randNum];
            }
            return $this->qAlpha;

    } 

}
?>