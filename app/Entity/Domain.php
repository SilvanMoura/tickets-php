<?php

namespace App\Entity;

use \App\Db\Database;

class Domain
{
    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título do usuário
     * @var string
     */
    public $name;

    /**
     * Título do usuário
     * @var string
     */
    public $domain;

    /**
     * Tipo do usuário
     * @var string
     */
    public $status;

    /**
     * Tipo do usuário
     * @var string
     */
    public $creatorId;

    public function getAllDomains()
    {
        $obDatabase = new Database('domains');
        $data = $obDatabase->select();
        return $data;
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function getDomainsById()
    {
        $obDatabase = new Database('domains');
        $where = "id = '{$this->id}'";
        $data = $obDatabase->select($where);
        return $data[0];
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function createDomain()
    {
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s');
        $horaUpdate = "$dataAtual $horaAtual";
        
        $obDatabase = new Database('domains');
        
        $this->id = $obDatabase->insert([
            'name'        => $this->name,
            'domain'      => $this->domain,
            'status'      => $this->status,
            'created_by'  => $this->creatorId,
            'created_at'  => $horaUpdate,
            'updated_at'  => $horaUpdate,
        ]);
        
        //RETORNAR SUCESSO
        return true;
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function tradeStatusDomain()
    {
        return (new Database('domains'))->update('id = ' . $this->id, [
            'status' => $this->status
        ]);
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function deleteDomainById()
    {
        $obDatabase = new Database('domains');
        $where = "id = '{$this->id}'";
        $data = $obDatabase->delete($where);
        return "success";
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function updateDomainsById()
    {
        
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s');
        $horaUpdate = "$dataAtual $horaAtual";
        
        return (new Database('domains'))->update('id = ' . $this->id, [
            'name' => $this->name,
            'domain' => $this->domain,
            'status' => $this->status,
            'updated_at' => $horaUpdate
        ]);
    }
    

}
