Feature: Display todo list
  In order to organize my task list
  As a user
  I want to add tasks and see the list of my tasks

  Scenario: View a task list
    Given I visit task list
    Then I should see task addition form
    And I should see empty task list

