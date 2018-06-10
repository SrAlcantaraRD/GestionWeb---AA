Feature: User Store Feature
  In order to user store funcionality
  As a new client
  I need to be able to create my user and log in the app

  Scenario: Create a user-store
    Given I am a user with randown data
    And I am on "/Register"
    And my user type is a "Tienda"
    When I fill the register form with my data
    And I press "submitBtn"
    Then the url should match "RegistrationConfirmed"
    And the response should contain "pendingActivation"
    And the response should contain "goToHomepage"
    And the response status code should be 200