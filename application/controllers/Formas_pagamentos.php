<?php

defined('BASEPATH') OR exit('Ação não permitda');

class Formas_pagamentos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
    }

    public function index() {

        $data = array(
            'titulo' => 'Formas de pagamentos cadastradas',
            'styles' => array(
                'vendor/datatables/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(
                'vendor/datatables/jquery.dataTables.min.js',
                'vendor/datatables/dataTables.bootstrap4.min.js',
                'vendor/datatables/app.js'
            ),
            'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),
        );

//        echo '<>';
//        print_r($data['formas_pagamentos']);
//        exit();

        $this->load->view('layout/header', $data);
        $this->load->view('formas_pagamentos/index');
        $this->load->view('layout/footer');
    }

    public function edit($forma_pagamento_id = NULL) {

        if (!$forma_pagamento_id || $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))) {
            $this->session->set_flashdata('error', 'Forma de pagamento não encontrada');
            redirect('modulo');
        } else {

            $data = array(
                'titulo' => 'Formas de pagamentos cadastradas',
                'styles' => array(
                    'vendor/datatables/dataTables.bootstrap4.min.css',
                ),
                'scripts' => array(
                    'vendor/datatables/jquery.dataTables.min.js',
                    'vendor/datatables/dataTables.bootstrap4.min.js',
                    'vendor/datatables/app.js'
                ),
                'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos'),
            );


            //criar impedimento de desativaçao;


            $data = array(
                'titulo' => 'Editar forma de pagamento',
                'forma_pagamento' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
            );



            $this->load->view('layout/header', $data);
            $this->load->view('formas_pagamentos/edit');
            $this->load->view('layout/footer');
        }
    }

}
