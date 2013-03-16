<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mukolla
 * Date: 15.03.13
 * Time: 22:55
 * To change this template use File | Settings | File Templates.
 */

class listenCore{
    private $filename;

    public $count_messages;
    public $last_add_messages;
    public $last_read_messages;

    function __construct($filename){
        $this->filename = $filename;
    }


    protected function getData(){
        return unserialize(file_get_contents($this->filename));
    }

    protected function saveData($data){
        file_put_contents($this->filename, serialize($data));
    }

}

class listen extends listenCore {
    public $messages = array();

    public function saveMessages($data){
        $this->saveData(array($data));
    }
}

$listen = new listen("stack001");

$listen->saveMessages("sdsd");

/*
$_POST['_listen'] = "setMessages";

if(isset($_POST['_listen'])){
    echo $listen->$_POST['_listen']($_POST);
}






