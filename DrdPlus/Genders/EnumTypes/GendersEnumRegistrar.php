<?php
declare(strict_types = 1);

namespace DrdPlus\Genders\EnumTypes;

class GendersEnumRegistrar
{
    /**
     * @throws \Doctrine\DBAL\DBALException
     */
    public static function registerAll(): void
    {
        GenderType::registerSelf();
        GenderType::registerGendersAsSubtypes();
    }
}