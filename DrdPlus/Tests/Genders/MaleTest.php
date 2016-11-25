<?php
namespace DrdPlus\Tests\Genders;

class MaleTest extends AbstractGenderTest
{
    protected function shouldBeMale()
    {
        return true;
    }

    protected function shouldBeFemale()
    {
        return false;
    }

}