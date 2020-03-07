<?php
	header('Content-Type: text/html; charset=utf-8');
	require_once 'initialize.php';

	$getData = [
		'test'      => $_GET['test'] ?? 0,
		'number'    => $_GET['number'] ?? 0,
		'serviceId' => $_GET['service'] ?? 1,
	];

	if (!empty($getData['test'])) {
		require_once 'res/tests.php';
		die;
	}

	if (!empty($getData['number'])) {
		$transformer = new Transformer($getData['serviceId']);
		$result = [
			'divider' => $transformer->divTransform($getData['number']),
			'attacher' => $transformer->attachTransform($getData['number']),
			'summer' => $transformer->sumTransform($getData['number']),
			'full' => $transformer->fullTransform($getData['number']),
		];
		d($result);
	}
?>
