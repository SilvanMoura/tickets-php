<?php

namespace App\Entity;

use \App\Db\Database;

class Ticket
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
    public $title;

    /**
     * Título do usuário
     * @var string
     */
    public $name;

    /**
     * Tipo do usuário
     * @var string
     */
    public $userType;

    /**
     * Tipo do usuário
     * @var string
     */
    public $type;

    /**
     * Tipo do usuário
     * @var integer
     */
    public $getTicket;

    /**
     * Tipo do usuário
     * @var string
     */
    public $closeReason;

    /**
     * Tipo do usuário
     * @var string
     */
    public $descricao;

    /**
     * Tipo do usuário
     * @var integer
     */
    public $responseId;

    /**
     * Tipo do usuário
     * @var string
     */
    public $closeData;

    /**
     * Tipo do usuário
     * @var integer
     */
    public $creatorId;

    /**
     * Tipo do usuário
     * @var string
     */
    public $openData;

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function getAllTicketsAdmin()
    {
        $obDatabase = new Database('tickets');
        $data = $obDatabase->select();
        return $data;
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function getAllTicketsByIdPeople()
    {
        $obDatabase = new Database('tickets');
        $where = "user_id = '{$this->id}'";
        $data = $obDatabase->select($where);
        return $data;
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function getTicketsById()
    {
        $obDatabase = new Database('tickets');
        $where = "protocol = '{$this->id}'";
        $data = $obDatabase->select($where);
        return $data[0];
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function deleteTicketsById()
    {
        $obDatabase = new Database('tickets');
        $where = "protocol = '{$this->id}'";
        $data = $obDatabase->delete($where);
        return "success";
    }
    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function closeTicketsById()
    {
        $dataAtual = date('Y-m-d'); // Formato: Ano-Mês-Dia (por exemplo, "2023-10-31")

        // Obter a hora atual
        $horaAtual = date('H:i:s'); // Formato: Hora:Minuto:Segundo (por exemplo, "14:30:00")

        $horaUpdate = "$dataAtual $horaAtual";

        return (new Database('tickets'))->update('protocol = ' . $this->id, [
            'closed_at' => $horaUpdate,
            'closure_reason' => $this->closeReason
        ]);
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function updateTicketsById()
    {
        return (new Database('tickets'))->update('protocol = ' . $this->id, [
            'title' => $this->title,
            'type' => $this->type,
            'description' => $this->descricao,
            'responsible_id' => $this->responseId,
            'closed_at' => $this->closeData,
            'closure_reason' => $this->closeReason,
            'created_by' => $this->creatorId
        ]);
    }

    /**
     * Método responsável por obter todos os tickets para o usuário administrador
     * @return array
     */
    public function createTicket()
    {
        $dataAtual = date('Y-m-d'); 
        $horaAtual = date('H:i:s');
        $horaUpdate = "$dataAtual $horaAtual";
        
        $obDatabase = new Database('tickets');
        
        $this->id = $obDatabase->insert([
            'title'          => $this->title,
            'type'           => $this->type,
            'description'    => $this->descricao,
            'user_id'        => $this->creatorId,
            'responsible_id' => $this->responseId,
            'open_at'        => $horaUpdate,
            'created_by'     => $this->creatorId,
            'created_at'     => $horaUpdate,
        ]);
        
        //RETORNAR SUCESSO
        return true;
    }
}
