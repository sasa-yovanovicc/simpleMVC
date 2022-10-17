<?php 
class Autoloader {
    static public function loader($className) {
        $dir = __DIR__.'/';
        foreach ( scandir( $dir ) as $file ) {
            $filename = "src/" . str_replace("\\", '/', $className) . ".php";
            if (file_exists($filename)) {
                include($filename);
                // echo 'DEBUG  '. $filename.'<br/>';
                if (class_exists($className)) {
                    //echo 'DEBUG  '. $filename.' | '.$className.'<br/>';
                    return TRUE;
                }
            }
            return FALSE;
        }
    }
}
spl_autoload_register('Autoloader::loader');

/*
spl_autoload_register( 'autoload' );
 
  
function autoload( $class, $dir = null ) {

  if ( is_null( $dir ) )
  //$dir = '/path/to/project';
  
  $dir = __DIR__.'/';
  
  
  foreach ( scandir( $dir ) as $file ) {

    // directory?
    if ( is_dir( $dir.$file ) && substr( $file, 0, 1 ) !== '.' ) {
        echo $class.' | '.$dir.$file.'<br/>';
        autoload( $class, $dir.$file.'/' );
    }
      

    // php file?
    if ( substr( $file, 0, 2 ) !== '._' && preg_match( "/.php$/i" , $file ) ) {

      // filename matches class?
      if ( str_replace( '.php', '', $file ) == $class || str_replace( '.class.php', '', $file ) == $class ) {

          include $dir . $file;
      }
    }
  }
}
*/
?>