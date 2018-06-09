Feature: User Store Feature
  In order to user store funcionality
  As a new client
  I need to be able to create my user and log in the app

  Background:
    Given started faker factory with "es_ES"
    
  Scenario: Create a user-store
    Given I am on "/register"
    And I have randown credentials
    When I fill in the form
    And press "_submit"
    And show last response
    Then I should see "app.registration.confirmed_free"
    And the response status code should be 200