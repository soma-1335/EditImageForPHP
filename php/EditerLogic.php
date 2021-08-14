<?php

/** 画像の編集に関するCSSを作成するクラス */
class EditerLogic{

    private $formParam;

    function __construct($array){
        $this -> formParam = $array;        
    }

    function getFilters(){

        echo 'filter: sepia('.(empty($this -> formParam['sepia']) ? 0 : $this -> formParam['sepia']).'%) ';
        echo 'brightness('.(empty($this -> formParam['brightness']) ? 100 : $this -> formParam['brightness']).'%) ';
        echo 'saturate('.(empty($this -> formParam['saturate']) ? 100 : $this -> formParam['saturate']).'%) ';
        echo 'contrast('.(empty($this -> formParam['contrast']) ? 100 : $this -> formParam['contrast']).'%) ';
        echo 'blur('.(empty($this -> formParam['blur']) ? 0 : $this -> formParam['blur']).'px);';
    }
}

?>