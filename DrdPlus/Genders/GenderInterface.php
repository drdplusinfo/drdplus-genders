<?php
namespace DrdPlus\Genders;

interface GenderInterface
{
    /**
     * @return bool
     */
    public function isMale();

    /**
     * @return bool
     */
    public function isFemale();
}
