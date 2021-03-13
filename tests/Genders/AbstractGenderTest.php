<?php declare(strict_types=1);

namespace DrdPlus\Tests\Genders;

use DrdPlus\Codes\GenderCode;
use DrdPlus\Genders\Female;
use DrdPlus\Genders\AbstractGender;
use DrdPlus\Genders\Male;
use Granam\TestWithMockery\TestWithMockery;

abstract class AbstractGenderTest extends TestWithMockery
{
    /**
     * @test
     */
    public function I_can_use_it(): void
    {
        $genderClass = $this->getGenderClass();
        $gender = $genderClass::getIt();
        self::assertInstanceOf($genderClass, $gender);
        self::assertSame($this->getGenderValue(), $gender->getValue());
        self::assertSame($gender, $genderClass::getEnum($this->getGenderValue()));
        self::assertSame($this->getGenderValue(), (string)$gender);
        self::assertSame($this->shouldBeMale(), $gender->isMale());
        self::assertSame($this->shouldBeFemale(), $gender->isFemale());
        $genderCode = $gender->getCode();
        self::assertInstanceOf(GenderCode::class, $genderCode);
        self::assertSame($genderCode->getValue(), $this->getGenderValue());
    }

    /**
     * @return Male|Female|string
     */
    private function getGenderClass(): string
    {
        return \preg_replace('~[\\\]Tests([\\\].+)Test$~', '$1', static::class);
    }

    private function getGenderValue(): string
    {
        self::assertGreaterThan(0, \preg_match('~[\\\](?<basename>\w+)$~', $this->getGenderClass(), $matches));

        return \strtolower($matches['basename']);
    }

    /**
     * @return bool
     */
    abstract protected function shouldBeMale(): bool;

    /**
     * @return bool
     */
    abstract protected function shouldBeFemale(): bool;

    /**
     * @test
     */
    public function I_can_not_create_gender_by_invalid_code(): void
    {
        $genderClass = $this->getGenderClass();

        $this->expectException(\DrdPlus\Genders\Exceptions\UnknownGenderCode::class);
        $this->expectExceptionMessageMatches('~foo~');
        $genderClass::getEnum('foo');
    }

    /**
     * @test
     */
    public function I_can_not_create_abstract_gender_by_generic_factory_method(): void
    {
        $this->expectException(\DrdPlus\Genders\Exceptions\CanNotUseAbstractGender::class);
        $this->expectExceptionMessageMatches('~foo~');
        AbstractGender::getEnum('foo');
    }

    /**
     * @test
     */
    public function I_can_not_create_gender_by_factory_by_invalid_code(): void
    {
        $genderClass = $this->getGenderClass();

        $this->expectException(\DrdPlus\Genders\Exceptions\UnknownGenderCode::class);
        $this->expectExceptionMessageMatches('~Silly Billy~');
        $genderClass::getEnum('Silly Billy');
    }
}
