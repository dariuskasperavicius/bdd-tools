<?php


use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{

    protected $parameters;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {

    }

    /**
     * @Given I visit task list
     */
    public function iVisitTaskList()
    {
        $this->getSession()->visit('http://localhost:3000');
    }

    /**
     * @Then I should see task addition form
     */
    public function iShouldSeeTaskAdditionForm()
    {
        $form = $this->getSession()->getPage()->find('css', 'form.new-task');
        \PHPUnit_Framework_Assert::assertNotEmpty($form);
    }

    /**
     * @Then I should see empty task list
     */
    public function iShouldSeeEmptyTaskList()
    {
        $list = $this->getSession()->getPage()->find('css', 'ul.task-list');
        \PHPUnit_Framework_Assert::assertEmpty(trim($list->getHtml()));
    }

    /**
     * Returns page element.
     *
     * @return DocumentElement
     */
    public function getCurrentPage()
    {
        return $this->getSession()->getPage();
    }

    /**
     * @When I add a task :text
     */
    public function iAddATask($text)
    {
        $formInput = $this->getSession()->getPage()->find('css', 'form.new-task input');
        $formInput->setValue($text);
        $formInput->keyPress('Enter');
    }

    /**
     * @Then I should see task added :arg1 to the list
     */
    public function iSeeTaskAddedToTheList($arg1)
    {
        $this->assertPageContainsText($arg1);

    }

    /**
     * @Given I empty all current tasks
     */
    public function iEmptyAllCurrentTasks()
    {

        $deleteElements = $this->getSession()->getPage()->findAll('css', 'li button.delete');
        foreach ($deleteElements as $element) {
            $element->click();
        }
    }
}
