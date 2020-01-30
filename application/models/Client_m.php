<?php
defined('BASEPATH') or exit('No direct script access allowed');

use GuzzleHttp\Client;

class Client_m extends CI_Model
{
    private $_client;

    public function __construct()
    {
        parent::__construct();
        $this->_client = new Client([
            'base_uri' => 'http://localhost/restserver/pengunjung/',
            'auth' => ['admin', '1234']
        ]);
    }

    public function getAll()
    {
        $response = $this->_client->request('GET', 'user', [
            'query' => [
                'awal_key' => 'awal111'
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result->data;
    }

    public function getById($id)
    {
        $response = $this->_client->request('GET', 'user', [
            'query' => [
                'awal_key' => 'awal111',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result->data;
    }

    public function update($data)
    {
        $response = $this->_client->request('PUT', 'user', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result->status;
    }

    public function add($data)
    {
        $response = $this->_client->request('POST', 'user', [
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result->status;
    }

    public function delete($id)
    {
        $response = $this->_client->request('DELETE', 'user', [
            'form_params' => [
                'awal_key' => 'awal111',
                'id' => $id
            ]
        ]);
        $result = json_decode($response->getBody()->getContents());
        return $result->status;
    }
}
