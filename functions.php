<?php

function hello() {
	$args = func_get_args();
	
	if(count($args) >= 1) {
		echo "Hello " . $args[0];
	} else {
		echo "Hello World";
	}
}


// Function someGlobalFunction()
// Created by the Make::Func() script.
function someGlobalFunction() {
	echo "This is some global function.";
}

