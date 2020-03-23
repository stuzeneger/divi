<?php declare(strict_types=1);

namespace divi;

# use autoload classes
require_once 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

/*
* Class test FooBarQix service text values from input integers.
*/

final class InfQixFooTest extends TestCase
{
    # tested object 
    private $testObject;

    # define rules from settings file
    private $errorMessage = ERROR_MESSAGE;

    # setup tests
    public function setUp(): void
    {
        $this->testObject = new InfQixFoo();
    }

    /**
     * @dataProvider providerNotMultipleReturnNumberWithoutOccurency
     * @dataProvider providerNotMultipleReturnNumberWithOccurrency
     * @dataProvider providerOneMultiple
     * @dataProvider providerSeveralMultiples
     * @dataProvider providerMultiplesWithoutOccurency
     * @dataProvider providerMultiplesWithOccurency
     * @dataProvider providerWrongInputNumber
     */

    public function testFooBarQix(int $number, string $answer): void
    {
        $this->assertEquals($answer, $this->testObject->getInfQixFoo($number));
    }

    # test data for not multiple and return number without occurrency
    public function providerNotMultipleReturnNumberWithoutOccurency(): array
    {

        $data = [[1, '1'], [2, '2'], [4, '4']];

        return $data;
    }

    # test data for not multiple and return number with occurrency
    public function providerNotMultipleReturnNumberWithOccurrency(): array
    {

        $data = [[13, '13Foo'], [17, '17Qix'], [23, '23Foo']];

        return $data;
    }

    # test data for one multiple 
    public function providerOneMultiple(): array
    {

        $data = [[6, 'Foo'], [9, 'Foo'], [14, 'Qix'], [16, 'Inf']];

        return $data;
    }

    # test data for several multiples
    public function providerSeveralMultiples(): array
    {

        $data = [[21, 'Qix;Foo'], [24, 'Inf;Foo'], [42, 'Qix;Foo']];

        return $data;
    }

    # test data for multiples without occurences
    public function providerMultiplesWithoutOccurency(): array
    {

        $data = [[24, 'Inf;Foo'], [56, 'Inf;Qix'], [96, 'Inf;Foo']];

        return $data;
    }

    # test data for multiples with occurences
    public function providerMultiplesWithOccurency(): array
    {

        $data = [[48, 'Inf;FooInf'], [63, 'Qix;FooFoo'], [72, 'Inf;FooQix'], [84, 'Qix;FooInf']];

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
