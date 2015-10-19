<?php
namespace Drd\Genders;

class Male extends Gender
{
    const MALE = 'male';

    /**
     * @return Male
     */
    public static function getIt()
    {
        return self::getEnum(self::MALE);
    }

    public function isMale()
    {
        return true;
    }

    public function isFemale()
    {
        return false;
    }

}
