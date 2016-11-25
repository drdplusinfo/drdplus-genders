<?php
namespace DrdPlus\Genders\EnumTypes;

class GendersEnumRegistrar
{
    public static function registerAll()
    {
        GenderType::registerSelf();
        GenderType::registerGendersAsSubtypes();
    }
}