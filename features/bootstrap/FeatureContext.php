<?php

use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Context\TranslatableContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Faker\Factory as Faker;
use App\Entity\User;
use App\Entity\UserGroup;
use App\Repository\UserGroupRepository;

/**
 * This context class contains the definitions of the steps used by the demo 
 * feature file. Learn how to get started with Behat and BDD on Behat's website.
 * 
 * @see http://behat.org/en/latest/quick_start.html
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
    public $language = "es_ES";
    public $user;
    public $doctrineManager;
    public $minkContext;

    /**
     * Implement faker instance.
     */
    public function constructFakerFactory($language)
    {
        //$this->faker = Faker::create($language);
    }


    /**
     * @Given get the doctrine manager
     */
    public function getTheDoctrineManager()
    {
        //$this->doctrineManager = $this->kernel->getContainer('doctrine')->get('doctrine');
    }

    /**
     * @var KernelInterface
     */
    private $kernel;

    /**
     * @var Response|null
     */
    private $response;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
        $this->faker = Faker::create($this->language);
        $this->doctrineManager = $this->kernel->getContainer('doctrine')->get('doctrine');
    }

    /**
     * @When a demo scenario sends a request to :path
     */
    public function aDemoScenarioSendsARequestTo(string $path)
    {
        $this->response = $this->kernel->handle(Request::create($path, 'GET'));
    }

    /**
     * @Then the response should be received
     */
    public function theResponseShouldBeReceived()
    {
        // var_dump($this->response);
        if ($this->response === null) {
            throw new \RuntimeException('No response received');
        }
    }

    /**
     * @Given start faker factory with :language
     */
    public function startedFakerFactory($language)
    {
        $this->constructFakerFactory($language);
    }

    /**
     * @Given I am a user with randown data
     */
    public function iAmAUserWithRandownData()
    {
        $this->user = new User();

        $this->user->setUsername($this->faker->userName);
        $this->user->setPassword($this->faker->password);
        $this->user->setName($this->faker->name);
        $this->user->setEmail($this->faker->email);
    }

    /**
     * @When I fill the register form with my data
     */
    public function iFillTheRegisterFormWithMyData()
    {
        $this->getSession()->getPage()->fillField("user_form[username]", $this->user->getUsername());
        $this->getSession()->getPage()->fillField("user_form[email]", $this->user->getEmail());
        $this->getSession()->getPage()->fillField("user_form[plainPassword][first]", $this->user->getPassword());
        $this->getSession()->getPage()->fillField("user_form[plainPassword][second]", $this->user->getPassword());
        $this->getSession()->getPage()->fillField("user_form[IdUserGroup]", $this->user->getIdUserGroup()->getId());
    }

    /**
     * @Given my user type is a :userGroupName
     */
    public function myUserTypeIsA($strGroupName)
    {
        $userGroup = $this->doctrineManager->getRepository(UserGroup::class)->findOneByName($strGroupName);

        $this->user->setIdUserGroup($userGroup);
    }

    /**
     * @Then I should see a element with name :elementName
     */
    public function iShouldSeeA($elementName)
    {
       // $this->assertSession()->elementTextContains('css', $element, $this->fixStepArgument($text));

        $element = $this->getSession()->getPage()->find(
            'named',
            array('id_or_name', $elementName)
        );
    }
}
