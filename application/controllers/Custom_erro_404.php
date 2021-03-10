<?php

defined('BASEPATH') OR exit('Ação não permitda');

class Custom_erro_404 extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }

        public function index() {
            
            $data = array(
                'titulo' => 'Pagina não encontrada',
            );
        
        $this->load->view('custom_erro_404', $data);
        
    }
    
}