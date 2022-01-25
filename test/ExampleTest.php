<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase{
    public function testThatStringsMatch(){
        $string1 = "testing";
        $string2 = "testing";
      

        $this->assertSame($string1, $string2);
       
    }

}