<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TechnicalAttachmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TechnicalAttachmentsTable Test Case
 */
class TechnicalAttachmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TechnicalAttachmentsTable
     */
    public $TechnicalAttachments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.technical_attachments',
        'app.technicals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TechnicalAttachments') ? [] : ['className' => 'App\Model\Table\TechnicalAttachmentsTable'];
        $this->TechnicalAttachments = TableRegistry::get('TechnicalAttachments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TechnicalAttachments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
