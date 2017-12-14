<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Abouts Controller
 *
 * @property \App\Model\Table\AboutsTable $Abouts
 */
class AboutsController extends AppController
{
    public $helpers  = ['NavigationSelector'];
    public $paginate = ['maxLimit' => 10, 'order' => ['Abouts.id' => 'DESC']];

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["abouts"];
        $this->set('nav_selected', $nav_selected);

        $this->Auth->allow(['frontview']);        
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
            $abouts = $this->Abouts->find('all')
                ->where(['Abouts.name LIKE' => '%' . $query . '%'])                                
            ;
        }else{
            $abouts = $this->Abouts->find('all');
        }  

        $this->set('abouts', $this->paginate($abouts));
        $this->set('_serialize', ['abouts']);
    }

    /**
     * View method
     *  ID : CA-03
     *
     * @param string|null $id About id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $about = $this->Abouts->get($id, [
            'contain' => []
        ]);
        $this->set('about', $about);
        $this->set('_serialize', ['about']);
    }

    /**
     * Add method
     *  ID : CA-04
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $about = $this->Abouts->newEntity();
        if ($this->request->is('post')) {
            $about = $this->Abouts->patchEntity($about, $this->request->data);
            if ($this->Abouts->save($about)) {
                $this->Flash->success(__('The about has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The about could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('about'));
        $this->set('_serialize', ['about']);
    }

    /**
     * Edit method
     *  ID : CA-05
     *
     * @param string|null $id About id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $about = $this->Abouts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $about = $this->Abouts->patchEntity($about, $this->request->data);
            if ($this->Abouts->save($about)) {
                $this->Flash->success(__('The about has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The about could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('about'));
        $this->set('_serialize', ['about']);
    }

    /**
     * Delete method
     *  ID : CA-06
     *
     * @param string|null $id About id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $about = $this->Abouts->get($id);
        if ($this->Abouts->delete($about)) {
            $this->Flash->success(__('The about has been deleted.'));
        } else {
            $this->Flash->error(__('The about could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
