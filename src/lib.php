<?php

function apiPostCallFunction(string $function, array $args=null)
{	 
 	$r = httpRequest('POST', Config::$values['apiUrl'], [
		'function' => $function,
		'args' => $args != null ? $args : []
	]);
	 
	if (!isset($r['result'])) throw new ExceptionWithValue($r, 'apiCall');
	
	return $r['result'];
}


function httpRequest(string $method, string $url, $data)
{
	$curl = curl_init();
	if ($method != "POST") return null;
	
	curl_setopt($curl, CURLOPT_POST, 1);
	if ($data)
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
	
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
	));
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	
	$result = curl_exec($curl);
	curl_close($curl);
	
	if (!$result) throw new ExceptionWithValue("curl_exec", "httpRequest");	
	
	$v = json_decode($result, true);
	if ($v == null) throw new ExceptionWithValue($result, "wrongJson");
	
	return $v;
}



class ExceptionWithValue extends Exception
{
	public $value;
	public $type;
	
	public function __construct($value=null, $type=null, $message = '', $code = 0, Throwable $previous = null)
	{
		$this->value = $value;
		$this->type = $type;
		
		parent::__construct($message, $code, $previous);
	}
}