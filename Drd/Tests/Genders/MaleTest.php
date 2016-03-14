<?php
namespace Drd\Tests\Genders;

class MaleTest extends GenderTest
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
