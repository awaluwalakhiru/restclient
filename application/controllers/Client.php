<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_m');
    }

    public function index()
    {
        $data['judul'] = 'Rest Client';
        $data['pengunjung'] = $this->client_m->getAll();
        $this->load->view('data', $data);
    }

    public function byId()
    {
        $id = $this->input->post('id');
        $data = $this->client_m->getById($id);
        echo json_encode($data);
    }

    public function update()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'hobi' => $this->input->post('hobi'),
            'awal_key' => 'awal111',
            'id' => $id
        ];
        $query = $this->client_m->update($data);
        echo json_encode($query);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $query = $this->client_m->delete($id);
        echo json_encode($query);
    }

    public function add()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'hp' => $this->input->post('hp'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'hobi' => $this->input->post('hobi'),
            'awal_key' => 'awal111',
        ];
        $query = $this->client_m->add($data);
        // var_dump($query);
        echo json_encode($query);
    }

    public function loadPage()
    {
        $data = $this->client_m->getAll();
        $url = $this->input->post('url');
        $output = '';
        if ($data != null) {
            foreach ($data as $row) {
                $output .= '
                <li class="list-group-item d-flex justify-content-between align-items-center"><strong>' . $row->nama . '</strong>
                     <div class="btn-group btn-group-sm">
                         <a href="' . $url . '" class="badge badge-primary mr-1 detail" data-toggle="modal" data-target="#modalDetail" data-id="' . $row->id . '">detail</a>
                         <a href="' . $url . '" class="badge badge-warning mr-1 ubah" data-toggle="modal" data-target="#modalUbah" data-id="' . $row->id . '">ubah</a>
                         <a href="' . $url . '" class="badge badge-danger mr-1 hapus" data-toggle="modal" data-target="#modalHapus" data-id="' . $row->id . '">hapus</a>
                     </div>
                 </li>';
            }
        } else {
            $output .= '<li class="list-group-item d-flex justify-content-center align-items-center">Data tidak ditemukan</li>';
        }

        echo $output;
    }
}
