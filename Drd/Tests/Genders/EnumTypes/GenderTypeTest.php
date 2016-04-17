<?php
namespace Drd\Tests\Genders;

use Doctrine\DBAL\Types\Type;
use Drd\Genders\EnumTypes\GendersEnumRegistrar;
use Drd\Genders\EnumTypes\GenderType;
use Drd\Genders\Female;
use Drd\Genders\Male;

class GenderTypeTest extends \PHPUnit_Framework_TestCase
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
    }

    /**
     * @test
     */
    public function I_can_register_it_by_self()
    {
        GenderType::registerSelf();
        self::assertSame('gender', GenderType::getTypeName());
        self::assertSame(GenderType::GENDER, GenderType::getTypeName());
        self::assertTrue(Type::hasType(GenderType::getTypeName()));
        $genericGender = Type::getType(GenderType::getTypeName());
        self::assertInstanceOf(GenderType::class, $genericGender);
    }
}
