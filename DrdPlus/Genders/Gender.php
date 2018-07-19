<?php
declare(strict_types = 1);

namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;

interface Gender
{
    /**
     * @return bool
     */
    public function isMale();

    /**
     * @return bool
     */
    public function isFemale();

    /**
     * @return GenderCode
     */
    public function getCode();
}