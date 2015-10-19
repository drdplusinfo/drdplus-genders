<?php
namespace Drd\Genders\EnumTypes;

use Drd\Genders\Female;
use Drd\Genders\Male;

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
