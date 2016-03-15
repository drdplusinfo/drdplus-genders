<?php
namespace Drd\Tests\Genders;

use Drd\Genders\Female;
use Drd\Genders\Gender;
use Drd\Genders\Male;

abstract class GenderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $genderClass = $this->getGenderClass();
        $gender = $genderClass::getIt();
        self::assertInstanceOf($genderClass, $gender);
        self::assertSame($this->getGenderCode(), $gender->getValue());
        self::assertSame($gender, $genderClass::getEnum($this->getGenderCode()));
        self::assertSame($this->getGenderCode(), "$gender");
        self::assertTrue(defined("$genderClass::{$this->getGenderConstantName()}"));
        self::assertSame($this->getGenderCode(), constant("$genderClass::{$this->getGenderConstantName()}"));
        self::assertSame($this->shouldBeMale(), $gender->isMale());
        self::assertSame($this->shouldBeFemale(), $gender->isFemale());
    }

    /**
     * @return Male|Female|string
     */
    private function getGenderClass()
    {
        return preg_replace('~[\\\]Tests([\\\].+)Test$~', '$1', static::class);
    }

    private function getGenderCode()
    {
        self::assertGreaterThan(0, preg_match('~[\\\](?<basename>\w+)$~', $this->getGenderClass(), $matches));

        return strtolower($matches['basename']);
    }

    private function getGenderConstantName()
    {
        return strtoupper($this->getGenderCode());
    }

    /**
     * @return bool
     */
    abstract protected function shouldBeMale();

    /**
     * @return bool
     */
    abstract protected function shouldBeFemale();

    /**
     * @test
     * @expectedException \Drd\Genders\Exceptions\UnknownGenderCode
     * @expectedExceptionMessageRegExp ~foo~
     */
    public function I_can_not_create_gender_by_invalid_code()
    {
        $genderClass = $this->getGenderClass();
        $genderClass::getEnum('foo');
    }

    /**
     * @test
     * @expectedException \Drd\Genders\Exceptions\CanNotUseAbstractGender
     * @expectedExceptionMessageRegExp ~foo~
     */
    public function I_can_not_create_abstract_gender_by_generic_factory_method()
    {
        Gender::getEnum('foo');
    }
}
