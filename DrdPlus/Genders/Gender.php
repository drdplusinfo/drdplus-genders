<?php
declare(strict_types=1);

namespace DrdPlus\Genders;

use DrdPlus\Codes\GenderCode;

interface Gender
{
    public function isMale(): bool;

    public function isFemale(): bool;

    public function getCode(): GenderCode;
}