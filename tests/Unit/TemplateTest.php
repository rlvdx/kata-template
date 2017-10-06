<?php

namespace Evaneos\Kata\Tests\Unit;

use Evaneos\Kata\Template\Template;

class TemplateTest extends \PHPUnit_Framework_TestCase
{
    private $sut;

    protected function setUp()
    {
        $this->sut = null;
    }

    /**
    * @test
    */
    public function it_should_test_things()
    {
        $this->assertNull($this->sut);
        $this->assertInstanceOf(Template::class, new Template());
    }
}
