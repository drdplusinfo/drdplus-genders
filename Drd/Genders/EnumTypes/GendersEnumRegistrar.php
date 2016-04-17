<?php
namespace Drd\Genders\EnumTypes;

class GendersEnumRegistrar
{
    public static function registerAll()
    {
        GenderType::registerSelf();
        GenderType::registerGendersAsSubtypes();
    }
}