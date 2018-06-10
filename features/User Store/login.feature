Feature: User Store Feature
  In order to user store funcionality
  As a new client
  I need to be able to create my user and log in the app

  Background:
    Given start faker factory with "es_ES"
    And get the doctrine manager
    
  Scenario: Create a user-store
    Given I am a user with randown data
    And I am on "/register"
    And my user type is a "Tienda"
    When I fill the register form with my data
    And press "submitBtn"
    And show last response
    Then I should see "app.registration.confirmed_free"
    And the response status code should be 200