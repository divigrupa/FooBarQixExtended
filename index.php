<?php

require __DIR__ . '/vendor/autoload.php';


if (getallheaders()['Content-Type'] == 'application/json') {	
	$d = json_decode(file_get_contents('php://input'), true);
	$r = null;
	
	$q = array();
	parse_str($_SERVER['QUERY_STRING'], $q);
	
	if (is_array($d) && is_string($d['function']) && is_array($d['args']) && !isset($q['_8ab4d031247f_returnError'])) {
		$fn = 'api'.ucfirst($d['function']);
		try {
			$r = function_exists($fn) ? ['result' => call_user_func_array($fn, $d['args'])] : ['error' => 'noFunction'];
		}
		catch (ExceptionWithValue $e) {
			$r = ['error' => [
					'exception' => 'ExceptionWithValue', 
					'value' => $e->value
				]
			];
			
			if ($e->type != null) $r['error']['type'] = $e->type;
		}
		
	}
	else $r = ['error' => 'noArgs'];
	
	echo json_encode($r);
}
else {	
	try {
		var_dump(apiPostCallFunction('fooBarQix', [15*7]));
	}
	catch (ExceptionWithValue $e) {
		echo get_class($e) . ': '; 
		if ($e->type != null) print_r($e->type);
		
		echo '<br/>';
		print_r($e->value);
	}
}


function apiFooBarQix(int $n)
{
	if (!($n >= 0)) throw new ExceptionWithValue('n < 0');
	
	$a = [];
	if ($n % 3 == 0) $a[] = 'Foo';
	if ($n % 5 == 0) $a[] = 'Bar';
	if ($n % 7 == 0) $a[] = 'Qix';
	
	return implode(', ', $a);
}

