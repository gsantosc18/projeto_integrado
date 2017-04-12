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
  /**
  * Realiza o login do usuario
  */
  function do_login(){
    // Permite requisições POST de outras origens
    header('Access-Control-Allow-Origin: *');
    // Recupera o email do usuario enviado
    $email = $this->input->post('email');
    // Recupera a senha do usuario
    $senha = $this->input->post('senha');
    // Realiza a verificação de login e senha
    $act_login = $this->Usuario_model->get_usuario(array('email'=>$email,'senha'=>md5($senha)));
    // Se houver um login e senha cadastrado
    if(is_null($act_login)){
      // Retorna TRUE para a pagina JSON
      echo json_encode(array('TRUE'));
    }
    else {
      // Retorna FALSE para a pagina JSON
      echo json_encode(array('FALSE'));
    }
  }
  /**
  * Realiza do cadastro de usuario
  */
  function do_cadastra(){
    // Permite requisições POST de outras origens
    header('Access-Control-Allow-Origin: *');
    // Recupera o nome do usuario enviado
    $nome = $this->input->post('nome');
    // Recupera o email do usuario enviado
    $email = $this->input->post('email');
    // Recupera a senha do usuario
    $senha = $this->input->post('senha');
    // Recupera a data de aniversario do ususario
    $aniversario = $this->input->post('aniversario');
    // Junta das as informações do usuario e passa para o banco
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
