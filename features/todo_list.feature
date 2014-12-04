Feature: Display todo list
  In order to organize my task list
  As a user
  I want to add tasks and see the list of my tasks

  Background: I empty all current tasks

  Scenario: View a task list
    Given I visit task list
    Then I should see task addition form
    And I should see empty task list

  Scenario: Add a task
    Given I visit task list
    When I add a task "I have to do something"
    Then I press "Add"
    And I should see task added "I have to do something" to the list
