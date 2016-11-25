<?php
namespace DrdPlus\Tests\Genders;

class FemaleTest extends AbstractGenderTest
{
    protected function shouldBeMale()
    {
        return false;
    }

    protected function shouldBeFemale()
    {
        return true;
    }

}