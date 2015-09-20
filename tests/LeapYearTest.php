<?php

use App\LeapYear;

class LeapYearTest extends PHPUnit_Framework_TestCase
{
    public function testIsLeapYearTrue(){
        $leapYear = new LeapYear();
        $actual = $leapYear->isLeapYear(1980);
        $this->assertTrue($actual, "Failed to assert that a 1980 is a leapyear");
    }

    public function testIsLeapYearFalse(){
        $leapYear = new LeapYear();
        $actual = $leapYear->isLeapYear(1981);
        $this->assertFalse($actual, "Failed to assert that 1981 is not a leapyear");
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testIsLeapYearWithWrongArgumentTypeThrowsException()
    {
        $leapYear = new LeapYear();
        $leapYear->isLeapYear("year");
    }

    /** @test */
    public function It_should_only_work_for_four_digit_numbers()
    {
        $leapYear = new LeapYear();
        $expected = "Argument must be between 0 and 9999";
        $actual = $leapYear->isLeapYear(12345);
        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function It_should_only_work_for_positive_numbers()
    {
        $leapYear = new LeapYear();
        $expected = "Argument must be between 0 and 9999";
        $actual = $leapYear->isLeapYear(-1);
        $this->assertEquals($expected, $actual);
    }
}
