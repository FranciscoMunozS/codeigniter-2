<?php if (! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->model('product');
  }

  public function index() {

    if(!$this->session->userdata('isUserLoggedIn')){
		  redirect('users/login');
		}

    $data = array();

    if ($this->session->userdata('success_msg')) {
      $data['success_msg'] = $this->session->userdata('success_msg');
      $this->session->unset_userdata('success_msg');
    }
    if ($this->session->userdata('error_msg')) {
      $data['error_msg'] = $this->session->userdata('error_msg');
      $this->session->unset_userdata('error_msg');
    }

    $data['products'] = $this->product->getRows();
    $data['title'] = 'Product Archive';

    $this->load->view('templates/header', $data);
    $this->load->view('products/index', $data);
    $this->load->view('templates/footer');
  }

  public function add(){

    if(!$this->session->userdata('isUserLoggedIn')){
		  redirect('users/login');
		}

    $data = array();
    $productData = array();

    if ($this->input->post('productSubmit')) {

      $this->form_validation->set_rules('brand', 'Marca', 'required');
      $this->form_validation->set_rules('model', 'Modelo', 'required');
      $this->form_validation->set_rules('serial', 'Nº de serie', 'required');
      $this->form_validation->set_rules('description', 'Descripción', 'required');

      $productData = array(
        'brand' => $this->input->post('brand'),
        'model' => $this->input->post('model'),
        'serial' => $this->input->post('serial'),
        'description' => $this->input->post('description')
      );

      if ($this->form_validation->run() == true) {
        $insert = $this->product->insert($productData);

        if ($insert) {
          $this->session->set_userdata('success_msg', 'Producto creado');
          redirect('/products');
        } else {
          $data['error_msg'] = 'Error al crear el registro';
        }
      }
    }
    $data['product'] = $productData;
    $data['title'] = 'Crear producto';
    $data['action'] = 'Agregar';

    $this->load->view('templates/header', $data);
    $this->load->view('products/add-edit', $data);
    $this->load->view('templates/footer');
  }

  public function edit($id) {
    
    $data = array();

    $productData = $this->product->getRows($id);

    if ($this->input->post('productSubmit')) {
      $this->form_validation->set_rules('brand', 'Marca', 'required');
      $this->form_validation->set_rules('model', 'Modelo', 'required');
      $this->form_validation->set_rules('serial', 'Numero de serie', 'required');
      $this->form_validation->set_rules('description', 'Description', 'required');

      $postData = array(
        'brand'       => $this->input->post('brand'),
        'model'       => $this->input->post('model'),
        'serial'      => $this->input->post('serial'),
        'description' => $this->input->post('description')
      );

      if ($this->form_validation->run() == true) {
        $update = $this->post->update($productData, $id);

        if ($update) {
          $this->session->set_userdata('success_msg', 'Datos actualizados correctamente.');
          redirect('/products');
        } else {
          $data['error_msg'] = 'Ha ocurrido un error. Por favor, reintente nuevamente.';
        }
      }
    }

    $data['product'] = $productData;
    $data['title']   = 'Actualizar datos producto';
    $data['action']  = 'Editar';

    $this->load->view('templates/header', $data);
    $this->load->view('products/add-edit', $data);
    $this->load->view('templates/footer');
  }
}
