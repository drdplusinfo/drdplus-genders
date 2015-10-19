<?php
namespace DrdPlus\Genders\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrineum\Scalar\EnumType;
use DrdPlus\Genders\Gender;

/**
 * @method static GenderType getType(string $name),
 * @see EnumType::getType for parent
 *
 * @method Gender convertToPHPValue(string $value, AbstractPlatform $platform)
 * @see EnumType::convertToPHPValue for parent
 */
class GenderType extends EnumType
{
    const GENDER = 'gender';

    /**
     * @param Gender $gender
     * @return bool
     */
    public static function registerGenderAsSubType(Gender $gender)
    {
        if (static::hasSubTypeEnum(get_class($gender))) {
            return true;
        }

        return static::addSubTypeEnum(get_class($gender), "~^$gender$~");
    }
}
