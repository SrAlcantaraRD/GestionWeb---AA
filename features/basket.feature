Feature: Product basket
  In order to buy products
  As a customer
  I need to be able to put interesting products into a basket

  Rules:
  - VAT is 20%
  - Delivery for basket under £10 is £3
  - Delivery for basket over £10 is £2
  - Buy 3 same products and get 1 for free

  Scenario:
    Given I am "antono - 29" user cuyo lema es "Tu ya sabes"
    Then Username must be "antono"
    And Age must be 29