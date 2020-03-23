<?php declare(strict_types=1);

namespace divi;

/*
 * Class return FooBarQix value from input integer.
 * @param int $number Input positive integer.
 * @param array $rules_multiples Rules for multiples result string.
 * @param array $rules_occurrences Rules for occurrences result string.
 * @param string $separator_multiples Separator for multiples result string.
 * @param string $separator_occurrences Separator for occurrences result string.
 * @method getFooBarQix(int $number): string Return FooBarQix from input integer.
 */
 
final class FooBarQix {

    # init rules 
    private $rules_multiples = [];
    private $rules_occurrences = [];
    private $separator_multiple;
    private $separator_occurrency;

    public function __construct() {
	
        # set rules from settings file
        $this->rules_multiples = RULES_MULTIPLES_FOOBARQIX;
        $this->rules_occurrences = RULES_OCCURENCES_FOOBARQIX;
        $this->separator_multiple = SEPARATOR_MULTIPLE_FOOBARQIX;
        $this->separator_occurency = SEPARATOR_OCCURENCY_FOOBARQIX;
    }

    /*
     * Function return different text strings from input integer.
     *
     * @param int $number Input positive integer.
     * @return string.
     */

    public function getFooBarQix(int $number): string {

        $serviceAswer = new ServiceAswer($this->rules_multiples, $this->rules_occurrences, $this->separator_multiple, $this->separator_occurency);
        return $serviceAswer->getServiceAnswer($number);
    }

}
    
