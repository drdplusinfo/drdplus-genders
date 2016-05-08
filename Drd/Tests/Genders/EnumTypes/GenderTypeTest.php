<?php
namespace Drd\Tests\Genders\EnumTypes;

use Doctrine\DBAL\Types\Type;
use Doctrineum\Tests\SelfRegisteringType\AbstractSelfRegisteringTypeTest;
use Drd\Genders\EnumTypes\GendersEnumRegistrar;
use Drd\Genders\EnumTypes\GenderType;
use Drd\Genders\Female;
use Drd\Genders\Male;

class GenderTypeTest extends AbstractSelfRegisteringTypeTest
{
    /**
     * @test
     */
    public function I_can_register_every_gender_at_once()
    {
        GendersEnumRegistrar::registerAll();
        self::assertTrue(Type::hasType(GenderType::GENDER));
        self::assertTrue(GenderType::hasSubTypeEnum(Male::class));
        self::assertTrue(GenderType::hasSubTypeEnum(Female::class));
        self::assertFalse(GenderType::registerGendersAsSubtypes());
    }
}
