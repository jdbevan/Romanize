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
			$roman = str_repeat('I', $num);
			
		} else if ($num == 4) {
			$roman = 'IV';
			
		} else if ($num >= 5 and $num < 9) {
			$roman = 'V' . str_repeat('I', $num-5);
			
		} else if ($num == 9) {
			$roman = 'IX';
			
		} else if ($num >= 10 and $num < 40) {
			$roman = str_repeat('X', $num/10);
			
		} else if ($num == 40) {
			$roman = 'XL';
			
		} else if ($num >= 50 and $num < 90) {
			$roman = 'L' . str_repeat('X', $num/10 - 5);
			
		} else if ($num == 90) {
			$roman = 'XC';
			
		} else if ($num >= 100 and $num < 400) {
			$roman = str_repeat('C', $num/100);
		
		} else if ($num == 400) {
			$roman = 'CD';
		
		} else if ($num >= 500 and $num < 900) {
			$roman = 'D' . str_repeat('C', $num/100 - 5);
		
		} else if ($num == 900) {
			$roman = 'CM';
		
		} else if ($num >= 1000) {
			$roman = str_repeat('M', $num/1000);
			
		}
		return $roman;
    }
}
