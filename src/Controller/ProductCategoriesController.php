<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductCategories Controller
 *
 * @property \App\Model\Table\ProductCategoriesTable $ProductCategories
 */
class ProductCategoriesController extends AppController
{
    public $helpers  = ['NavigationSelector'];
    public $paginate = ['maxLimit' => 10, 'order' => ['productCategories.id' => 'DESC']];

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["system_settings"];
        $this->set('nav_selected', $nav_selected);

        $this->Auth->allow(['frontview']);        
    }

    /**
     * Index method
     *
     * @param string|null $id Product Category id.
     * @return void
     */
    public function index( $id = null )
    {
        $productCategoryParent = array();
        if( $id > 0 ){
            $productCategoryParent = $this->ProductCategories->get($id);
        }

        if( isset($this->request->query['query']) ){
            $query = $this->request->query['query'];
            if( $id > 0 ){
                $productCategories = $this->ProductCategories->find('all')
                    ->where(['ProductCategories.name LIKE' => '%' . $query . '%','ProductCategories.parent_id' => $id])                                
                ;
            }else{
                $productCategories = $this->ProductCategories->find('all')
                    ->where(['ProductCategories.name LIKE' => '%' . $query . '%'])                                
                ;
            }
            
        }else{
            if( $id > 0 ){
                $productCategories = $this->ProductCategories->find('all')
                    ->where(['ProductCategories.parent_id' => $id])                                
                ;
            }else{
                $productCategories = $this->ProductCategories->find('all')
                    ->where(['ProductCategories.parent_id' => 0])                                
                ;  
            }            
        }  

        $this->set('parent_id', $id);
        $this->set(['enable_fancy_box' => true]);
        $this->set('productCategoryParent', $productCategoryParent);
        $this->set('productCategories', $this->paginate($productCategories));
        $this->set('_serialize', ['productCategories']);
    }

    /**
     * View method
     *
     * @param string|null $id Product Category id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => ['ParentProductCategories', 'ChildProductCategories']
        ]);
        $this->set('productCategory', $productCategory);
        $this->set('_serialize', ['productCategory']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add( $id = null )
    {
        $productCategory = $this->ProductCategories->newEntity();

        $productCategoryParent = array();
        if( $id > 0 ){
            $productCategoryParent = $this->ProductCategories->get($id);
        }

        if ($this->request->is('post')) {
            if( $id > 0 ){
                $this->request->data['parent_id'] = $id;
            }else{
                $this->request->data['parent_id'] = 0;
            }

            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->data);            
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    if( $id > 0 ){
                        return $this->redirect(['action' => 'index', $id]);
                    }else{
                        return $this->redirect(['action' => 'index']);    
                    }
                }else{
                    if( $id > 0 ){
                        return $this->redirect(['action' => 'add', $id]);
                    }else{
                        return $this->redirect(['action' => 'add']);
                    }                    
                }                    
            } else {
                $this->Flash->error(__('The product category could not be saved. Please, try again.'));
            }
        }
        
        $this->set(compact('productCategory', 'productCategoryParent'));
        $this->set('_serialize', ['productCategory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Category id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productCategory = $this->ProductCategories->get($id, [
            'contain' => ['ParentProductCategories']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategories->patchEntity($productCategory, $this->request->data);
            if ($this->ProductCategories->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    if( $productCategory->parent_id > 0 ){
                        return $this->redirect(['action' => 'index', $productCategory->parent_id]);
                    }else{
                        return $this->redirect(['action' => 'index']);
                    }                    
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The product category could not be saved. Please, try again.'));
            }
        }
        $parentProductCategories = $this->ProductCategories->ParentProductCategories->find('list', ['limit' => 200]);
        $this->set(compact('productCategory', 'parentProductCategories'));
        $this->set('_serialize', ['productCategory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategories->get($id);
        $parent_id = $productCategory->parent_id;
        if ($this->ProductCategories->delete($productCategory)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }
        if( $parent_id > 0 ){
            return $this->redirect(['action' => 'index', $parent_id]);
        }else{
            return $this->redirect(['action' => 'index']);
        }        
    }
}
