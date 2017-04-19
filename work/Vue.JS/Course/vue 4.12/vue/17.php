<?php
$data = [
	[ 'id' => 1, 'title' => 'iphone 8' ],
	[ 'id' => 1, 'title' => 'Mac Pro' ],
];
die( json_encode(
	[
		'valid' => 1,
		'data'    => $data
	]
) );