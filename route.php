<?php
    use App\Controller\Functionalities as Functions;
    
    class Route {
        private static function Register() {
            return [
                "/" => [
                    "entry" => "index.php",
                    "title" => "TaskMan | Home"
                ],
                
                "@task" =>  [
                    "entry" => "task.php",
                    "title" => "TaskMan | Task application",
                ],
                
                "@register" =>  [
                    "entry" => "register.php",
                    "title" => "TaskMan | Register",
                ],
                
                "@login" =>  [
                    "entry" => "login.php",
                    "title" => "TaskMan | Login"
                ],
                
                "*" => [
                    "entry" => "404.php",
                    "title" => "Lost Page"
                ],
            ];
        }
        
        public static function render(String $route) {
            // check in folder and file for directory.
            $registerRouter = Route::Register();      
            Functions::Renderer($route, $registerRouter);
        }
    }
?>