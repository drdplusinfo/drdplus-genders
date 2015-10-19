<?php
namespace Drd\Genders;

use Doctrine\DBAL\Types\Type;
use Drd\Genders\EnumTypes\GenderType;

class GenderTypeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    public function I_can_register_it_by_self()
    {
        GenderType::registerSelf();
        $this->assertSame('gender', GenderType::getTypeName());
        $this->assertSame(GenderType::GENDER, GenderType::getTypeName());
        $this->assertTrue(Type::hasType(GenderType::getTypeName()));
        $genericGender = Type::getType(GenderType::getTypeName());
        $this->assertInstanceOf(GenderType::class, $genericGender);
    }

    /**
     * @test
     */
    public function I_can_register_specific_gender()
    {
        $this->assertTrue(GenderType::registerGenderAsSubType(Male::getIt()));
        $this->assertTrue(GenderType::hasSubTypeEnum(Male::class));
    }

}
