<?php
declare(strict_types=1);

namespace DrdPlus\Tests\Genders;

class MaleTest extends AbstractGenderTest
{
    protected function shouldBeMale(): bool
    {
        return true;
    }

    protected function shouldBeFemale(): bool
    {
        return false;
    }

}