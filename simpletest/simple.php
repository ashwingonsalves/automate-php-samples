<?php
require_once('simpletest/autorun.php');
require "php-webdriver/lib/__init__.php";

class TestOfLogging extends UnitTestCase {
  function testLogCreatesNewFileOnFirstMessage() {
    echo('This is a test with simple test');
    $web_driver = RemoteWebDriver::create(
      "http://<username>:<access_key>@hub.browserstack.com/wd/hub",
      array("platform"=>"WINDOWS")
    );
    $web_driver->get("http://www.google.com/ncr");
    $this->assertEquals("Google", $web_driver->getTitle());
    $element = $web_driver->findElement(WebDriverBy::name("q"));
    if ($element) {
      $element->sendKeys("Browserstack");
      $element->submit();
      //$this->assertEquals(0, count($stack));
    }
    $web_driver->quit();
  }

  function assertEquals($text, $value) {
    if ($text == $value) 
      return true;
    else
      return false;
  }
}
?> 