<?php

// Update the cache file
Episodes::writeCache();

// Send a response
http_response_code(201);
header('Content-Type: application/json');

$response = array(
	'status' => array(
		'code' => 201,
		'description' => 'Created'
	),
	'description' => 'Successfully updated the cache.'
);
echo json_encode($response, JSON_PRETTY_PRINT);