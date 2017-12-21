<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Routing\Router;

/**
 * News Controller
 *
 * @property \App\Model\Table\NewsTable $News
 */
class NewsController extends AppController
{
    public $helpers  = ['NavigationSelector'];
    public $paginate = ['maxLimit' => 10, 'order' => ['News.id' => 'DESC']];

    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $nav_selected = ["news"];
        $this->set('nav_selected', $nav_selected);

        $this->Auth->allow(['frontview','listing']);        
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
            $news = $this->News->find('all')
                ->where(['News.title LIKE' => '%' . $query . '%'])                                
            ;
        }else{
            $news = $this->News->find('all');
        }

        $this->set('news', $this->paginate($news));
        $this->set('_serialize', ['news']);
    }

    /**
     * View method_exists(object, method_name)
     *  ID : CA-03
     *
     * @param string|null $id News id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $news = $this->News->get($id, [
            'contain' => []
        ]);
        $this->set('news', $news);
        $this->set('_serialize', ['news']);
    }

    /**
     * Add method
     *  ID : CA-04
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $session = $this->request->session();    
        $user_data = $session->read('User.data');    

        $news = $this->News->newEntity();
        if ($this->request->is('post')) {
            $news = $this->News->patchEntity($news, $this->request->data);
            if ($this->News->save($news)) {
                $this->Flash->success(__('The news has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The news could not be saved. Please, try again.'));
            }
        }

        $default_posted_by = $user_data->fristname . ' ' . $user_data->lastname;

        $this->set(compact('news', 'default_posted_by'));
        $this->set('_serialize', ['news']);
    }

    /**
     * Edit method
     *  ID : CA-05
     *
     * @param string|null $id News id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $news = $this->News->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $news = $this->News->patchEntity($news, $this->request->data);
            if ($this->News->save($news)) {
                $this->Flash->success(__('The news has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The news could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('news'));
        $this->set('_serialize', ['news']);
    }

    /**
     * Delete method
     *  ID : CA-06
     *
     * @param string|null $id News id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $news = $this->News->get($id);
        if ($this->News->delete($news)) {
            $this->Flash->success(__('The news has been deleted.'));
        } else {
            $this->Flash->error(__('The news could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Publish method
     *  ID : CA-07
     *
     * @param string|null $id Page id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function publish($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $news = $this->News->get($id);
        $news->is_publish = 1;
        $this->News->save($news);
        $this->Flash->success(__('The news has been published.'));        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Unpublish method
     *  ID : CA-08
     *
     * @param string|null $id Page id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function unpublish($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $news = $this->News->get($id);
        $news->is_publish = 0;
        $this->News->save($news);
        $this->Flash->success(__('The news has been unpublished.'));        
        return $this->redirect(['action' => 'index']);
    }

    /**
     * frontview method
     * ID : CA-09  
     */
    public function frontview($id = null) {                 
        $news = $this->News->get($id, [
            'contain' => []
        ]);    

        $recentNews = $this->News->find()            
            ->order(['News.id' => 'DESC'])
            ->first()
        ;

        $bread[] = ['url' => Router::url(['controller' => 'News', 'action' => 'listing']), 'title' => 'News'];        
        $bread[] = ['url' => '', 'title' => $news->title];

        $this->viewBuilder()->layout('news');    
        $this->set([
            'news' => $news,
            'bread' => $bread,
            'recentNews' => $recentNews,
            'page_title' => 'News',
            'page_banner_name' => 'news',
            'mt_for_layout' => $news->meta_title,
            'mk_for_layout' => $news->meta_keyword,
            'md_for_layout' => $news->meta_description,
            'article' => $news->title,
            'front_nav_selected' => 'news'
        ]);    
    }

    /**
     * listing method
     * ID : CA-10  
     */
    public function listing() {                 
        $news = $this->News->find('all')
            ->where(['News.is_publish' => 1])
            ->order(['News.sorting' => 'DESC'])
        ;

        $recentNews = $this->News->find()            
            ->order(['News.id' => 'DESC'])
            ->first()
        ;
        
        $bread[] = ['url' => '', 'title' => 'News'];

        $this->viewBuilder()->layout('news');    
        $this->set('bread', $bread);
        $this->set('page_banner_name', 'news');
        $this->set('recentNews', $recentNews);
        $this->set('page_title', 'News');
        $this->set('front_nav_selected','news');
        $this->set('news', $this->Paginate($news));        
    }
}
