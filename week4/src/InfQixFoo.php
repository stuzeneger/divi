<?php declare(strict_types=1);

namespace divi;

/*
 * Class return IniQixFoo value from input integer.
 *
 * @param int $number Input positive integer.
 * @param array $rules_multiples Rules for multiples result string.
 * @param array $rules_occurrences Rules for occurrences result string.
 * @param string $separator_multiples Separator for multiples result string.
 * @param string $separator_occurrences Separator for occurrences result string.
 * @method getInfQixFoo(int $number): string Return IniQixFoo from input integer.
 */
 
final class InfQixFoo {

    # init rules 
    private $rules_multiples = [];
    private $rules_occurences = [];
    private $separator_multiple;
    private $separator_occurrency;

    public function __construct() {
	
        # set rules from settings file
        $this->rules_multiples = RULES_MULTIPLES_INFQIXFOO;
        $this->rules_occurences = RULES_OCCURRENCES_INFQIXFOO;
        $this->separator_multiples = SEPARATOR_MULTIPLE_INFQIXFOO;
        $this->separator_occurency = SEPARATOR_OCCURENCE_INFQIXFOO;
    }

    /*
     * Function return different text strings from input integer.
     *
     * @param int $number Input positive integer.
     * @return string.
     */

    public function getInfQixFoo(int $number): string {
	
        $serviceAswer = new ServiceAswer($this->rules_multiples, $this->rules_occurences, $this->separator_multiples, $this->separator_occurency);
        return $serviceAswer->getServiceAnswer($number);
    }

}