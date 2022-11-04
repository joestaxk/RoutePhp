<?php
    
    class greet {
        public static function POST($req) {
             var_export($req['body']['username']);
        }
    }
    
?>