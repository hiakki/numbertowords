<?php
$n = $_GET["number"];

$l1 = array('00' => '', 
			'01' => 'one', 
			'02' => 'two', 
			'03' => 'three', 
			'04' => 'four', 
			'05' => 'five', 
			'06' => 'six', 
			'07' => 'seven', 
			'08' => 'eight', 
			'09' => 'nine', 
			'10' => 'ten', 
			'11' => 'eleven', 
			'12' => 'twelve', 
			'13' => 'thirteen', 
			'14' => 'fourteen', 
			'15' => 'fifteen', 
			'16' => 'sixteen', 
			'17' => 'seventeen', 
			'18' => 'eighteen', 
			'19' => 'nineteen');

$l2 = array('', '', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'Quintillion', 'Sextillion', 'Septillion', 'Octillion', 'Nonillion', 'Undecillion', 'Duodecillion', 'Tredecillion', 'Quatttuor-decillion', 'Quindecillion', 'Sexdecillion', 'Septen-decillion', 'Octodecillion', 'Novemdecillion', 'Vigintillion', 'Centillion');

$a = (string)$n;
$l = strlen($a);
$i = floor(($l-1)/3);
$j = $l%3;
$k = $j;

if ($n == 0) {
	echo 'zero';
	exit;
}
do {
	$p = $i*3;
	if ($j == 1) {
		$b[$p+1] = $b[$p+2] = 0;
		$b[$p+0] = $a[0];
	}

	elseif ($j == 2) {
		$b[$p+0] = $a[1];
		$b[$p+1] = $a[0];
		$b[$p+2] = 0;
	}
	
	elseif ($j == 0) {
		$b[$p+0] = $a[$k+2];
		$b[$p+1] = $a[$k+1];
		$b[$p+2] = $a[$k];
		$k += 3;
	}
	
	if ($b[$p+2].$b[$p+1].$b[$p+0] < 100) {
		if ($b[$p+1].$b[$p+0] < 20) {		
			echo $l1[$b[$p+1].$b[$p+0]];
		}
		elseif ($b[$p+1].$b[$p+0] >= 20) {
			echo $l2[$b[$p+1]]." ".$l1['0'.$b[$p+0]];
		}
	}

	elseif ($b[$p+2].$b[$p+1].$b[$p+0] >= 100) {
		echo $l1['0'.$b[$p+2]]." ".$l2[10]." ";
		if ($b[$p+1].$b[$p+0] < 20) {		
			echo $l1[$b[$p+1].$b[$p+0]];
		}
		elseif ($b[$p+1].$b[$p+0] >= 20) {
			echo $l2[$b[$p+1]]." ".$l1['0'.$b[$p+0]];
		}
	}
	if ($i > 0 && $b[$p+2].$b[$p+1].$b[$p+0] != 000) {
		echo " ".$l2[10+$i]." ";
	}
	$j = 0;
	$i--;
} while ($i >= 0)
?>
