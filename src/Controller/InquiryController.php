<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
use Cake\Network\Exception\NotFoundException;

/**
 * Pages Controller
 *
 * @property \App\Model\Table\PagesTable $Pages
 */
class InquiryController extends AppController
{
    /**
     * initialize method
     *  ID : CA-01
     * 
     */
    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['ajax_send_contact_us','ajax_send_get_product']);        
    }

    /**
     * Ajax Send Contact Us
     *  ID : CA-02
     *
     * @return void
     */
    public function ajax_send_contact_us()
    {   
        $this->CompanyDetails = TableRegistry::get('CompanyDetails');

        $companyDetails = $this->CompanyDetails->get(1);

        $json_data['is_success'] = false;
        $json_data['message']    = "<div class=\"alert alert-danger\" role=\"alert\">Something went wrong. Please try again</div>"; 

        if ($this->request->is('post')) {  
            $request_data = $this->request->data;                
            if( !empty($request_data) && isset($request_data['email']) ){
              $admin_email = $companyDetails->inquiry_recipient;      

              $email = new Email('cake_smtp');   
              $email->from(['websystem@nixstage.com' => 'Aimalube System'])
                  ->template('contact_us')
                  ->emailFormat('html')
                  ->to($admin_email)                                    
                  ->subject('Aimalube : Inquiry')                  
                  ->viewVars(['inquiry' => $request_data])
                  ->send();

              $json_data['is_success'] = true;
              $json_data['message'] = "<br />
                  <div class=\"alert alert-success\">
                    <p>Your inquiry was successfully sent</p>
                    <p>Thank you!</p>
                  </div>
              ";               
            }else{
              $json_data['message'] = "<div class=\"alert alert-danger\" role=\"alert\">Cannot send email. Please try again.</div>";
            }                   
        }

        $this->viewBuilder()->layout('');        
        echo json_encode($json_data);
        exit;
    }

    /**
     * Ajax Send Get Product
     *  ID : CA-03
     *
     * @return void
     */
    public function ajax_send_get_product()
    {   
        $this->CompanyDetails = TableRegistry::get('CompanyDetails');        

        $companyDetails = $this->CompanyDetails->get(1);

        $json_data['is_success'] = false;
        $json_data['message']    = "<div class=\"alert alert-danger\" role=\"alert\" style='border-radius:0px !important;' >Something went wrong. Please try again</div>"; 

        if ($this->request->is('post')) {  
            $request_data = $this->request->data;                
            if( !empty($request_data) && isset($request_data['email']) ){
              $admin_email = $companyDetails->inquiry_recipient;      

              $email = new Email('cake_smtp');   
              $email->from(['websystem@nixstage.com' => 'Aimalube System'])
                  ->template('get_product')
                  ->emailFormat('html')
                  ->to($admin_email)                                    
                  ->subject('Aimalube : Product Inquiry')                  
                  ->viewVars(['inquiry' => $request_data])
                  ->send();

              $json_data['is_success'] = true;
              $json_data['message'] = "<br />
                  <div class=\"alert alert-success\" style='border-radius:0px !important;'>
                    <p>Your inquiry was successfully sent</p>
                    <p>Thank you!</p>
                  </div>
              ";               
            }else{
              $json_data['message'] = "<div class=\"alert alert-danger\" role=\"alert\" style='border-radius:0px !important;'>Cannot send email. Please try again.</div>";
            }                   
        }

        $this->viewBuilder()->layout('');        
        echo json_encode($json_data);
        exit;
    }
}
