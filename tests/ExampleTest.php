<?php

namespace Sparkout\SparkoutLogin\Tests;

class ExampleTest extends TestCase
{
    /**
     * testBasicExample
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->assertInstanceOf(\Sparkout\SparkoutLogin\SparkoutLogin::class, app('sparkout-login'));
        $this->assertInstanceOf(\Sparkout\SparkoutLogin\SparkoutLogin::class, \Sparkout\SparkoutLogin\SparkoutLoginFacade::getFacadeRoot());
    }
}
