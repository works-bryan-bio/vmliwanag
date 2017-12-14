<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductAttachmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductAttachmentsTable Test Case
 */
class ProductAttachmentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductAttachmentsTable
     */
    public $ProductAttachments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_attachments',
        'app.products',
        'app.product_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductAttachments') ? [] : ['className' => 'App\Model\Table\ProductAttachmentsTable'];
        $this->ProductAttachments = TableRegistry::get('ProductAttachments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductAttachments);

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
