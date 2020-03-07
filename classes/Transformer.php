<?php
class Transformer
{
	private $config;
	private $splitter;

	/**
	 * Transformer constructor.
	 * @param int $id
	 */
	public function __construct(int $id = 1) {
		$service = new Service($id);
		$this->config = $service->config;

		$splitter = $service->config['splitter'] ?? null;
		$this->splitter = !empty($splitter) ? $splitter . ' ' : '';
	}

	/**
	 * @param int $input
	 * @return string
	 */
	public function fullTransform(int $input): string {
		$result = array_filter([
			$this->divTransform($input, false),
			$this->attachTransform($input, false)
		]);
		$mergedResult = $this->resultMerge($result, $input, true);
		return $mergedResult . $this->sumTransform($input);
	}

	/**
	 * @param int $input
	 * @param bool $needNumber
	 * @return string
	 */
	public function divTransform(int $input, bool $needNumber = true): string {
		$result = [];
		if ($input) {
			foreach ($this->config['divider'] as $case) {
				if (!fmod($input, $case['number'])) {
					$result[] = $case['string'];
				}
			}
		}
		return $this->resultMerge($result, $input, $needNumber);
	}

	/**
	 * @param int $input
	 * @param bool $needNumber
	 * @return string
	 */
	public function attachTransform(int $input, bool $needNumber = true): string {
		$result = [];
		if (!empty($input)) {
			$charRow = (string) abs($input);
			$charArray = str_split($charRow);

			foreach ($charArray as $char) {
				foreach ($this->config['appender'] as $case) {
					if (!fmod($char, $case['number'])) {
						$result[] = $case['string'];
					}
				}
			}
		}
		return $this->resultMerge($result, $input, $needNumber);
	}

	/**
	 * @param int $input
	 * @return string
	 */
	public function sumTransform(int $input): string {
		$result = [];
		if (!empty($input)) {
			$charRow = (string) abs($input);
			$charArray = str_split($charRow);
			foreach ($this->config['sum'] ?? [] as $case) {
				if (array_sum($charArray) === $case['number']) {
					$result[] = $case['string'];
				}
			}
		}
		return implode('', $result);
	}

	/**
	 * @param array $result
	 * @param $input
	 * @param bool $needNumber
	 * @return string
	 */
	public function resultMerge(array $result, $input, bool $needNumber = true): string {
		if (!empty($result)) {
			return implode($this->splitter, $result);
		}
		return $needNumber ? $input : '';
	}
}

