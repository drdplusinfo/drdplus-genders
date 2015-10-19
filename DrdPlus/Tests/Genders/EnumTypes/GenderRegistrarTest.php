<?php
namespace DrdPlus\Genders\EnumTypes;

use Doctrine\DBAL\Types\Type;
use DrdPlus\Genders\Female;
use DrdPlus\Genders\Male;
use DrdPlus\Tests\Genders\TestWithMockery;

class GenderRegistrarTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_register_every_gender_at_once()
    {
        $this->assertTrue(GenderRegistrar::registerAll());
        $this->assertTrue(Type::hasType(GenderType::GENDER));
        $this->assertTrue(GenderType::hasSubTypeEnum(Male::class));
        $this->assertTrue(GenderType::hasSubTypeEnum(Female::class));
    }
}
