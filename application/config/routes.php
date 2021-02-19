<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*Rotas para formas de pagamento*/
$route['modulo'] = 'Formas_pagamentos/index';
$route['modulo/add'] = 'Formas_pagamentos/add';
$route['modulo/edit/(:num)'] = 'Formas_pagamentos/edit/$1';
$route['modulo/del/(:num)'] = 'Formas_pagamentos/del/$1';

/*Rotas para ordem de serviços*/
$route['os'] = 'Ordem_servicos/index';
$route['os/add'] = 'Ordem_servicos/add';
$route['os/edit/(:num)'] = 'Ordem_servicos/edit/$1';
$route['os/del/(:num)'] = 'Ordem_servicos/del/$1';
$route['os/imprimir/(:num)'] = 'Ordem_servicos/imprimir/$1';
$route['os/pdf/(:num)'] = 'Ordem_servicos/pdf/$1';
