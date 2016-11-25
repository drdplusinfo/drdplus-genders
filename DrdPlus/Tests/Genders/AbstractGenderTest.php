<?php
namespace DrdPlus\Tests\Genders;

use DrdPlus\Codes\GenderCode;
use DrdPlus\Genders\Female;
use DrdPlus\Genders\AbstractGender;
use DrdPlus\Genders\Male;

abstract class AbstractGenderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function I_can_use_it()
    {
        $genderClass = $this->getGenderClass();
        $gender = $genderClass::getIt();
        self::assertInstanceOf($genderClass, $gender);
        self::assertSame($this->getGenderValue(), $gender->getValue());
        self::assertSame($gender, $genderClass::getEnum($this->getGenderValue()));
        self::assertSame($this->getGenderValue(), "$gender");
        self::assertSame($this->shouldBeMale(), $gender->isMale());
        self::assertSame($this->shouldBeFemale(), $gender->isFemale());
        $genderCode = $gender->getCode();
        self::assertInstanceOf(GenderCode::class, $genderCode);
        self::assertSame($genderCode->getValue(), $this->getGenderValue());
    }

    /**
     * @return Male|Female|string
     */
    private function getGenderClass()
    {
        return preg_replace('~[\\\]Tests([\\\].+)Test$~', '$1', static::class);
    }

    private function getGenderValue()
    {
        self::assertGreaterThan(0, preg_match('~[\\\](?<basename>\w+)$~', $this->getGenderClass(), $matches));

        return strtolower($matches['basename']);
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
     * @expectedException \DrdPlus\Genders\Exceptions\UnknownGenderCode
     * @expectedExceptionMessageRegExp ~foo~
     */
    public function I_can_not_create_gender_by_invalid_code()
    {
        $genderClass = $this->getGenderClass();
        $genderClass::getEnum('foo');
    }

    /**
     * @test
     * @expectedException \DrdPlus\Genders\Exceptions\CanNotUseAbstractGender
     * @expectedExceptionMessageRegExp ~foo~
     */
    public function I_can_not_create_abstract_gender_by_generic_factory_method()
    {
        AbstractGender::getEnum('foo');
    }

    /**
     * @test
     * @expectedException \DrdPlus\Genders\Exceptions\UnknownGenderCode
     * @expectedExceptionMessageRegExp ~Silly Billy~
     */
    public function I_can_not_create_gender_by_factory_by_invalid_code()
    {
        $genderClass = $this->getGenderClass();
        $genderClass::getEnum('Silly Billy');
    }
}