<?php

require_once './vendor/fzaninotto/Faker/src/autoload.php';

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use PHPUnit\Framework\Assert as PHPUnit_Framework_Assert; 
use Faker\Factory as Faker;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{

    private $user;
    private $shelf;
    private $basket;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
    }

    /**
     * @Transform table:name,price
     */
    public function castProductsTable(TableNode $productTable)
    {
        $products = array();

        foreach ($productTable->getHash() as $productHash) {
            $product = new Product($productHash['name'], floatval($productHash['price']));
            $products[] = $product;
        }
        return $products;
    }

    /** 
     * @Transform /"([^\ "]+)(?: - )(\d+)?" user cuyo lema es "(.*)"/ 
    */
    public function createUserFromUsername($username, $age = 20, $klk = "") {
        return new User($username, (int) $age, $klk);
    }

    /**
     * @Transform /"(.*)".*\ £(\d+)/
     * @Transform /"(.*)"/
     */
    public function castNamePriceToProduct($product, $price = 0)
    {
        return new Product($product, $price);
    }
    /**
    * @Given /I am (".*" user cuyo lema es ".*")/
    */
    public function iAmUser(User $user) {
        $this->user = $user;
    }

    /**
    * @Then /Username must be "([^"]+)"/
    */
    public function usernameMustBe($username) {
        PHPUnit_Framework_Assert::assertEquals(
            $username,
            $this->user->getUsername()
        );
    }

    /**
    * @Then /Age must be (\d+)/
    */
    public function ageMustBe($age) {
        PHPUnit_Framework_Assert::assertEquals(
            $age,
            $this->user->getAge()
        );

        PHPUnit_Framework_Assert::assertInternalType(
            'int',
            $this->user->getAge()
        );
    }

    /**
     * @Given /there is a (".*", which costs £\d+)/
     */
    public function thereIsAWhichCostsPs($product)
    {
        $this->shelf->setProductPrice($product);
    }

    /**
     * @When /I add the (".*") to the basket$/
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :count product(s) in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        PHPUnit_Framework_Assert::assertCount(
            intval($count),
            $this->basket->getProducts()
        );
    }

    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price)
    {
        PHPUnit_Framework_Assert::assertSame(
            floatval($price),
            $this->basket->getTotalPrice()
        );
    }

    /**
     * @When /I add the "(.*)" to the basket \d+ times/
     */
    public function iAddTheToTheBasketTimes( $product)
    {
        var_dump($product);
        for ($i=0; $i < $introduced; $i++) { 
            $this->basket->addProduct($product);
        }
    }

    /**
     * @Given the following products in the basket:
     */
    public function theFollowingProductsInTheBasket(array $products)
    {
        foreach ($products as $product) {
            $this->shelf->setProductPrice($product);
            $this->basket->addProduct($product);
        }
    }

    /**
     * @Given I am on :arg1
     */
    public function iAmOn($arg1)
    {
    }

    /**
     * @Then I should see a form
     */
    public function iShouldSeeAForm()
    {
        $faker = Faker::create();
        print_r($faker->name);
    }
}
