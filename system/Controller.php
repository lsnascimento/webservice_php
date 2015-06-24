<?php

class Controller{
    
    protected function loadModel($nome, $apelido = ''){

        $arquivo = MODEL_PATH . '/' . $nome . '.php';
        
        if( !file_exists($arquivo) ){
            $this->error("Houve um erro. Esse Model $nome não existe.");
        }

        require_once $arquivo;

        $class_nome = PREFIX_MODEL . ucfirst($nome);

        if(class_exists($class_nome)){
            $this->$class_nome = new $class_nome();    

            if( $apelido != '' ){
                $this->$apelido =& $this->$class_nome;
            }
        }else{
            $this->error("A classe $class_nome não foi encontrada no modelo $nome");
        }    
        
    }
    
    protected function error($msg){
        throw new Exception($msg);
    }
    
}
