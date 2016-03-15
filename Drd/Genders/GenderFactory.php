<?php
namespace Drd\Genders;

use Granam\Strict\Object\StrictObject;
use Granam\Tools\ValueDescriber;

class GenderFactory extends StrictObject
{
    public function getGenderByCode($genderCode)
    {
        $genderClass = $this->getGenderClassByItsCode($genderCode);

        return $genderClass::getEnum($genderCode);
    }

    /**
     * @param string $genderCode
     * @return string|Gender
     * @throws \Drd\Genders\Exceptions\UnknownGenderCode
     */
    private function getGenderClassByItsCode($genderCode)
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
}