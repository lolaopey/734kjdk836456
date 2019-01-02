<?php


	//header('Content-Type: application/json');
	
#class that capture incoming data
class inputs{
	
		public $bit; //can be any currency
		public $api = 'https://coincap.io/page/GBP'; //would also pass api to the class from javascript as a variable
	
		public function __construct($bit){
		$this->bit = $bit;	
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
		$this->converter = $this->bit * $this->ob->price_btc;
		return $converter  = $this->converter;
		}	
	}
	
//class makes adjustment to data type that comes from outside the class data and encodes data
class jenc extends conversion {
		
		public function enc($array){
		unset($array["CONVERTER"]);
		$array["CONVERTER"] = $this->converter;
		echo json_encode($array);	
		}	
	}


		if(isset($_POST['bit'])){
				$bit = $_POST['bit'];
					}
					
				$obj = new inputs($bit);
				$obj2 = $obj;
				$obj2 = new jenc($bit);
				$obj2->decode();
				
				$arr  = new ArrayObject($obj2->decode());
				$array = ["BITCOIN" => $arr["price_btc"], "CONVERTER"=> $obj2->convert()];
				$obj2->enc($array);
				
	
	




	


	
										
?>