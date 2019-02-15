<?php
declare(strict_types=1);

namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;
use Granam\ScalarEnum\Exceptions\CanNotCreateInstanceOfAbstractEnum;
use Granam\String\StringInterface;
use Granam\StringEnum\StringEnum;
use Granam\Tools\ValueDescriber;

abstract class AbstractGender extends StringEnum implements Gender
{
    /**
     * @param string|StringInterface $genderCode
     * @return AbstractGender|\Granam\StringEnum\StringEnum
     * @throws \DrdPlus\Genders\Exceptions\CanNotUseAbstractGender
     * @throws \Granam\StringEnum\Exceptions\WrongValueForStringEnum
     */
    public static function getEnum($genderCode): AbstractGender
    {
        try {
            return parent::getEnum($genderCode);
        } catch (CanNotCreateInstanceOfAbstractEnum $canNotCreateInstanceOfAbstractEnum) {
            throw new Exceptions\CanNotUseAbstractGender(
                "Can not create an abstract gender (with code {$genderCode}), create it via specific gender getIt factory method."
            );
        }
    }

    /**
     * @param string|StringInterface $genderValue
     * @throws \Granam\StringEnum\Exceptions\WrongValueForStringEnum
     */
    protected function __construct($genderValue)
    {
        parent::__construct($genderValue);
        $this->checkGenderValue($this->getValue());
    }

    protected function checkGenderValue($genderValue)
    {
        if ($genderValue !== $this->getExpectedGenderValue()) {
            throw new Exceptions\UnknownGenderCode(
                "Expected {$this->getExpectedGenderValue()}, got " . ValueDescriber::describe($genderValue)
            );
        }
    }

    protected function getExpectedGenderValue(): string
    {
        \preg_match('~[\\\](?<basename>\w+)$~', static::class, $matches);

        return \strtolower($matches['basename']);
    }

    public function getCode(): GenderCode
    {
        return GenderCode::getIt($this->getValue());
    }
}