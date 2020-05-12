<?php
use PHPUnit\Framework\TestCase;
require DIR . "/../src/Classes/FooBar.php";

class FooBarTest extends TestCase
{

    //FooBarQix tests

    public function tests1()
     {
        $test1 = new FooBar();
        $this->assertEquals("FooBar", $test1->foo_bar_qix(15));
    }

    public function tests2()
     {
        $test1 = new FooBar();
        $this->assertEquals("Foo", $test1->foo_bar_qix(3));
    }

    public function tests3()
     {
        $test1 = new FooBar();
        $this->assertEquals("Bar", $test1->foo_bar_qix(5));
    }

    public function tests4()
     {
        $test1 = new FooBar();
        $this->assertEquals("Bar", $test1->foo_bar_qix(5));
    }

    public function tests5()
     {
        $test1 = new FooBar();
        $this->assertEquals("Foo", $test1->foo_bar_qix(3));
    }

    public function tests6()
     {
        $test1 = new FooBar();
        $this->assertEquals("Foo", $test1->foo_bar_qix(3));
    }

    public function tests7()
    {
       $test1 = new FooBar();
       $this->assertEquals("Bar", $test1->foo_bar_qix(5));
   }

   public function tests8()
   {
      $test1 = new FooBar();
      $this->assertEquals("FooBar", $test1->foo_bar_qix(345));
  }

  public function tests9()
   {
      $test1 = new FooBar();
      $this->assertEquals("Qix", $test1->foo_bar_qix(7));
  }

  public function tests10()
   {
      $test1 = new FooBar();
      $this->assertEquals("BarQix", $test1->foo_bar_qix(35));
  }

  public function tests11()
   {
      $test1 = new FooBar();
      $this->assertEquals("FooQix", $test1->foo_bar_qix(21));
  }

  public function tests12()
   {
      $test1 = new FooBar();
      $this->assertEquals("FooBar", $test1->foo_bar_qix(345));
  }

  public function tests13()
   {
      $test1 = new FooBar();
      $this->assertEquals("FooBarQix", $test1->foo_bar_qix(105));
   }

  public function tests14()
   {
      $test1 = new FooBar();
      $this->assertEquals("1", $test1->foo_bar_qix(2));
  }

  public function tests15()
  {
     $test1 = new FooBar();
     $this->assertEquals("Qix", $test1->foo_bar_qix(77));
  }

  public function tests16()
  {
    $test1 = new FooBar();
    $this->assertEquals("Bar", $test1->foo_bar_qix(77));
  }

  public function tests17()
  {
    $test1 = new FooBar();
    $this->assertEquals("Bar", $test1->foo_bar_qix(3));
  }

  public function tests18()
  {
    $test1 = new FooBar();
    $this->assertEquals("QixFoo", $test1->foo_bar_qix(37));
  }

}

