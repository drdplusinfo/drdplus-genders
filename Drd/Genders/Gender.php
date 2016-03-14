<?php
namespace Drd\Genders;

use Doctrineum\Scalar\ScalarEnum;

/**
 * @method static Gender getEnum(string $value)
 * @see ScalarEnum::getEnum for parent
 */
abstract class Gender extends ScalarEnum implements GenderInterface
{
    public static function getItByCode($genderCode)
    {
        /** @var Gender $genderClass */
        $genderClass = __NAMESPACE__ . '\\' . ucfirst($genderCode);

        return $genderClass::getEnum($genderCode);
    }
}
