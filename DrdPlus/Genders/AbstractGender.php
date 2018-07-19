<?php
declare(strict_types = 1);

namespace DrdPlus\Genders;

use Doctrineum\Scalar\Exceptions\CanNotCreateInstanceOfAbstractEnum;
use Doctrineum\String\StringEnum;
use DrdPlus\Codes\GenderCode;
use Granam\String\StringInterface;
use Granam\Tools\ValueDescriber;

abstract class AbstractGender extends StringEnum implements Gender
{
    /**
     * @param string|StringInterface $genderCode
     * @return AbstractGender
     * @throws \DrdPlus\Genders\Exceptions\CanNotUseAbstractGender
     * @throws \Doctrineum\Scalar\Exceptions\UnexpectedValueToEnum
     */
    public static function getEnum($genderCode)
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
     * @throws \Doctrineum\Scalar\Exceptions\UnexpectedValueToEnum
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

    /**
     * @return string
     */
    protected function getExpectedGenderValue()
    {
        preg_match('~[\\\](?<basename>\w+)$~', static::class, $matches);

        return strtolower($matches['basename']);
    }

    /**
     * @return GenderCode
     */
    public function getCode()
    {
        return GenderCode::getIt($this->getValue());
    }
}