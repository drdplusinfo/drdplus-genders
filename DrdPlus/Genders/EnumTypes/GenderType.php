<?php
declare(strict_types=1);

namespace DrdPlus\Genders\EnumTypes;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrineum\String\StringEnumType;
use DrdPlus\Genders\Female;
use DrdPlus\Genders\AbstractGender;
use DrdPlus\Genders\Male;

/**
 * @method static GenderType getType(string $name),
 * @see ScalarEnumType::getType for parent
 *
 * @method AbstractGender convertToPHPValue(string $value, AbstractPlatform $platform)
 * @see ScalarEnumType::convertToPHPValue for parent
 */
class GenderType extends StringEnumType
{
    public const GENDER = 'gender';

    public static function registerGendersAsSubtypes()
    {
        $result = static::registerGenderAsSubType(Male::getIt());
        $result = static::registerGenderAsSubType(Female::getIt()) | $result;

        return $result;
    }

    /**
     * @param AbstractGender $gender
     * @return bool
     */
    private static function registerGenderAsSubType(AbstractGender $gender): bool
    {
        if (static::hasSubTypeEnum(\get_class($gender))) {
            return false;
        }

        return static::addSubTypeEnum(\get_class($gender), "~^{$gender->getValue()}$~");
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return self::GENDER;
    }
}
