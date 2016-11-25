<?php
namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;

class Male extends AbstractGender
{
    /**
     * @return Male
     */
    public static function getIt()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::getEnum(GenderCode::MALE);
    }

    /**
     * @return bool
     */
    public function isMale()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isFemale()
    {
        return false;
    }

}