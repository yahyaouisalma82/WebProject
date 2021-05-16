<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {

        $user=new User();
        $user->setName('name');
        $user->setEmail('true@test.com');

        $this->assertTrue($user->getName()==='name');
        $this->assertTrue($user->getEmail()==='true@test.com');
    }
    public function testIsFalse(): void
    {

        $user=new User();
        $user->setName('name');
        $user->setEmail('true@test.com');

        $this->assertFalse($user->getName()==='false');
        $this->assertFalse($user->getName()==='false@test.com');

    }
    public function testIsEmpty(): void
    {

        $user=new User();
        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getName());

    }
}
