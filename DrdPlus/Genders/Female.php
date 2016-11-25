<?php
namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;

class Female extends AbstractGender
{
    /**
     * @return Female
     */
    public static function getIt()
    {
        /** @noinspection ExceptionsAnnotatingAndHandlingInspection */
        return self::getEnum(GenderCode::FEMALE);
    }

    /**
     * @return bool
     */
    public function isMale()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isFemale()
    {
        return true;
    }

}