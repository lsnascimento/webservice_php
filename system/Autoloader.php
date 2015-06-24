<?php

class Autoloader{
    
    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }
    
    private function loader($class_name){
        
        $class = str_replace('_', DIRECTORY_SEPARATOR, $class_name) . '.php';
        
        if( file_exists($class) ){
            require_once $class;
        }
        
        $classPath = stream_resolve_include_path($class);
        
        if( $classPath !== false ){
            require_once $classPath;
        }
    }
}