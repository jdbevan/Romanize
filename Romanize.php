<?php
class Romanize {
    private $romanNumber = '';
   
    public function __construct($number) {
		if (preg_match("/^[0-9]+$/", $number)) {
			$number = (string)$number;
			
			for($m=strlen($number), $u = $m-1, $i=0; $i<$m; $u--, $i++) {
				$multiplier = pow(10, $u);
				$value = (int)$number[$i] * $multiplier;
			
				$this->romanNumber .= $this->convert($value);
			}
		}
    }
    
    public function __toString() {
		return $this->romanNumber;
    }
    
    private function convert($num) {
		$roman = '';
		if ($num >= 1 and $num < 4) {
			//$roman = str_repeat('I', $num);
			$roman = json_decode('"\u216' . ($num - 1) . '"');
			
		} else if ($num == 4) {
			//$roman = 'IV';
			$roman = json_decode('"\u2163"');
			
		} else if ($num >= 5 and $num < 9) {
			//$roman = 'V' . str_repeat('I', $num-5);
			$roman = json_decode('"\u216' . ($num - 1) . '"');
			
		} else if ($num == 9) {
			//$roman = 'IX';
			$roman = json_decode('"\u2168"');
			
		} else if ($num >= 10 and $num < 40) {
			//$roman = str_repeat('X', $num/10);
			$roman = str_repeat( json_decode('"\u2169"'), $num/10);
			
		} else if ($num == 40) {
			//$roman = 'XL';
			$roman = json_decode('"\u2169\u216C"');
			
		} else if ($num >= 50 and $num < 90) {
			//$roman = 'L' . str_repeat('X', $num/10 - 5);
			$roman = json_decode('"\u216C"') . str_repeat( json_decode('"\u2169"'), $num/10 - 5);
			
		} else if ($num == 90) {
			//$roman = 'XC';
			$roman = json_decode('"\u2169\u216D"');
			
		} else if ($num >= 100 and $num < 400) {
			//$roman = str_repeat('C', $num/100);
			$roman = str_repeat( json_decode('"\u216D"'), $num/100);
		
		} else if ($num == 400) {
			//$roman = 'CD';
			$roman = json_decode('"\u216D\u216E"');
		
		} else if ($num >= 500 and $num < 900) {
			//$roman = 'D' . str_repeat('C', $num/100 - 5);
			$roman = json_decode('"\u216E"') . str_repeat( json_decode('"\u216D"'), $num/100 - 5);
		
		} else if ($num == 900) {
			//$roman = 'CM';
			$roman = json_decode('"\u216D\u216F"');
		
		} else if ($num >= 1000) {
			//$roman = str_repeat('M', $num/1000);
			$roman = str_repeat( json_decode('"\u216F"'), $num/1000);
		}
		return $roman;
    }
}
