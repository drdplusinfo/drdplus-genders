<?php
declare(strict_types=1);

namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;

/**
 * @method static AbstractGender|Female getEnum($genderCode)
 */
class Female extends AbstractGender
{
    public static function getIt(): Female
    {
        return self::getEnum(GenderCode::FEMALE);
    }

    public function isMale(): bool
    {
        return false;
    }

    public function isFemale(): bool
    {
        return true;
    }

}