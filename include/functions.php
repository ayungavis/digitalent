<?php session_start();

	require_once(__DIR__ . '/lib/db.class.php');
	require_once('config.php');

	function diagnosis($string) {
		$diagnosis = array(
			"adenosis",
			"ductal_carcinoma",
			"fibroadenoma",
			"lobular_carcinoma",
			"mucinous_carcinoma",
			"papillary_carcinoma",
			"phyllodes_tumor",
			"tubular_adenoma"
		);
		$diagnosis_text = array(
			"Adenosis",
			"Ductal Carcinoma",
			"Fibroadenoma",
			"Lobular Carcinoma",
			"Mucinous Carcinoma",
			"Papillary Carcinoma",
			"Phyllodes Tumor",
			"Tubular Adenoma"
		);
		$length = count($diagnosis);
		for ($i = 0; $i < $length; $i++) { 
			if($string == $diagnosis[$i]) return $diagnosis_text[$i];
		}
	}

	/**
	 *	Month
	 *	To show month format from database which the format is timestamp
	 *
	 *	@param 		integer 		month
	 *
	 */
	function month($int) {
		$month = array(
        	" ", 
        	"January", 
        	"February", 
        	"March", 
        	"April", 
        	"May", 
        	"June", 
        	"July", 
        	"August", 
        	"September", 
        	"October", 
        	"November", 
        	"December"
        );

        $result = $month[$int];
        return $result;
	}

	/**
	 *	Show date
	 *	To show date format from database which the format is timestamp
	 *
	 *	@param 		string 		date
	 *
	 */
	function show_date($str) {
        $y = explode(' ', $str);
        $x = explode('-', $y[0]);
        $date = "";    
        $m = (int)$x[1];
        $m = month($m);
        $st = array(1, 21, 31);
        $nd = array(2, 22);
        $rd = array(3, 23);

        if(in_array( $x[2], $st)) {
                $date = $x[2].'st';
        }
        else if(in_array( $x[2], $nd)) {
                $date .= $x[2].'nd';
        }
        else if(in_array( $x[2], $rd)) {
                $date .= $x[2].'rd';
        }
        else {
                $date .= $x[2].'th';
        }
		// $date .= ' ' . $m . ' ' . $x[0];
        $date = $x[2]. ' ' . $m . ', ' . $x[0];

        return $date;
	}
?>