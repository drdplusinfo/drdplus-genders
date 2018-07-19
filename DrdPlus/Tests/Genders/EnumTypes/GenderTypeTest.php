<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Genders\EnumTypes;

use Doctrine\DBAL\Types\Type;
use Doctrineum\Tests\SelfRegisteringType\AbstractSelfRegisteringTypeTest;
use DrdPlus\Genders\EnumTypes\GendersEnumRegistrar;
use DrdPlus\Genders\EnumTypes\GenderType;
use DrdPlus\Genders\Female;
use DrdPlus\Genders\Male;

class GenderTypeTest extends AbstractSelfRegisteringTypeTest
{
    /**
     * @test
     * @throws \Doctrine\DBAL\DBALException
     */
    public function I_can_register_every_gender_at_once(): void
    {
        GendersEnumRegistrar::registerAll();
        self::assertTrue(Type::hasType(GenderType::GENDER));
        self::assertTrue(GenderType::hasSubTypeEnum(Male::class));
        self::assertTrue(GenderType::hasSubTypeEnum(Female::class));
    }
}