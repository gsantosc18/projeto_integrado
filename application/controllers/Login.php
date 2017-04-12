<?php

/**
 * @autor Gedalias dos Santos Caldas
 */
class Login extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Usuario_model');
  }

  function do_login(){
    header('Access-Control-Allow-Origin: *');
    $email = $this->input->post('email');
    $senha = $this->input->post('senha');

    $act_login = $this->Usuario_model->get_usuario(array('email'=>$email,'senha'=>md5($senha)));

    if(is_null($act_login)){
      echo json_encode(array('TRUE'));
    }
    else {
      echo json_encode(array('FALSE'));
    }
  }
  
  function do_cadastra(){
    header('Access-Control-Allow-Origin: *');
    $nome = $this->input->post('nome');
    $email = $this->input->post('email');
    $senha = $this->input->post('senha');
    $aniversario = $this->input->post('aniversario');

    $data = array(
      'nome'=>$nome,
      'email'=>$email,
      'senha'=>md5($senha),
      'aniversario'=>$aniversario // No formato DD/MM/AAAA
    );

    $this->Usuario_model->insert();
  }
}


 ?>
