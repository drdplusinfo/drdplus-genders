<?php
namespace Drd\Genders\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrineum\String\StringEnumType;
use Drd\Genders\Female;
use Drd\Genders\Gender;
use Drd\Genders\Male;

/**
 * @method static GenderType getType(string $name),
 * @see ScalarEnumType::getType for parent
 *
 * @method Gender convertToPHPValue(string $value, AbstractPlatform $platform)
 * @see ScalarEnumType::convertToPHPValue for parent
 */
class GenderType extends StringEnumType
{
    const GENDER = 'gender';

    public static function registerGendersAsSubtypes()
    {
        $result = GenderType::registerGenderAsSubType(Male::getIt());
        $result |= GenderType::registerGenderAsSubType(Female::getIt());

        return (bool)$result;
    }

    /**
     * @param Gender $gender
     * @return bool
     */
    private static function registerGenderAsSubType(Gender $gender)
    {
        if (static::hasSubTypeEnum(get_class($gender))) {
            return true;
        }

        return static::addSubTypeEnum(get_class($gender), "~^{$gender->getValue()}$~");
    }
}
