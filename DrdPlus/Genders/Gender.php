<?php
namespace DrdPlus\Genders;

use Doctrineum\Scalar\Enum;

/**
 * @method static Gender getEnum(string $value)
 * @see Enum::getEnum for parent
 */

abstract class Gender extends Enum implements GenderInterface
{

}
