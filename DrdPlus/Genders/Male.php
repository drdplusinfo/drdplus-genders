<?php
declare(strict_types=1);

namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;

/**
 * @method static AbstractGender|Male getEnum($genderCode)
 */
class Male extends AbstractGender
{
    public static function getIt(): Male
    {
        return self::getEnum(GenderCode::MALE);
    }

    public function isMale(): bool
    {
        return true;
    }

    public function isFemale(): bool
    {
        return false;
    }

}