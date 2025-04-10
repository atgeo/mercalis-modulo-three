<?php

use PHPUnit\Framework\TestCase;
use App\ModThree;

class ModThreeTest extends TestCase
{
    public function testDivisibleByThree()
    {
        $fsm = new ModThree();
        $this->assertEquals(0, $fsm->run('0'));
        $this->assertEquals(0, $fsm->run('11'));     // binary 3
        $this->assertEquals(0, $fsm->run('110'));    // binary 6
        $this->assertEquals(0, $fsm->run('1001'));   // binary 9
    }

    public function testRemainderOne()
    {
        $fsm = new ModThree();
        $this->assertEquals(1, $fsm->run('1'));
        $this->assertEquals(1, $fsm->run('100'));    // binary 4
    }

    public function testRemainderTwo()
    {
        $fsm = new ModThree();
        $this->assertEquals(2, $fsm->run('10'));     // binary 2
        $this->assertEquals(2, $fsm->run('101'));    // binary 5
    }

    public function testInvalidInputThrowsException()
    {
        $fsm = new ModThree();

        $this->expectException(InvalidArgumentException::class);
        $fsm->run('12');
    }

    public function testLeadingZerosAreHandled()
    {
        $fsm = new ModThree();
        $this->assertEquals(1, $fsm->run('0001'));
    }

    public function testEmptyInputThrowsException()
    {
        $fsm = new ModThree();

        $this->expectException(\InvalidArgumentException::class);
        $fsm->run('');
    }

    public function testVeryLongBinaryInput()
    {
        $fsm = new ModThree();
        $this->assertEquals(0, $fsm->run(str_repeat('1', 1000)));
    }
}
