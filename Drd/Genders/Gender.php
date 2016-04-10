<?php
namespace Drd\Genders;

use Doctrineum\String\StringEnum;
use Granam\Tools\ValueDescriber;

abstract class Gender extends StringEnum implements GenderInterface
{
    /**
     * @param string $genderCode
     * @return Gender
     * @throws \Drd\Genders\Exceptions\CanNotUseAbstractGender
     */
    public static function getEnum($genderCode)
    {
        if (self::class === static::class) {
            throw new Exceptions\CanNotUseAbstractGender(
                'Tried to create abstract gender by code ' . ValueDescriber::describe($genderCode)
            );
        }

        return parent::getEnum($genderCode);
    }

    public static function getGenderByCode($genderCode)
    {
        $genderClass = self::getGenderClassByItsCode($genderCode);

        return $genderClass::getEnum($genderCode);
    }

    /**
     * @param string $genderCode
     * @return string|Gender
     * @throws \Drd\Genders\Exceptions\UnknownGenderCode
     */
    private static function getGenderClassByItsCode($genderCode)
    {
        $genderClass = __NAMESPACE__ . '\\' . ucfirst($genderCode);
        if (!class_exists($genderClass)) {
            throw new Exceptions\UnknownGenderCode(
                "Was searching for class {$genderClass} determined from code "
                . ValueDescriber::describe($genderCode)
            );
        }

        return $genderClass;
    }

    public function __construct($enumValue)
    {
        parent::__construct($enumValue);
        $this->checkGenderCode($this->getValue());
    }

    protected function checkGenderCode($genderCode)
    {
        if ($genderCode !== $this->getGenderCode()) {
            throw new Exceptions\UnknownGenderCode(
                "Expected {$this->getGenderCode()}, got " . ValueDescriber::describe($genderCode)
            );
        }
    }

    /**
     * @return string
     * @throws \Drd\Genders\Exceptions\CanNotUseAbstractGender
     */
    protected function getGenderCode()
    {
        preg_match('~[\\\](?<basename>\w+)$~', static::class, $matches);

        return strtolower($matches['basename']);
    }
}
