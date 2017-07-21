<?php

// File: namespaces/Account.php

function uuid() {
	echo "Generating UUIDv4...\nDone.\n\nUUID: ";
	echo sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
		// 32 bits for "time_low"
		mt_rand(0, 0xffff), mt_rand(0, 0xffff),

		// 16 bits for "time_mid"
		mt_rand(0, 0xffff),

		// 16 bits for "time_hi_and_version",
		// four most significant bits holds version number 4
		mt_rand(0, 0x0fff) | 0x4000,

		// 16 bits, 8 bits for "clk_seq_hi_res",
		// 8 bits for "clk_seq_low",
		// two most significant bits holds zero and one for variant DCE1.1
		mt_rand(0, 0x3fff) | 0x8000,

		// 48 bits for "node"
		mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
	);
}

function login() {
	// Define a users array with dummy account details.
	$users = [
		'david.hunter' => [
			'password' => 'letmein',
			'name' => 'David Hunter'
		],
		'joe.blogs' => [
			'password' => 'password',
			'name' => 'Joe Blogs'
		]
	];
	
	// Get the arguments passed to the function, if any.
	$args = func_get_args();
	
	// Check if two arguments were provided. These will be the username and password in that order.
	if(count($args) >= 2) {
		// Save the first and second arguments to username and password variables for later.
		$username = $args[0];
		$password = $args[1];
		
		// Check if the username and password passed matches an account in the users array.
		if(array_key_exists($username, $users) && $users[$username]['password'] == $password) {
			// Username and Password are Correct.
			echo "Welcome back, " . $users[$username]['name'] . "!";
			
			// Return so we don't execute anything else.
			return;
		}
	}
	
	// Username and/or Password is Incorrect.
	echo "Incorrect Username and/or Password!";
}


// Function hashPass()
// Created by the Make::Func() script.
function hashPass() {
	$args = func_get_args();
	
	if(count($args) >= 1) {
		$password = $args[0];
		echo "Hashing password...\n";
		$hashedPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
		echo "Done.\n\nHashed Password: " . $hashedPassword;
	}
}

