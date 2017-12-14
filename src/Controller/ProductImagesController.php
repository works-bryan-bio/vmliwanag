<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ProductImages Controller
 *
 * @property \App\Model\Table\ProductImagesTable $ProductImages
 */
class ProductImagesController extends AppController
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

        $session = $this->request->session();    
        $user_data = $session->read('User.data');  
        
        if( isset($user_data) ){
            if( $user_data->group_id == 1 ){ //Company
                $this->Auth->allow();
            } 
        }

        $this->set('nav_selected', $nav_selected);        
    }

    /**
     * Index method
     *  ID : CA-02
     *
     * @param string|null $id Product Image id.     
     * @return void
     */
    public function index( $id = null )
    {
        $product       = $this->ProductImages->Products->get($id);
        $productImages = $this->ProductImages->find('all')
            ->where(['ProductImages.product_id' => $id])
        ;
        $this->paginate = [
            'contain' => ['Products']
        ];

        $this->set(['enable_fancy_box' => true]);
        $this->set(compact('product'));
        $this->set('productImages', $this->paginate($productImages));
        $this->set('_serialize', ['productImages']);
    }

    /**
     * View method
     *  ID : CA-03
     *
     * @param string|null $id Product Image id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productImage = $this->ProductImages->get($id, [
            'contain' => ['Products']
        ]);
        $this->set('productImage', $productImage);
        $this->set('_serialize', ['productImage']);
    }

    /**
     * Add method
     *  ID : CA-04
     *
     * @param string|null $id Product Image id.
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add( $id = null )
    {
        $product      = $this->ProductImages->Products->get($id);        
        if ($this->request->is('post')) {
            $data = $this->request->data;              
            $count_images = 0;                      
            foreach( $this->request->data['photos'] as $key => $image ){                
                if( $image != '' ){  
                    $image_data['image']          = $image;
                    $image_data['product_id']     = $product->id;           
                    $image_data['is_cover_image'] = 0;       

                    $productImages = $this->ProductImages->newEntity();                    
                    $productImages = $this->ProductImages->patchEntity($productImages, $image_data);                    
                    if ($this->ProductImages->save($productImages)) {
                        $count_images++;                        
                    }
                }
            }

            if ($count_images > 0) {
                $this->Flash->success('The product image(s) has been saved.');
                return $this->redirect(['action' => 'index', $product->id]);
            } else {
                $this->Flash->error('The product image could not be saved. Please, try again.');
            }
        }

        $maxUpload = $this->ProductImages->maxImageUpload();        
        $this->set(compact('productImage', 'product', 'maxUpload'));
        $this->set('_serialize', ['productImage']);
    }

    /**
     * Edit method
     *  ID : CA-05
     *
     * @param string|null $id Product Image id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productImage = $this->ProductImages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productImage = $this->ProductImages->patchEntity($productImage, $this->request->data);
            if ($this->ProductImages->save($productImage)) {
                $this->Flash->success(__('The product image has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The product image could not be saved. Please, try again.'));
            }
        }
        $products = $this->ProductImages->Products->find('list', ['limit' => 200]);
        $this->set(compact('productImage', 'products'));
        $this->set('_serialize', ['productImage']);
    }

    /**
     * Delete method
     *  ID : CA-06
     *
     * @param string|null $id Product Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productImage = $this->ProductImages->get($id);
        $product_id   = $productImage->product_id;
        if( $productImage->is_cover_image == 1 ){
            $this->Flash->error(__('The product image is set as cover image. Image cannot not be deleted.'));
        }else{            
            if ($this->ProductImages->delete($productImage)) {
                $this->Flash->success(__('The product image has been deleted.'));
            } else {
                $this->Flash->error(__('The product image could not be deleted. Please, try again.'));
            }
        }        
        return $this->redirect(['action' => 'index', $product_id]);
    }

    /**
     * Update Product Cover Image method
     *  ID : CA-06
     *
     * @param string|null $id Product Image id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function update_product_cover_image($id = null)
    {        
        $this->request->allowMethod(['post']);
        $productImage = $this->ProductImages->get($id);
        $product      = $this->ProductImages->Products->get($productImage->product_id);

        $this->ProductImages->updateAll(['is_cover_image' => 0], ['product_id' => $product->id]);
        
        $productImage->is_cover_image = 1;
        $product->cover_image         = $productImage->image;

        $this->ProductImages->save($productImage);
        $this->ProductImages->Products->save($product);
        
        $this->Flash->success(__('The product cover image has been updated.'));        
        return $this->redirect(['action' => 'index', $product->id]);
    }
}
