<?php
// so we don't have to manually include classes, move classes that
// should be autoloaded into lib/*/ and name the file [className].class.php
function init(){
    global $__DEVS;
    spl_autoload_register(function($class){
        foreach(glob(dirname(__FILE__).'/../lib/*') as $path){
            $file = $path.'/'.$class.'.class.php';
            if(file_exists($file)){
                return require_once($file);
            }
        }
    });

//figure out if dev mode should be enabled
    foreach($__DEVS as $range){
        //check if remote client is in a dev range
        list ($subnet, $bits) = explode('/', $range);
        $subnet = ip2long($subnet);
        $mask = -1 << (32 - $bits);
        //go to next range unless client ip matches range
        if((ip2long($_SERVER['REMOTE_ADDR']) & $mask) !== $subnet &= $mask){ continue; }
        define('DEVMODE', true);
        error_reporting(E_ALL | E_STRICT);
        ini_set('display_errors', 1);
        $error_handler = function($no, $str, $file, $line, $context){ //show nicer errors and stack trace
            while(ob_get_level() > 1) ob_end_clean();
            printf('<pre class="trace" style="position:relative;padding:5px;background:#fbb;border:1px solid #f33;font-size: 1.2em;color:#000"
            >ERR: %s - %s in %s:%s',
                $no, $str, $file, $line);
            echo "\n\nSTACKTRACE:\n";
            array_map(function($a){
                printf("<b style='display:inline-block;width: 50%%;'>%s %s</b> fn: <b>%s</b>\n\n",
                    isset($a['file'])?$a['file']:'',
                    isset($a['line'])?$a['line']:'',
                    isset($a['function'])?$a['function']:'');
            }, debug_backtrace());
            echo '</pre>';
//        printf('
//            <div onclick="this.childNodes[0].style.display=\'block\'"><pre style="display:none;"> %s</pre>
//                Show ENV
//            </div>', print_r($context, true));
            echo '<script>$("pre.trace").appendTo("body");</script>';
            ob_end_flush();
            exit(1);
        };
        set_error_handler($error_handler, E_ALL | E_STRICT);
        register_shutdown_function(function() use ($error_handler){
            while(ob_get_level() > 1) ob_end_clean();
            $error = error_get_last();
            if($error && ($error['type'] & (E_ERROR | E_USER_ERROR | E_PARSE | E_CORE_ERROR
                | E_COMPILE_ERROR | E_RECOVERABLE_ERROR))){
                $error_handler($error['type'], $error['message'], $error['file'], $error['line'], $_ENV);
            }
        });
    }
}
init();
if(!defined('DEVMODE')) define('DEVMODE', false);
