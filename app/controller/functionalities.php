<?php 
    namespace App\Controller;
    
    class Functionalities {
        public static function Renderer($route, $routing) {
            //  Check if the route has children. ex: register/verification/blah-blah-blah;
            $r = explode('/', $route); 

            $folder = $r[0];
            
            // ReUsable function for css routing
            function Mimes($r){
                // check style for css
                if(preg_match('/.css/', $r)) {
                    header('content-type: text/css; charset=utf-8');
                    $dir = 'src/'. $r;
                    require_once $dir;  
                    return;
                }
                
                // check for javascript
                if(preg_match('/.js/', $r)) {
                    header('content-type: text/javascript; charset=utf-8');
                    $dir = 'src/'. $r;
                    require_once $dir;  
                    return;
                }
            }
            
            // Handle routing for css and javascript file.
            // Since their folder is located @ src && src/assets 
            // Any other route should be discarded
            if(preg_match('/^(assets|style)/', $route)) {
                Mimes($route);
            }else if(!preg_match('/^(assets|style)/', $route) && preg_match('/(assets|style)/', $route)) {
                $broken_route = preg_split('/(style.css|assets)/', $route); 
                // Pick the first part and throw it away; Reconfigure route
                $route = str_replace($broken_route[0], '', $route);
                Mimes($route);
            }
        
            
            // Target entry with title or without;
            if($route === '') {
                $rep = '/';
                $dir = 'src/';
                $entry = array_key_exists("entry", $routing[$rep]) ? $routing[$rep]['entry'] : $routing[$rep];
                $title = array_key_exists("title", $routing[$rep]) ? $routing[$rep]['title'] : null;
                return Functionalities::Open($dir . $entry, $title);
             }
             
             
            //  If route exist in register
             $views = array_key_exists('@'.$route, $routing) ? '@' : '*';
             switch ($views) {
                    
                case '@':
                    # redirect to app
                    $rep = '@'.$route;
                    $dir = 'src/views/';
                    $entry = array_key_exists("entry", $routing[$rep]) ? $routing[$rep]['entry'] : $routing[$rep];
                    $title = array_key_exists("title", $routing[$rep]) ? $routing[$rep]['title'] : '';
                    Functionalities::Open($dir . $entry, $title);
                    break;
                    
                case '*':
                    # redirect to 404
                    $rep = '*';
                    $dir = 'src/views/';
                    $entry = array_key_exists("entry", $routing[$rep]) ? $routing[$rep]['entry'] : $routing[$rep];
                    $title = array_key_exists("title", $routing[$rep]) ? $routing[$rep]['title'] : null;
                    Functionalities::Open($dir . $entry, $title);
                    break;
                 
                 default:
                     # code...
                     break;
             }
        }
        
        private static function Open($goto, $title) {
            if(!file_exists($goto)) {
                echo $goto . ', not found on src directory';
                header("HTTP/1.1 404 Not Found");
                return;
            }else {
                // Render on app.php
                $view = 'src/views/';
                $component = 'src/components/';
                session_start();
                include_once '_app.php';
            }
        }
        
        
        
        
    }
?>