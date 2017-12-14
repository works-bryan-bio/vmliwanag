<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Services Controller
 *
 * @property \App\Model\Table\ServicesTable $Services
 */
class SearchController extends AppController
{

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = [""];
        $this->set('nav_selected', $nav_selected);
    }

    /**
     * Index method
     *  ID : CA-02
     *
     * @return void
     */
    public function index()
    {
        $this->Services   = TableRegistry::get('Services');
        $this->Pages      = TableRegistry::get('Pages');
        $this->Products   = TableRegistry::get('Products');
        $this->Technicals = TableRegistry::get('Technicals');
        $this->News       = TableRegistry::get('News');

        $query  = "";
        $result = array();
        $result_count = 0;
        if( isset($this->request->query['query']) ){
            $query = $this->request->query['query'];
            
            $services = $this->Services->find('all')
                ->where(['Services.name LIKE' => '%' . $query . '%'])                
            ;

            $products = $this->Products->find('all')
                ->contain(['ProductCategories'])
                ->where(['Products.name LIKE' => '%' . $query . '%'])   
                ->orWhere(['ProductCategories.name LIKE ' => '%' . $query . '%'])                             
            ;

            $pages = $this->Pages->find('all')
                ->where(['Pages.name LIKE' => '%' . $query . '%'])                                
            ;

            $technicals = $this->Technicals->find('all')
                ->where(['Technicals.name LIKE' => '%' . $query . '%'])                                
            ;

            $news = $this->News->find('all')
                ->where(['News.title LIKE' => '%' . $query . '%'])                                
            ;

            if( $services->count() > 0 ){
                $result['services'] = $services;
                $result_count++;
            }

            if( $products->count() > 0 ){
                $result['products'] = $products;
                $result_count++;
            }

            if( $pages->count() > 0 ){
                $result['pages'] = $pages;
                $result_count++;
            }

            if( $technicals->count() > 0 ){
                $result['technicals'] = $technicals;
                $result_count++;
            }

            if( $news->count() > 0 ){
                $result['news'] = $news;
                $result_count++;
            }
        }
        
        $this->set([
            'query_string' => $query,
            'result' => $result,
            'result_count' => $result_count
        ]);
    }
}
