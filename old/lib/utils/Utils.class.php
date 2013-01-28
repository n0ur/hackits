<?php
class Utils {
    public static function queryLog(){
        if(DEVMODE) printf("
            <script>
                %s.map(function(a){console.log(a.time, a.query)});
            </script>", json_encode(PDOMySQL::getLog()));
    }
}
