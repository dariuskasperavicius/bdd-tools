<?php


use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class TodoFormPageObject extends Page
{
    protected $elements = array(
        'New task form' => 'form.new-task'
    );

    public function hasAddNewTaskButton()
    {
        $newTaskForm = $this->getElement('New task form');
        return $newTaskForm->hasButton('Add');
    }
}
 