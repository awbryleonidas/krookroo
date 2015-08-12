/**
* Name:  generateRandomString
*
* Author: Aubrey Leonidas
*		  che.leonidas@gmail.com
*         @awbryleonidas
*
* Created:  08.12.2015
*
* Description:  random character from any given string.
*
* Requirements: n/a
*
*/
	
	function test_function_post(){

		$characters2 = str_replace('1', '','123456');// si 1 ay yung ie-except mo sa string
		$arrs = $this->_generateRandomString($characters2);
		$rand1 = $arrs[0];
		$rand2 = $arrs[1];
		echo $rand1.'<br>';
		echo $rand2.'<br>';
	}

    private function _generateRandomString($characters, $array_length = 2) {

		$randomString_array = array();
		for($i = 0; $i < $array_length; $i++){
			//$characters = '12345678';
			$randomchar = '';
			$randomchar .= $characters[rand(0, strlen($characters) - 1)];

			if(in_array($randomchar, $randomString_array)){
				$characters2 = str_replace($randomchar, '',$characters);
				$randomchar = '';
				$randomchar .= $characters2[rand(0, strlen($characters2) - 1)];
			}

			$randomString_array[$i] = $randomchar;

		}

		return $randomString_array;
    }