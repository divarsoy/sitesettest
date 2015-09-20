<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use PHPUnit_Framework_Assert as PHPUnit;
use Laracasts\Behat\Context\DatabaseTransactions;
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    use DatabaseTransactions;
    /**
     * @Then I should be able to do something with Laravel
     */
    public function iShouldBeAbleToDoSomethingWithLaravel()
    {
        $environmentFileName = app()->environmentFile();
        $environmentName = env('APP_ENV');
        PHPUnit::assertEquals('.env.behat', $environmentFileName);
        PHPUnit::assertEquals('acceptance', $environmentName);
    }

    /**
     * @Given I am on the Create page
     */
    public function iAmOnTheCreatePage()
    {
        $this->visit('/page/create');
    }

    /**
     * @Given I fill out the create form
     */
    public function iFillOutTheCreateForm()
    {
        $tableNode = new TableNode([
           ['title', 'Test title'],
           ['content', 'Test content']
        ]);
        $this->fillFields($tableNode);
        //$this->selectOption('site_id',1);
        $this->pressButton('Create');
        $this->assertPageContainsText('Page saved!');
//        $this->printLastResponse();
    }
}
