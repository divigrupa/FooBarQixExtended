<?php
class Transformer
{
    /**
     * @param int $number
     * @return string
     */
	public static function divTransform(int $number): string
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
		return $number;
	}
}

