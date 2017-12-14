<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\View\CellTrait;
use Cake\Routing\Router;

/**
 * Main Controller
 *
 * @property \App\Model\Table\UsersTable $Main
 */
class MainController extends AppController
{
    public $helpers = ['NavigationSelector'];

    use CellTrait;

    /**
     * Initialize Method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["home"];
        $this->set('nav_selected', $nav_selected);
        $this->set('website_title', 'AIMALUBE');
        $this->set('page_title', 'Home');
        $this->Auth->allow();        
    }    
    
    /**
     * BeforeFilter Method
     *  ID : CA-02
     * 
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['index','filter']);
    }

    /**
     * Index method for homepage
     *  ID : CA-03
     * @return void
     */

    public function index()
    {
        $this->Products  = TableRegistry::get('Products');
        $this->News      = TableRegistry::get('News');
        $this->Slides    = TableRegistry::get('Slides');
        $this->CompanyDetails = TableRegistry::get('CompanyDetails');
        $this->ProductCategories = TableRegistry::get('ProductCategories');        

        $productCategories = $this->ProductCategories->find('all')
            ->where(['ProductCategories.parent_id' => 0])
        ;

        $products = $this->Products->find('all')
            ->where(['Products.is_publish' => 1])
            ->order(['rand()'])
        ;

        $recentNews = $this->News->find()
            ->where(['News.is_publish' => 1])
            ->order(['News.id' => 'DESC'])
            ->first()         
        ;

        $slides = $this->Slides->find('all')
            ->where(['Slides.is_publish' => 1])
            ->order(['Slides.sorting' => 'ASC'])
        ;

        $this->set(['products' => $products, 'recentNews' => $recentNews, 'slides' => $slides, 'mt_for_layout' => 'AIMALUBE', 'mk_for_layout' => 'AIMALUBE', 'md_for_layout' => 'AIMALUBE', 'productCategories' => $productCategories, 'front_nav_selected' => 'home']);
        $this->viewBuilder()->layout('main');        
    }
}

