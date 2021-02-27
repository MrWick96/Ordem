<?php

defined('BASEPATH') OR exit('Ação não permitda');

class Relatorios extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->ion_auth->logged_in()) {
            $this->session->set_flashdata('info', 'Sua sessão expirou!');
            redirect('login');
        }
    }

    /* Relatorios de vendas */

    public function vendas() {

        $data = array(
            'titulo' => 'Relatório de vendas'
        );

        $data_inicial = $this->input->post('data_inicial');
        $data_final = $this->input->post('data_final');

//        echo '<pre>';
//        print_r($this->input->post());
//        exit();

        if ($data_inicial) {

            $this->load->model('vendas_model');

            if ($this->vendas_model->gerar_relatorio_vendas($data_inicial, $data_final)) {

                //monto o pdf

                $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

                $vendas = $this->vendas_model->gerar_relatorio_vendas($data_inicial, $data_final);


                $file_name = 'Relatório de vendas';


                //inicio do html
                $html = '<html>';



                $html .= '<head>';


                $html .= '<title>' . $empresa->sistema_nome_fantasia . ' | Relatório de vendas</title>';

                $html .= '</head>';


                $html .= '<body style="font-size: 14px">';

                $html .= '<h4 align="center">               
                ' . 'Nome:&nbsp;' . $empresa->sistema_razao_social . '<br/>
                ' . 'CNPJ:&nbsp;' . $empresa->sistema_cnpj . '<br/>
                ' . 'Endereço:&nbsp;' . $empresa->sistema_endereco . 'Nº:&nbsp;' . $empresa->sistema_numero . '<br/>
                ' . 'Cidade:&nbsp;' . $empresa->sistema_cidade . ',&nbsp;Cep:&nbsp;' . $empresa->sistema_cep . ',&nbsp;UF:' . $empresa->sistema_estado . '<br/>
                ' . 'Telefone:&nbsp;' . $empresa->sistema_telefone_fixo . '<br/>
                ' . 'E-mail:&nbsp;' . $empresa->sistema_email . '<br/>
                  </h4>';


                $html .= '<hr>';



                if ($data_inicial && $data_final) {
                    $html .= '<p align="center" style="font-size: 16px">Relatório de vendas relazidas entre as seguintes datas:</p>';

                    $html .= '<p align="center" style="font-size: 16px">' . formata_data_banco_sem_hora($data_inicial) . ' - ' . formata_data_banco_sem_hora($data_final) . '</p>';
                } else {
                    $html .= '<p align="center" style="font-size: 16px">Relatório de vendas a partir da data:</p>';
                    $html .= '<p align="center" style="font-size: 16px">' . formata_data_banco_sem_hora($data_inicial) . '</p>';
                }

//                $html .= '<p>'
//                        . '<strong>Cliente: </strong>' . $venda->cliente_nome_completo . '<br/>'
//                        . '<strong>CPF: </strong>' . $venda->cliente_cpf_cnpj . '<br/>'
//                        . '<strong>Telefone: </strong>' . $venda->cliente_celular . '<br/>'
//                        . '<strong>Data de emissão: </strong>' . formata_data_banco_com_hora($venda->venda_data_emissao) . '<br/>'
//                        . '<strong>Forma de pagamento: </strong>' . $venda->forma_pagamento . '<br/>'
//                        . '</p>';



                $html .= '<hr>';

                //Dados da ordem
                $html .= '<table width="100%" border: solid #ddd 1px>';

                $html .= '<tr>';
                $html .= '<th>Venda:</th>';
                $html .= '<th>Data:</th>';
                $html .= '<th>Cliente:</th>';
                $html .= '<th>Forma de pagamento:</th>';
                $html .= '<th>Valor total:</th>';


                $html .= '</tr>';


                $valor_final_vendas = $this->vendas_model->get_valor_final_relatorio($data_inicial, $data_final);

                foreach ($vendas as $venda):


                    $html .= '<tr>';
                    $html .= '<td>' . $venda->venda_id . '</td>';
                    $html .= '<td>' . formata_data_banco_com_hora($venda->venda_data_emissao) . '</td>';
                    $html .= '<td>' . $venda->cliente_nome_completo . '</td>';
                    $html .= '<td>' . $venda->forma_pagamento . '</td>';
                    $html .= '<td>' . 'R$&nbsp;' . $venda->venda_valor_total . '</td>';
                    $html .= '</tr>';

                endforeach;

                $html .= '<th colspan="3">';

                $html .= '<td style="border-top: solid #ddd 1px"><strong>Valor Final:</strong></td>';
                $html .= '<td style="border-top: solid #ddd 1px">' . $valor_final_vendas->venda_valor_total . '</td>';

                $html .= '</th>';


                $html .= '</table>';


                $html .= '</body>';




                $html .= '</html>';

//                echo '<pre>';
//                print_r($html);
//                exit();
                //fasle -> abre pdf no navegador
                //true -> faz o download
                $this->pdf->createPDF($html, $file_name, false);
            }else {


                if (!empty($data_inicial) && !empty($data_final)) {
                    $this->session->set_flashdata('info', 'Não foram encontradas Vendas entre as datas ' . formata_data_banco_sem_hora($data_inicial) . '&nbsp;e&nbsp;' . formata_data_banco_sem_hora($data_final));
                } else {
                    $this->session->set_flashdata('info', 'Não foram encontradas Vendas a partir da data' . formata_data_banco_sem_hora($data_inicial));
                }
                redirect('relatorios/vendas');
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('relatorios/vendas');
        $this->load->view('layout/footer');
    }

    /* Relatorio de ordens de serviços */

    public function os() {

        $data = array(
            'titulo' => 'Relatório de Ordens de serviços'
        );

        $data_inicial = $this->input->post('data_inicial');
        $data_final = $this->input->post('data_final');


        if ($data_inicial) {

            $this->load->model('ordem_servicos_model');

            if ($this->ordem_servicos_model->gerar_relatorio_os($data_inicial, $data_final)) {

                //monto o pdf

                $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

                $ordens_servicos = $this->ordem_servicos_model->gerar_relatorio_os($data_inicial, $data_final);


                $file_name = 'Relatório de ordens de serviços';


                //inicio do html
                $html = '<html>';



                $html .= '<head>';


                $html .= '<title>' . $empresa->sistema_nome_fantasia . ' | Relatório de ordens de serviços</title>';

                $html .= '</head>';


                $html .= '<body style="font-size: 14px">';

                $html .= '<h4 align="center">               
                ' . 'Nome:&nbsp;' . $empresa->sistema_razao_social . '<br/>
                ' . 'CNPJ:&nbsp;' . $empresa->sistema_cnpj . '<br/>
                ' . 'Endereço:&nbsp;' . $empresa->sistema_endereco . 'Nº:&nbsp;' . $empresa->sistema_numero . '<br/>
                ' . 'Cidade:&nbsp;' . $empresa->sistema_cidade . ',&nbsp;Cep:&nbsp;' . $empresa->sistema_cep . ',&nbsp;UF:' . $empresa->sistema_estado . '<br/>
                ' . 'Telefone:&nbsp;' . $empresa->sistema_telefone_fixo . '<br/>
                ' . 'E-mail:&nbsp;' . $empresa->sistema_email . '<br/>
                  </h4>';


                $html .= '<hr>';



                if ($data_inicial && $data_final) {
                    $html .= '<p align="center" style="font-size: 16px">Relatório de ordens de serviços relazidas entre as seguintes datas:</p>';

                    $html .= '<p align="center" style="font-size: 16px">' . formata_data_banco_sem_hora($data_inicial) . ' - ' . formata_data_banco_sem_hora($data_final) . '</p>';
                } else {
                    $html .= '<p align="center" style="font-size: 16px">Relatório de ordens de serviçoes a partir da data:</p>';
                    $html .= '<p align="center" style="font-size: 16px">' . formata_data_banco_sem_hora($data_inicial) . '</p>';
                }


                $html .= '<hr>';

                //Dados da ordem
                $html .= '<table width="100%" border: solid #ddd 1px>';

                $html .= '<tr>';
                $html .= '<th>Ordem ID:</th>';
                $html .= '<th>Data:</th>';
                $html .= '<th>Cliente:</th>';
                $html .= '<th>Forma de pagamento:</th>';
                $html .= '<th>Valor total:</th>';


                $html .= '</tr>';


                $valor_final_os = $this->ordem_servicos_model->get_valor_final_relatorio_os($data_inicial, $data_final);

                foreach ($ordens_servicos as $os):


                    $html .= '<tr>';
                    $html .= '<td>' . $os->ordem_servico_id . '</td>';
                    $html .= '<td>' . formata_data_banco_com_hora($os->ordem_servico_data_emissao) . '</td>';
                    $html .= '<td>' . $os->cliente_nome_completo . '</td>';
                    $html .= '<td>' . $os->forma_pagamento . '</td>';
                    $html .= '<td>' . 'R$&nbsp;' . $os->ordem_servico_valor_total . '</td>';
                    $html .= '</tr>';

                endforeach;

                $html .= '<th colspan="3">';

                $html .= '<td style="border-top: solid #ddd 1px"><strong>Valor Final:</strong></td>';
                $html .= '<td style="border-top: solid #ddd 1px">' . $valor_final_os->ordem_servico_valor_total . '</td>';

                $html .= '</th>';


                $html .= '</table>';


                $html .= '</body>';




                $html .= '</html>';

//                echo '<pre>';
//                print_r($html);
//                exit();
                //fasle -> abre pdf no navegador
                //true -> faz o download
                $this->pdf->createPDF($html, $file_name, false);
            }else {


                if (!empty($data_inicial) && !empty($data_final)) {
                    $this->session->set_flashdata('info', 'Não foram encontradas Ordens de serviços entre as datas ' . formata_data_banco_sem_hora($data_inicial) . '&nbsp;e&nbsp;' . formata_data_banco_sem_hora($data_final));
                } else {
                    $this->session->set_flashdata('info', 'Não foram encontradas Ordens de serviços a partir da data ' . formata_data_banco_sem_hora($data_inicial));
                }
                redirect('relatorios/os');
            }
        }

        $this->load->view('layout/header', $data);
        $this->load->view('relatorios/os');
        $this->load->view('layout/footer');
    }

    public function receber() {

        $data = array(
            'titulo' => 'Relatório de contas a receber',
        );

        $contas = $this->input->post('contas');

        if ($contas == 'vencidas' || $contas == 'pagas' || $contas == 'receber') {

            $this->load->model('financeiro_model');

            if ($contas == 'vencidas') {

                $conta_receber_status = 0;

                $data_vencimento = TRUE;

                if ($contas = $this->financeiro_model->get_contas_receber_relatorio($conta_receber_status, $data_vencimento)) {


                    //formar PDf...................


                    $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

                    $contas = $this->financeiro_model->get_contas_receber_relatorio($conta_receber_status, $data_vencimento);


                    $file_name = 'Relatório de contas vencidas';


                    //inicio do html
                    $html = '<html>';



                    $html .= '<head>';


                    $html .= '<title>' . $empresa->sistema_nome_fantasia . ' | Relatório de contas vencidas</title>';

                    $html .= '</head>';


                    $html .= '<body style="font-size: 14px">';

                    $html .= '<h4 align="center">               
                ' . 'Nome:&nbsp;' . $empresa->sistema_razao_social . '<br/>
                ' . 'CNPJ:&nbsp;' . $empresa->sistema_cnpj . '<br/>
                ' . 'Endereço:&nbsp;' . $empresa->sistema_endereco . 'Nº:&nbsp;' . $empresa->sistema_numero . '<br/>
                ' . 'Cidade:&nbsp;' . $empresa->sistema_cidade . ',&nbsp;Cep:&nbsp;' . $empresa->sistema_cep . ',&nbsp;UF:' . $empresa->sistema_estado . '<br/>
                ' . 'Telefone:&nbsp;' . $empresa->sistema_telefone_fixo . '<br/>
                ' . 'E-mail:&nbsp;' . $empresa->sistema_email . '<br/>
                  </h4>';

                    $html .= '<hr>';

                    $html .= '<table width="100%" border: solid #ddd 1px>';

                    $html .= '<tr>';
                    $html .= '<th>Venda ID:</th>';
                    $html .= '<th>Data vencimento:</th>';
                    $html .= '<th>Cliente:</th>';
                    $html .= '<th>Situação:</th>';
                    $html .= '<th>Valor total:</th>';


                    $html .= '</tr>';


                    foreach ($contas as $conta):


                        $html .= '<tr>';
                        $html .= '<td>' . $conta->conta_receber_id . '</td>';
                        $html .= '<td>' . formata_data_banco_com_hora($conta->conta_receber_data_vencimento) . '</td>';
                        $html .= '<td>' . $conta->cliente_nome_completo . '</td>';
                        $html .= '<td>Vencida</td>';
                        $html .= '<td>' . 'R$&nbsp;' . $conta->conta_receber_valor . '</td>';
                        $html .= '</tr>';

                    endforeach;

                    $valor_final_contas = $this->financeiro_model->get_sum_contas_receber_relatorio($conta_receber_status, $data_vencimento);

                    $html .= '<th colspan="3">';

                    $html .= '<td style="border-top: solid #ddd 1px"><strong>Valor Final:</strong></td>';
                    $html .= '<td style="border-top: solid #ddd 1px">' . $valor_final_contas->conta_receber_valor_total . '</td>';

                    $html .= '</th>';


                    $html .= '</table>';


                    $html .= '</body>';




                    $html .= '</html>';

//                echo '<pre>';
//                print_r($html);
//                exit();
                    //fasle -> abre pdf no navegador
                    //true -> faz o download
                    $this->pdf->createPDF($html, $file_name, false);
                }else {

                    $this->session->set_flashdata('info', 'Não existem contas vencidas na base de dados');
                    redirect('relatorios/receber');
                }
            }
            
            
            if ($contas == 'pagas') {

                $conta_receber_status = 1;

                if ($contas = $this->financeiro_model->get_contas_receber_relatorio($conta_receber_status)) {


                    //formar PDf...................


                    $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

                    $contas = $this->financeiro_model->get_contas_receber_relatorio($conta_receber_status);


                    $file_name = 'Relatório de contas pagas';


                    //inicio do html
                    $html = '<html>';

                    $html .= '<head>';


                    $html .= '<title>' . $empresa->sistema_nome_fantasia . ' | Relatório de contas pagas</title>';

                    $html .= '</head>';


                    $html .= '<body style="font-size: 14px">';

                    $html .= '<h4 align="center">               
                ' . 'Nome:&nbsp;' . $empresa->sistema_razao_social . '<br/>
                ' . 'CNPJ:&nbsp;' . $empresa->sistema_cnpj . '<br/>
                ' . 'Endereço:&nbsp;' . $empresa->sistema_endereco . 'Nº:&nbsp;' . $empresa->sistema_numero . '<br/>
                ' . 'Cidade:&nbsp;' . $empresa->sistema_cidade . ',&nbsp;Cep:&nbsp;' . $empresa->sistema_cep . ',&nbsp;UF:' . $empresa->sistema_estado . '<br/>
                ' . 'Telefone:&nbsp;' . $empresa->sistema_telefone_fixo . '<br/>
                ' . 'E-mail:&nbsp;' . $empresa->sistema_email . '<br/>
                  </h4>';

                    $html .= '<hr>';

                    $html .= '<table width="100%" border: solid #ddd 1px>';

                    $html .= '<tr>';
                    $html .= '<th>Venda ID:</th>';
                    $html .= '<th>Data pagamento:</th>';
                    $html .= '<th>Cliente:</th>';
                    $html .= '<th>Situação:</th>';
                    $html .= '<th>Valor total:</th>';


                    $html .= '</tr>';


                    foreach ($contas as $conta):


                        $html .= '<tr>';
                        $html .= '<td>' . $conta->conta_receber_id . '</td>';
                        $html .= '<td>' . formata_data_banco_com_hora($conta->conta_receber_data_pagamento) . '</td>';
                        $html .= '<td>' . $conta->cliente_nome_completo . '</td>';
                        $html .= '<td>Paga</td>';
                        $html .= '<td>' . 'R$&nbsp;' . $conta->conta_receber_valor . '</td>';
                        $html .= '</tr>';

                    endforeach;

                    $valor_final_contas = $this->financeiro_model->get_sum_contas_receber_relatorio($conta_receber_status);

                    $html .= '<th colspan="3">';

                    $html .= '<td style="border-top: solid #ddd 1px"><strong>Valor Final:</strong></td>';
                    $html .= '<td style="border-top: solid #ddd 1px">' . $valor_final_contas->conta_receber_valor_total . '</td>';

                    $html .= '</th>';


                    $html .= '</table>';


                    $html .= '</body>';




                    $html .= '</html>';

//                echo '<pre>';
//                print_r($html);
//                exit();
                
                
                    //fasle -> abre pdf no navegador
                    //true -> faz o download
                    
                    
                    $this->pdf->createPDF($html, $file_name, false);
                }else {

                    $this->session->set_flashdata('info', 'Não existem contas pagas na base de dados');
                    redirect('relatorios/receber');
                }
            }
            
            
            if ($contas == 'receber') {
                

                $conta_receber_status = 0;

                if ($contas = $this->financeiro_model->get_contas_receber_relatorio($conta_receber_status)) {


                    //formar PDf...................


                    $empresa = $this->core_model->get_by_id('sistema', array('sistema_id' => 1));

                    $contas = $this->financeiro_model->get_contas_receber_relatorio($conta_receber_status);


                    $file_name = 'Relatório de contas a receber';


                    //inicio do html
                    $html = '<html>';

                    $html .= '<head>';


                    $html .= '<title>' . $empresa->sistema_nome_fantasia . ' | Relatório de contas a receber</title>';

                    $html .= '</head>';


                    $html .= '<body style="font-size: 14px">';

                    $html .= '<h4 align="center">               
                ' . 'Nome:&nbsp;' . $empresa->sistema_razao_social . '<br/>
                ' . 'CNPJ:&nbsp;' . $empresa->sistema_cnpj . '<br/>
                ' . 'Endereço:&nbsp;' . $empresa->sistema_endereco . 'Nº:&nbsp;' . $empresa->sistema_numero . '<br/>
                ' . 'Cidade:&nbsp;' . $empresa->sistema_cidade . ',&nbsp;Cep:&nbsp;' . $empresa->sistema_cep . ',&nbsp;UF:' . $empresa->sistema_estado . '<br/>
                ' . 'Telefone:&nbsp;' . $empresa->sistema_telefone_fixo . '<br/>
                ' . 'E-mail:&nbsp;' . $empresa->sistema_email . '<br/>
                  </h4>';

                    $html .= '<hr>';

                    $html .= '<table width="100%" border: solid #ddd 1px>';

                    $html .= '<tr>';
                    $html .= '<th>Venda ID:</th>';
                    $html .= '<th>Data vencimento:</th>';
                    $html .= '<th>Cliente:</th>';
                    $html .= '<th>Situação:</th>';
                    $html .= '<th>Valor total:</th>';


                    $html .= '</tr>';


                    foreach ($contas as $conta):


                        $html .= '<tr>';
                        $html .= '<td>' . $conta->conta_receber_id . '</td>';
                        $html .= '<td>' . formata_data_banco_sem_hora($conta->conta_receber_data_vencimento) . '</td>';
                        $html .= '<td>' . $conta->cliente_nome_completo . '</td>';
                        $html .= '<td>A receber</td>';
                        $html .= '<td>' . 'R$&nbsp;' . $conta->conta_receber_valor . '</td>';
                        $html .= '</tr>';

                    endforeach;

                    $valor_final_contas = $this->financeiro_model->get_sum_contas_receber_relatorio($conta_receber_status);

                    $html .= '<th colspan="3">';

                    $html .= '<td style="border-top: solid #ddd 1px"><strong>Valor Final:</strong></td>';
                    $html .= '<td style="border-top: solid #ddd 1px">' . $valor_final_contas->conta_receber_valor_total . '</td>';

                    $html .= '</th>';


                    $html .= '</table>';


                    $html .= '</body>';




                    $html .= '</html>';

//                echo '<pre>';
//                print_r($html);
//                exit();
                
                
                    //fasle -> abre pdf no navegador
                    //true -> faz o download
                    
                    
                    $this->pdf->createPDF($html, $file_name, false);
                }else {

                    $this->session->set_flashdata('info', 'Não existem contas a receber na base de dados');
                    redirect('relatorios/receber');
                }
            }

            //pagas
        }

        $this->load->view('layout/header', $data);
        $this->load->view('relatorios/receber');
        $this->load->view('layout/footer');
    }

}
