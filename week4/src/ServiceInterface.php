<?php declare(strict_types=1);

namespace divi;

/*
* Interface for classes who return different text value from input integer.
*
* @param integer $number
* @return string
*/

interface ServiceInterface
{
    public function getServiceAnswer(int $number): string;
}
    
