<?php
namespace Drd\Genders;

class GenderFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider provideGenderCodeAndClass
     *
     * @param string $genderCode
     * @param string $expectedGenderClass
     */
    public function I_can_create_gender_by_code($genderCode, $expectedGenderClass)
    {
        $factory = new GenderFactory();
        $gender = $factory->getGenderByCode($genderCode);
        self::assertInstanceOf($expectedGenderClass, $gender);
        self::assertSame($genderCode, $gender->getValue());
        self::assertSame($genderCode, "$gender");
    }

    public function provideGenderCodeAndClass()
    {
        return [
            ['male', Male::class],
            ['female', Female::class],
        ];
    }

    /**
     * @test
     * @expectedException \Drd\Genders\Exceptions\UnknownGenderCode
     * @expectedExceptionMessageRegExp ~Silly Billy~
     */
    public function I_can_not_create_gender_by_invalid_code()
    {
        $factory = new GenderFactory();
        $factory->getGenderByCode('Silly Billy');
    }
}
