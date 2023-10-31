<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class User{

  /**
   * Identificador único da vaga
   * @var integer
   */
  public $id;

  /**
   * Título do usuario
   * @var string
   */
  public $name;

  /**
   * Senha do usuario
   * @var string
   */
  public $password;

  /**
   * Descrição da vaga (pode conter html)
   * @var string
   */
  public $email;

  /**
   * Define se o cadastros está ativo
   * @var string(ativo/inativo)
   */
  public $status;

  /**
   * Tipo do usuario
   * @var string
   */
  public $userType;

  /**
   * Método responsável por cadastrar uma nova vaga no banco
   * @return boolean
   */
  public function register(){

    //INSERIR A VAGA NO BANCO
    $obDatabase = new Database('users');
    $this->id = $obDatabase->insert([
                                      'name'        => $this->name,
                                      'email'       => $this->email,
                                      'password'    => $this->password,
                                      'status'      => $this->status,
                                      'user_type'   => $this->userType,
                                    ]);
    //RETORNAR SUCESSO
    return true;
  }

  /**
   * Método responsável por fazer o usuario logar
   * @return boolean
   */
  public function login(){

    // INSERIR A USUÁRIO NO BANCO
    $obDatabase = new Database('users');
    $fields = "id, name, user_type";
    $where = "name = '{$this->name}' AND password = '{$this->password}'";
    $data = $obDatabase->select($where, null, null, $fields);
    
    if($data['id']){
      session_start();
      $_SESSION['id_usuario'] = $data['id'];
      $_SESSION['name_usuario'] = $data['name'];
      $_SESSION['type_usuario'] = $data['user_type'];
      return true; // Logado com sucesso
    }else {
      return false; // Falha no login
    }
  }
}