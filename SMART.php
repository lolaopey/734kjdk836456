<?php


	//header('Content-Type: application/json');
	
#class that capture incoming data
class inputs{
	
		public $sma; //can be any currency
		public $api = 'https://coincap.io/page/SMART'; //would also pass api to the class from javascript as a variable
	
		public function __construct($sma){
		$this->sma = $sma;	
		#$this->api = $variable;	
			}
	}

//class that decodes data from api		
class dec_data extends inputs{
		
		public $ob;
		
		public function decode(){
		$this->ob = json_decode(file_get_contents($this->api));
		return $this->ob;
		}	
	}
	
//class calculates exchange rate based on user input $bit
class conversion extends dec_data {
		
		public $converter;
	
		public function convert(){
		$this->converter = $this->sma * $this->ob->price;
		return $converter  = $this->converter;
		}	
	}
	
//class makes adjustment to data type that comes from outside the class data and encodes data
class jenc extends conversion {
		
		public function enc($array){
		unset($array["SMACONVERTER"]);
		$array["SMACONVERTER"] = $this->converter;
		echo json_encode($array);	
		}	
	}


		if(isset($_POST['sma'])){
				$sma = $_POST['sma'];
					}
					
				$obj = new inputs($sma);
				$obj2 = $obj;
				$obj2 = new jenc($sma);
				$obj2->decode();
				
				$arr  = new ArrayObject($obj2->decode());
				$array = ["SMART" => $arr["price"], "SMACONVERTER"=> $obj2->convert()];
				$obj2->enc($array);
				
	
	




	


	
										
?>