<?php
namespace Drd\Tests\Genders;

class FemaleTest extends GenderTest
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
