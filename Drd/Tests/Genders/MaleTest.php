<?php
namespace Drd\Genders;

class MaleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_create_male()
    {
        $this->assertInstanceOf(Male::class, $male = Male::getIt());
        $this->assertSame('male', "$male");
        $this->assertSame(Male::MALE, "$male");
    }

    /**
     * @test
     */
    public function I_can_ask_male_for_its_gender_type()
    {
        $male = Male::getIt();
        $this->assertFalse($male->isFemale());
        $this->assertTrue($male->isMale());
    }
}
