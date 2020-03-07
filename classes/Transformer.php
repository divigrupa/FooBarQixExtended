<?php
class Transformer
{
	/**
	 * @param int $number
	 * @return string
	 */
	public static function fullTransform(int $number): string
	{
		$result = array_filter([
			self::divTransform($number, false),
			self::attachTransform($number, false)
		]);
		return !empty($result)
			? implode(', ', $result)
			: $number;
	}

	/**
	 * @param int $number
	 * @param bool $needNumber
	 * @return string
	 */
	public static function divTransform(int $number, bool $needNumber = true): string
	{
		$result = [];
		if ($number) {
			if (!fmod($number,3)) $result[] = 'Foo';
			if (!fmod($number,5)) $result[] = 'Bar';
			if (!fmod($number,7)) $result[] = 'Qix';
		}

		if (!empty($result)) {
			return implode(', ', $result);
		}
		return $needNumber ? $number : '';
	}

	/**
	 * @param int $number
	 * @param bool $needNumber
	 * @return string
	 */
	public static function attachTransform(int $number, bool $needNumber = true): string
	{
		$result = [];
		if (!empty($number)) {
			$charRow = (string) abs($number);
			$charArray = str_split($charRow);

			foreach ($charArray as $char) {
				if (!fmod($char, 3)) $result[] = 'Foo';
				if (!fmod($char, 5)) $result[] = 'Bar';
				if (!fmod($char, 7)) $result[] = 'Qix';
			}
		}
		if (!empty($result)) {
			return implode(', ', $result);
		}
		return $needNumber ? $number : '';
	}
}

