<?php declare(strict_types=1);

namespace divi;

# use autoload classes
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/*
 * Class for test FooBar class output string values from input integers.
 */
 
final class FooBarTest extends TestCase
{
    # tested object 
    private $testObject;

    # define rules from settings file
    private $errorMessage = ERROR_MESSAGE;

    # setup tests
    public function setUp(): void {
	
        $this->testObject = new FooBarQix();
    }

    /**
     * @dataProvider providerNotMultiples
     * @dataProvider providerOneMultiple
     * @dataProvider providerSeveralMultiples
     * @dataProvider providerWrongInputNumber
     */

    public function testFooBarQix(int $number, string $answer): void
    {
        $this->assertEquals($answer, $this->testObject->getFooBarQix($number));
    }

    # test data for not multiple and return number
    public function providerNotMultiples(): array
    {

        $data = [[1, '1'], [2, '2'], [4, '4']];

        return $data;
    }

    # test data for one multiple
    public function providerOneMultiple(): array
    {

        $data = [[3, 'Foo'], [5, 'Bar'], [6, 'Foo'], [10, 'Bar'], [7, 'Qix'], [14, 'Qix']];

        return $data;
    }
	
	# test data for several multiples
    public function providerSeveralMultiples(): array
    {

        $data = [[15, 'Foo, Bar'], [30, 'Foo, Bar'], [45, 'Foo, Bar'], [21, 'Foo, Qix'], [35, 'Bar, Qix'], [105, 'Foo, Bar, Qix']];

        return $data;
    }

    # test data for wrong input numbers
    public function providerWrongInputNumber(): array
    {

        $data = [[0, ERROR_MESSAGE], [-1, ERROR_MESSAGE], [-3, ERROR_MESSAGE]];

        return $data;
    }
	

    /**
     * @dataProvider providerInputDatatypes
     */

    # test input datatype
    public function testDatatype($type): void {
        $typesCorrect = ['integer'];
        $this->assertContains($type, $typesCorrect);
    }

    # test data for input datatype check
    public function providerInputDatatypes(): array {
        $data = [3, 5, 7];

        return array_map(function ($value) {
            return [gettype($value)];
        }, $data);
    }

}