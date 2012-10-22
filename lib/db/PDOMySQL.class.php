<?php

if(!class_exists('PDO')){
    throw new Exception('PDO not found');
}

class PDOMySQL {
    private static $log = array();

    private static $rConn;
    private static $wConn;

    public function __construct($o){
        try {
            self::$rConn = new PDO("mysql:host={$o['host']};port={$o['port']};dbname={$o['db']}", $o['readuser'], $o['readpass']);
            self::$wConn = new PDO("mysql:host={$o['host']};port={$o['port']};dbname={$o['db']}", $o['writeuser'], $o['writepass']);
        } catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_WARNING);
        }
    }

    public function __destruct(){

    }

    public static function getLog(){
        return self::$log;
    }

    private static function log($log){
        self::$log[] = $log;
    }

    public function count($query, $params){
        $r = $this->getOne("select count(1) as `count` from ".$query, $params, 1);
        return $r ? $r['count'] : null;
    }

    public function getOne($query, $params){
        $r = $this->getAll($query, $params, 1);
        return $r ? $r[0] : null;
    }

    public function getAll($query, $params = null, $limit = null){
        $query = $query[count($query)-1] === ';'
            ? substr($query, 0, -1)
            : $query;
        $now = microtime(true);
        $query .= $limit ? " LIMIT $limit" : '';
        try{
            $st = self::$rConn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $st->setFetchMode(PDO::FETCH_ASSOC);
            if($params) array_walk($params, function($val, $key) use ($st){
                $st->bindParam($key, $val);
            });
            if($st->execute()){
                self::log(array('query' => $query, 'time' => microtime(true) -  $now));
                return $st->fetchAll();
            }
        } catch(Exception $e){
            trigger_error($e->getMessage(), E_USER_WARNING);
        }
        $error = $st->errorInfo();
        if(intval($error[0]) > 0){// catch sql syntax errors
            trigger_error($error[2], E_USER_WARNING);
        }
        $st->closeCursor();
    }
}
