<?php

use Behat\Behat\Context\BehatContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Mink;
use Behat\Mink\Session as MinkSession;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class SuiteContext extends MinkContext
{
    protected $mink;

    protected $db;

    protected static $selServer = 'http://192.168.128.1:4444/wd/hub';   //selenium server ip

    protected static $selBrowser = 'firefox';   // selenium browser to test against

    /**
     * Initializes context.
     * Every scenario gets it's own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     * @param TodoForm
     */
    public function __construct(array $parameters, TodoForm $form)
    {
        $this->prepareMink();
        $this->setMink($this->mink);
        $this->parameters = $parameters;
        $this->form = $form;
    }

    public function prepareMink()
    {
        if (!isset($this->mink)) {
            $mink = new Mink();
            $mink->registerSession('vmSession', $this->createSession());
            $mink->setDefaultSessionName('vmSession');
            $this->mink = $mink;
        }
        return $this->mink;
    }

    private function createSession()
    {
        return new MinkSession(
            new Selenium2Driver(
                self::$selBrowser,
                null,
                self::$selServer
            )
        );
    }

    public function getMink()
    {
        return $this->mink;
    }
}
