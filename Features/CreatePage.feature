# Features/page.feature
  Feature: Create Page
    In order to populate the page list
    As a user
    I want to be able to create a page

  Scenario: Create a page
    Given I am on the homepage
    Then the url should match "/"
    Then I should see "List over all pages"
    When I follow "Create"
    Then I should see "Create a page"
    Then I fill in the following:
      | title  | Test page   |
      | content | This is a test page |
    And I select "Volkman PLC" from "client_id"
    Then I press "Create"
    And I should see "Page saved!"
    And the url should match "/"

  Scenario: Create a page with empty fields should display validation message
    Given I am on "/page/create"
    And I press "Create"
    Then I should see "The title field is required"
    And I should see "The content field is required"

  Scenario: Create a page with custom scenario
    Given I am on the Create page
    And I fill out the create form
    Then I should see "Page saved!"