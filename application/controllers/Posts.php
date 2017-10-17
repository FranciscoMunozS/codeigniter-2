<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Posts extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('post');
    }

    public function index(){
        $data = array();

        //Obteniendo datos de la sesión
        if($this->session->userdata('success_msg')){
            $data['success_msg'] = $this->session->userdata('success_msg');
            $this->session->unset_userdata('success_msg');
        }
        if($this->session->userdata('error_msg')){
            $data['error_msg'] = $this->session->userdata('error_msg');
            $this->session->unset_userdata('error_msg');
        }

        $data['posts'] = $this->post->getRows();
        $data['title'] = 'Post Archive';

        //Cargar la lista en la pagina index
        $this->load->view('templates/header', $data);
        $this->load->view('posts/index', $data);
        $this->load->view('templates/footer');
    }

    /*
     * Detalles
     */
    public function view($id){
        $data = array();

        //Verificar que exista un ID
        if(!empty($id)){
            $data['post']  = $this->post->getRows($id);
            $data['title'] = $data['post']['title'];

            //Cargando los detalles en la pagina de vista
            $this->load->view('templates/header', $data);
            $this->load->view('posts/view', $data);
            $this->load->view('templates/footer');
        }else{
            redirect('/posts');
        }
    }

    /*
     * Ingresar
     */
    public function add(){
        $data = array();
        $postData = array();

        //Validaciones
        if($this->input->post('postSubmit')){
            //form field validation rules
            $this->form_validation->set_rules('title', 'post title', 'required');
            $this->form_validation->set_rules('content', 'post content', 'required');

            //Preparación de los datos
            $postData = array(
                'title'   => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

            //validar información ingresada
            if($this->form_validation->run() == true){
                //insert post data
                $insert = $this->post->insert($postData);

                if($insert){
                    $this->session->set_userdata('success_msg', 'Post has been added successfully.');
                    redirect('/posts');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }

        $data['post']   = $postData;
        $data['title']  = 'Create Post';
        $data['action'] = 'Add';

        //cargar la pagina de ingreso
        $this->load->view('templates/header', $data);
        $this->load->view('posts/add-edit', $data);
        $this->load->view('templates/footer');
    }

    /*
     * Actualizar
     */
    public function edit($id){
        $data = array();

        //Obtención de la información
        $postData = $this->post->getRows($id);

        //Validación
        if($this->input->post('postSubmit')){
            //validación de los campos ingresados
            $this->form_validation->set_rules('title', 'post title', 'required');
            $this->form_validation->set_rules('content', 'post content', 'required');

            //Preparación de la información a cargar
            $postData = array(
                'title'   => $this->input->post('title'),
                'content' => $this->input->post('content')
            );

            //validar información cargada
            if($this->form_validation->run() == true){
                //actualizar información
                $update = $this->post->update($postData, $id);

                if($update){
                    $this->session->set_userdata('success_msg', 'Post has been updated successfully.');
                    redirect('/posts');
                }else{
                    $data['error_msg'] = 'Some problems occurred, please try again.';
                }
            }
        }


        $data['post'] = $postData;
        $data['title'] = 'Update Post';
        $data['action'] = 'Edit';

        //cargar la pagina de edición
        $this->load->view('templates/header', $data);
        $this->load->view('posts/add-edit', $data);
        $this->load->view('templates/footer');
    }

    /*
     * Eliminar
     */
    public function delete($id){
        //Verificar que la ID exista
        if($id){
            //eliminar contenido
            $delete = $this->post->delete($id);

            if($delete){
                $this->session->set_userdata('success_msg', 'Post has been removed successfully.');
            }else{
                $this->session->set_userdata('error_msg', 'Some problems occurred, please try again.');
            }
        }

        redirect('/posts');
    }
}
