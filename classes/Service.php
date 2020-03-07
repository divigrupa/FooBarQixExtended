<?php
class Service
{
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var array
	 */
	public $config;

	/**
	 * Service constructor.
	 * @param int $id
	 */
	public function __construct(int $id)
	{
		$this->id = $id;
		$this->config = $this->makeConfig();
	}

	private function makeConfig() : array
	{
		switch ($this->id) {
			case 1:
				return [
					'divider' => [
						['number' => 3, 'string' => 'Foo'],
						['number' => 5, 'string' => 'Bar'],
						['number' => 7, 'string' => 'Qix'],
					],
					'appender' => [
						['number' => 3, 'string' => 'Foo'],
						['number' => 5, 'string' => 'Bar'],
						['number' => 7, 'string' => 'Qix'],
					],
					'splitter' => ',',
				];

			case 2:
				return [
					'divider' => [
						['number' => 8, 'string' => 'Inf'],
						['number' => 7, 'string' => 'Qix'],
						['number' => 3, 'string' => 'Foo'],
					],
					'appender' => [
						['number' => 3, 'string' => 'Foo'],
						['number' => 8, 'string' => 'Inf'],
						['number' => 7, 'string' => 'Qix'],
					],
					'sum' => [
						['number' => 8, 'string' => 'Inf'],
					],
					'splitter' => ';',
				];
			default:
				trigger_error("Service id must be 1 or 2", E_USER_WARNING);
				die;
		}
	}
}

