<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Genders;

class FemaleTest extends AbstractGenderTest
{
    protected function shouldBeMale(): bool
    {
        return false;
    }

    protected function shouldBeFemale(): bool
    {
        return true;
    }

}