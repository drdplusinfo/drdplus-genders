<?php
namespace DrdPlus\Genders;

class FemaleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_female()
    {
        $this->assertInstanceOf(Female::class, $female = Female::getIt());
        $this->assertSame('female', "$female");
        $this->assertSame(Female::FEMALE, "$female");
    }

    /**
     * @test
     */
    public function I_can_ask_female_for_its_gender_type()
    {
        $female = Female::getIt();
        $this->assertTrue($female->isFemale());
        $this->assertFalse($female->isMale());
    }
}
