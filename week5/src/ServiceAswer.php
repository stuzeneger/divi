<?php declare(strict_types = 1);

namespace divi;

/*
 * Class return different text value from input integer.
 * @param int $number Input positive integer.
 * @param array $rules Rules for result string.
 * @param string $separator Separator for result string.
 * @method getServiceAnswer(int $number): string Return different text value from input integer.
 * @method numberHasSingleMultiple(array $array): string
 * @method numberHasSeveralMultiples(array $array): string
 * @method numberHasNoMultiples(int $number): string
 */
 
final class ServiceAswer implements ServiceInterface {

    # init rules of build result string
    private $rules_multiples = [];
	private $rules_occurrences = [];
    private $separator_multiple;
    private $separator_occurrency;
	
    public function __construct(array $rules_multiples, array $rules_occurences, string $separator_multiple, string $separator_occurency) {
        # set rules 
        $this -> rules_multiples = $rules_multiples;
		$this -> rules_occurrences = $rules_occurences;
        $this -> separator_multiple = $separator_multiple;
		$this -> separator_occurency = $separator_occurency;
    }

    /*
     * Function return different text strings from input integer.
     *
     * @param int $number Input positive integer.
     * @return string.
     */

    public function getServiceAnswer(int $number): string {
	
	        # Checking input requirements
            if(($number < 1) || (fmod($number, 1) === 0)) return ERROR_MESSAGE; 

            # init result variable
            $result = [];

           # get match multiples     
            foreach ($this -> rules_multiples as $key => $value)
            {
                if ($number % $value === 0) $result[] = $key;
            }
			
	       # count match multiples
           $count=count($result);
	  
	       # build result string
	       switch($count)
	       {
	   
	       case 0:
           $result = $this -> numberHasNoMultiples($number); 
	       break;
	   
	       case 1:
	       $result = $this -> numberHasSingleMultiple($result);
	       break;
	   
	       case ($count > 1):
	       $result = $this -> numberHasSeveralMultiples($result);
	       break;
	   
	      }
		  
	   # append occurency to result
       $result .= $this->appendOccurrences($number);
	   
       return $result;
       }
	   
	 /*
     * Function return answer if number has single multiple.
     *
     * @param array $array Input subresult array.
     * @return string.
     */
		
		private function numberHasSingleMultiple(array $array): string { 
		
		return array_shift($array);
		
		}

	 /*
     * Function return answer if number has several multiples.
     *
     * @param array $array Input subresult array.
     * @return string.
     */
	 
		private function numberHasSeveralMultiples(array $array): string {
		
		return implode($this -> separator_multiple, $array);
		
		}
		
	 /*
     * Function return answer if number has no multiple(-s).
     *
     * @param array $array Input subresult array.
     * @return string.
     */
		private function numberHasNoMultiples(int $number): string { 
		
			return strval($number);
		
		}
		
		 /*
         * Function find occurences and append string.
         *
         * @param int $number Input positive integer.
         * @return string.
        */

        private function appendOccurrences(int $number): string {
		
                # create array from input integer digits
                $numbers = str_split(strval($number));

                # find intersect values from rules and input number digits arrays
                $intersect = array_intersect($this -> rules_occurrences, $numbers);

                # append intersect keys to result
                $result = implode($this -> separator_occurrency, array_keys($intersect));

                return $result;
            }

  }
