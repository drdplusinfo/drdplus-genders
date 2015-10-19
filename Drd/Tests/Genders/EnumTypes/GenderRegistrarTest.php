<?php
namespace Drd\Genders\EnumTypes;

use Doctrine\DBAL\Types\Type;
use Drd\Genders\Female;
use Drd\Genders\Male;

class GenderRegistrarTest extends \PHPUnit_Framework_TestCase
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
