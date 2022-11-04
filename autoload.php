
<?php
    class Register_AUTOLOAD {
        public static function autoload() {
            spl_autoload_register(function($files) {
                $file = strtolower($files) . '.php';
                if(file_exists($file)) {
                    include  $file;
                }else {
                    // Extend config
                    $splitFile = explode('\\', $file);
                    $src = 'src/';
                    
                    $getNewDir = implode('/', $splitFile);
                    if(file_exists($getNewDir) ) {
                        include $getNewDir;
                    }
                }
            });
        }
    }
    
    Register_AUTOLOAD::autoload()
?>

