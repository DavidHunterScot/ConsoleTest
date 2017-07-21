<?php

// File: namespaces/Make.php

function Func() {
	$args = func_get_args();
	
	$namespace = "";
	$function = "";
	$file = "";
	
	if(count($args) >= 1) {
		// Assume first argument to be the function name.
		// Save it to a variable.
		$function = $args[0];
		
		// Check if new function is namespaced (contains double colon)
		if(strstr($args[0], "::")) {
			// Function is namespaced.
			
			// Explode function into parts to separate the namespace from the function.
			$func_parts = explode("::", $args[0]);
			
			// Save the parts to variables.
			$namespace = $func_parts[0];
			$function = $func_parts[1];
			
			// Check if a file with same name as namespace exists.
			if(file_exists("namespaces/" . $namespace . ".php")) {
				echo "Opening namespace...\n";
				
				$funcFile = fopen("namespaces/" . $namespace . ".php", "a");
				
				echo "Namespace " . $namespace . " opened.\n";
			} else {
				echo "Creating namespace...\n";
				
				$funcFile = fopen("namespaces/" . $namespace . ".php", "w");
				fwrite($funcFile, "<?php\n\n// File: namespaces/" . $namespace . ".php\n// Created by the Make::Func() script.\n");
				
				echo "Namespace " . $namespace . " created.\n";
			}
			
			$file = "namespaces/" . $namespace . ".php";
		} else {
			echo "Opening namespace.\n";
			
			$funcFile = fopen("functions.php", "a");
			$file = "functions.php";
			
			echo "Global namespace opened.\n";
		}
		
		require_once $file;
		if(function_exists($function)) {
			echo "Function already exists!\n";
		} else {
			echo "Generating function...\n";
		
			fwrite($funcFile, "\n\n// Function " . $function . "()\n// Created by the Make::Func() script.\nfunction " . $function . "() {\n\t\n}\n\n");
			
			echo "Function " . $function . "() generated.\n";
		}
		
		echo "Closing namespace...\n";
		fclose($funcFile);
		
		echo "Done.";
	} else {
		echo "Missing function name!\n";
	}
}
