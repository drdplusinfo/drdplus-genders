<?php
namespace DrdPlus\Genders;

class Female extends Gender
{
    const FEMALE = 'female';

    /**
     * @return Female
     */
    public static function getIt()
    {
        return self::getEnum(self::FEMALE);
    }

    public function isMale()
    {
        return false;
    }

    public function isFemale()
    {
        return true;
    }

}
