<?php
	mb_internal_encoding('UTF-8');
	
	function classes_loader ( $classname ) {
		// class loaded?
		if ( !class_exists($classname) ) {
			// classes folder
			$classes['classes'] 	= realpath($_SERVER['DOCUMENT_ROOT'].'/classes/');
			$classes['self']	 	= getcwd();
			
			// ClassName.class.php in /classes/ or classname.php in this folder
			$class_path['classes']		= $classes['classes'].'/'.$classname.'.class.php';
			$class_path['self']			= $classes['self'].'/'.strtolower($classname).'.php';
			
			$file_to_include = '';
			// check this
			foreach ( $class_path as $class_file ) {
				if ( file_exists($class_file) ) {
					$file_to_include = $class_file;
				}
			}
			
			// load class
			if ( $file_to_include && !class_exists($classname) ) {
				include_once( $file_to_include );
			} else {
				echo 'Class '.$classname.' not found in includes path: '.PHP_EOL.implode(PHP_EOL,$classes).PHP_EOL;
			}
		}
	}
	
	spl_autoload_register('classes_loader');
?>