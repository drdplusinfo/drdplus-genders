<?php
namespace DrdPlus\Genders\EnumTypes;

use DrdPlus\Genders\Female;
use DrdPlus\Genders\Male;

class GenderRegistrar
{
    public static function registerAll()
    {
        return
            GenderType::registerSelf()
            && GenderType::registerGenderAsSubType(Male::getIt())
            && GenderType::registerGenderAsSubType(Female::getIt());
    }
}
