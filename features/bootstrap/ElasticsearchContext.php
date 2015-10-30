<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

class ElasticsearchContext extends BaseContext
{
    /**
     * @var \Elasticsearch\Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Elasticsearch\Client([
            'hosts' => ['localhost'], // meh.
        ]);
    }

    protected function getCompilationTarget()
    {
        return new \RulerZ\Compiler\Target\Elasticsearch\ElasticsearchVisitor();
    }

    protected function getDefaultDataset()
    {
        return $this->client;
    }

    protected function getDefaultExecutionContext()
    {
        return [
            'index' => 'rulerz_tests',
            'type'  => 'player'
        ];
    }
}
