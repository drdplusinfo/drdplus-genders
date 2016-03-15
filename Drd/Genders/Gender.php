<?php
namespace Drd\Genders;

use Doctrineum\Scalar\ScalarEnum;
use Granam\Tools\ValueDescriber;

abstract class Gender extends ScalarEnum implements GenderInterface
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
        if (self::class === static::class) {
            throw new Exceptions\CanNotUseAbstractGender(
                'Can not give gender code for abstract gender'
            );
        }

        preg_match('~[\\\](?<basename>\w+)$~', static::class, $matches);

        return strtolower($matches['basename']);
    }
}
