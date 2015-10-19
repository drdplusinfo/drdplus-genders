<?php
namespace DrdPlus\Tests\Genders;

class TestWithMockery extends \PHPUnit_Framework_TestCase
{
    protected function tearDown()
    {
        \Mockery::close();
    }
}
