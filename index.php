<?php

require __DIR__ . '/vendor/autoload.php';


if (getallheaders()['Content-Type'] == 'application/json') {	
	$d = json_decode(file_get_contents('php://input'), true);
	$r = null;
	
	$q = array();
	parse_str($_SERVER['QUERY_STRING'], $q);
	
	if (is_array($d) && is_string($d['function']) && is_array($d['args']) && !isset($q['_8ab4d031247f_returnError'])) {
		$fn = 'api'.ucfirst($d['function']);
		ServiceCall::$version = isset($d['version']) && is_int($d['version']) ? $d['version'] : 1;
		
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
	// find number which has all digits and multiples
	$n = '873';
	for ($i=0; $i<1000; $i++) {
		$v = intval($n . str_pad($i, 3, '0', STR_PAD_LEFT));
		if ($v % 168 == 0) echo $v.' ';
	}
	echo '<br/>';
	
	// find number which has all digits and no multiples
	$i = 1;
	$found = 0;
	while (true) {
		$s = strval($i);
		if (strpos($s, '8') !== false && strpos($s, '7') !== false && strpos($s, '3')  !== false && 
				$i % 8 > 0 && $i % 7 > 0 && $i % 3 > 0) {
			echo $i.' ';
			$found++;
			if ($found == 10) break;
		}
		
		$i++;	
	}	
	echo '<br/>';
	
	try {
		$n = 1873;
		var_dump($n);
		var_dump(apiPostCallFunction('infQixFoo', [$n]));
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
	
	if (ServiceCall::$version >= 2) {
		$s = ''.$n;
		for ($i=0; $i<strlen($s); $i++) {			
			if ($s[$i] == '3') $a[] = 'Foo';
			else if ($s[$i] == '5') $a[] = 'Bar';
			else if ($s[$i] == '7') $a[] = 'Qix';
		}		
	}
	
	return implode(', ', $a);
}


function apiInfQixFoo(int $n)
{
	if (!($n >= 0)) throw new ExceptionWithValue('n < 0');
	
	$a = [];
	if ($n % 8 == 0) $a[] = 'Inf';
	if ($n % 7 == 0) $a[] = 'Qix';
	if ($n % 3 == 0) $a[] = 'Foo';
	
	$s = strval($n);
	for ($i=0; $i<strlen($s); $i++) {
		if ($s[$i] == '3') $a[] = 'Foo';
		else if ($s[$i] == '8') $a[] = 'Inf';
		else if ($s[$i] == '7') $a[] = 'Qix';
	}		
	
	return implode('; ', $a);
}


class ServiceCall
{
	static int $version;
}