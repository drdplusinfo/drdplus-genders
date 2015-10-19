<?php
namespace DrdPlus\Genders;

use Doctrine\DBAL\Types\Type;
use DrdPlus\Genders\EnumTypes\GenderType;
use DrdPlus\Tests\Genders\TestWithMockery;

class GenderTypeTest extends TestWithMockery
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
