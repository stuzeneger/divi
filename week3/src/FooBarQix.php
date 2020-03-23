<?php declare(strict_types=1);

namespace divi;

/*
 * Class return different text value from input integer.
 * @param int $number Input positive integer.
 * @param array $rules Rules for result string.
 * @param string $separator Separator for result string.
 * @method getFooBarQix(int $number): string Return different text value from input integer.
 * @method numberHasSingleMultiple(array $array): string
 * @method numberHasSeveralMultiples(array $array): string
 * @method numberHasNoMultiples(int $number): string
 */
 
final class FooBarQix {

    # init rules of build result string
    private $rules = [];
    private $separator;
    private $separator_occurence;

    public function __construct() {
	
        # set rules from settings file
        $this->rules = RULES;
        $this->separator = SEPARATOR;
        $this->separator_occurence = SEPARATOR_OCCURENCE;
    }

    /**
     * Function return different text strings from input integer.
     *
     * @param int $number Input positive integer.
     * @return string.
     */

    public function getFooBarQix(int $number): string {
	
        # Checking input requirements
        if (($number < 1) || (fmod($number, 1) === 0)) return ERROR_MESSAGE;

        # sort rules values for correct output
        array_multisort($this->rules);

        # init result variable
        $result = [];

        # get match multiples     
        foreach ($this->rules as $key => $value) {
            if ($number % $value === 0) $result[] = $key;
        }

        # count match multiples
        $count = count($result);

        # build result string
        switch ($count) {

            case 0:
                $result = $this->numberHasNoMultiples($number);
                break;

            case 1:
                $result = $this->numberHasSingleMultiple($result);
                break;

            case ($count > 1):
                $result = $this->numberHasSeveralMultiples($result);
                break;

        }

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
	
        return implode($this->separator, $array);
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
        $intersect = array_intersect($this->rules, $numbers);

        # append intersect keys to result
        $result = implode($this->separator_occurence, array_keys($intersect));

        # return result string
        return $result;
    }

}
    
