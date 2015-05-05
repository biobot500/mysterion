<?php
class MVC extends BASE {
    
    public function __construct() {
    } 
    public function View($page_name, $data_array) {
        //Convert array into variable
        foreach ($data_array as $k=>$v) {
            ${$k} = $v;
        }
        //load the view
        require_once VIEW_PATH.'/'.$page_name.'.php';
    }
    public function LoadModel($model_name, $params)
    {
        include MODEL_PATH.'/'.$model_name.'.php';
        $obj = new $model_name($params);
        return $obj;
    }
    public function LoadLibrary($lib_name, $params)
    {
        include LIBRARY_PATH.'/'.$lib_name.'.php';
        $obj = new $lib_name($params);
        return $obj;
    }
}
?>