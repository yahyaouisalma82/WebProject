<?php

namespace App\Tests;

use App\Entity\PetForAdoption;
use PHPUnit\Framework\TestCase;

class PetUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $pet=new PetForAdoption();
        $pet->setName('name');
        $pet->setAge(3);
        $this->assertTrue($pet->getAge()===3);
        $this->assertTrue($pet->getName()==='name');
    }
}
