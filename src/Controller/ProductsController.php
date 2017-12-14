<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;
use Cake\Utility\Inflector;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{
    public $helpers  = ['NavigationSelector'];
    public $paginate = ['maxLimit' => 10, 'order' => ['Products.id' => 'DESC']];

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["products"];
        $this->set('nav_selected', $nav_selected);

        $this->Auth->allow(['frontview','listing','ajax_load_products_by_category','categories']);        
    }

    /**
     * Index method
     *  ID : CA-02
     *
     * @return void
     */
    public function index()
    {
        if( isset($this->request->query['query']) ){
            $query = $this->request->query['query'];
            $products = $this->Products->find('all')
                ->contain(['ProductCategories'])
                ->where(['Products.name LIKE' => '%' . $query . '%'])                                
            ;
        }else{
            $products = $this->Products->find('all')
                ->contain(['ProductCategories'])
            ;
        }
        
        $this->set(['enable_fancy_box' => true]);
        $this->set('products', $this->paginate($products));
        $this->set('_serialize', ['products']);
    }

    /**
     * View method
     *  ID : CA-03
     *
     * @param string|null $id Product id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories']
        ]);
        $this->set('product', $product);
        $this->set('_serialize', ['product']);
    }

    /**
     * Add method
     *  ID : CA-04
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $product = $this->Products->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productCategories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Edit method
     *  ID : CA-05
     *
     * @param string|null $id Product id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $product = $this->Products->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $product = $this->Products->patchEntity($product, $this->request->data);
            if ($this->Products->save($product)) {
                $this->Flash->success(__('The product has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $productCategories = $this->Products->ProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('product', 'productCategories'));
        $this->set('_serialize', ['product']);
    }

    /**
     * Delete method
     *  ID : CA-06
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        if ($this->Products->delete($product)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Publish method
     *  ID : CA-07
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function publish($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->is_publish = 1;
        $this->Products->save($product);
        $this->Flash->success(__('The product has been published.'));        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Unpublish method
     *  ID : CA-08
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function unpublish($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->is_publish = 0;
        $this->Products->save($product);
        $this->Flash->success(__('The product has been unpublished.'));        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * frontview method
     * ID : CA-09  
     */
    public function frontview($id = null) {                 
        $product = $this->Products->get($id, [
            'contain' => ['ProductCategories', 'ProductImages']
        ]);    

        $category_slug = Inflector::slug($product->product_category->name, "-");

        $bread[] = ['url' => Router::url(['controller' => 'Products', 'action' => 'categories']), 'title' => 'Product Categories'];
        $bread[] = ['url' => Router::url(['controller' => 'Products', 'action' => 'listing' . '/' . $product->product_category->id . '/' . $category_slug]), 'title' => $product->product_category->name];
        $bread[] = ['url' => '', 'title' => $product->name];
        
        $this->viewBuilder()->layout('product');    
        $this->set([
            'product' => $product,
            'bread' => $bread,
            'page_title' => 'Products',
            'mt_for_layout' => $product->meta_title,
            'mk_for_layout' => $product->meta_keyword,
            'enable_fancy_box' => true,
            'md_for_layout' => $product->meta_description,
            'article' => $product->product_category->name . ' / ' . $product->name,
            'front_nav_selected' => 'products'
        ]);    
    }

    /**
     * Add to Featured method
     *  ID : CA-10
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function add_featured($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->is_featured = 1;
        $this->Products->save($product);
        $this->Flash->success(__('The product has been added to featured list.'));        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Remove to Featured method
     *  ID : CA-11
     *
     * @param string|null $id Product id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function remove_featured($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $product = $this->Products->get($id);
        $product->is_featured = 0;
        $this->Products->save($product);
        $this->Flash->success(__('The product has been removed to the featured list.'));        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * listing method
     * ID : CA-12
     */
    public function listing( ) {       
        $this->paginate = ['limit' => 4];        
        $products        = $this->Products->find('all')
            ->where(['Products.is_publish' => 1])
        ;

        $bread[] = ['url' => Router::url(['controller' => 'Products', 'action' => 'categories']), 'title' => 'Product Categories'];

        $this->viewBuilder()->layout('products');    
        $this->set('bread', $bread);
        $this->set('page_banner_name', 'products');
        $this->set('page_title', 'Products');        
        $this->set('front_nav_selected','products');
        $this->set('products', $this->Paginate($products));  
    }

    /**
     * Ajax load products by product category id method
     * ID : CA-13
     */
    public function ajax_load_products_by_category() { 
        $category_id = $this->request->data['product_category_id'];

        $products = $this->Products->find('all')
            ->where(['Products.is_publish' => 1, 'Products.product_category_id' => $category_id])            
        ;

        $this->viewBuilder()->layout('');            
        $this->set('products', $products);  
    }

    /**
     * Categories listing method
     * ID : CA-14
     */
    public function categories() {       
        $this->paginate = ['limit' => 3];          
        $categories = $this->Products->ProductCategories->find('all')
            ->where(['ProductCategories.parent_id' => 0])            
        ;

        $bread[] = ['url' => '', 'title' => 'Product Categories'];

        $this->viewBuilder()->layout('products');    
        $this->set('bread', $bread);
        $this->set('page_title', 'Product Categories');
        $this->set('front_nav_selected','products');
        $this->set('categories', $this->Paginate($categories));  
    }
}
