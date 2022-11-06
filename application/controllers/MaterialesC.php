<?php

    class MaterialesC extends CI_Controller
    {
        //show listaMateriales
        public function show(){
            $this->load->model('MaterialesM');
            $data['materiales'] = $this->MaterialesM->getMateriales();

            $this->load->view('headers/head.php');
            $this->load->view('headers/menu.php');
            $this->load->view('headers/footer.php');

            $this->load->view('materiales/listaMateriales.php', $data);
        }

        //ver Material
        public function detalleMaterial($id_Material){
            $this->load->model('MaterialesM');
            $data['material'] = $this->MaterialesM->getMaterial($id_Material);

            $this->load->view('headers/head.php');
            $this->load->view('headers/menu.php');
            $this->load->view('headers/footer.php');
            $this->load->view('materiales/detalleMaterial.php', $data);
        }

        // inserción de Material
        public function insertMaterial(){
            $this->load->model('MaterialesM');
            $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('nombre', 'nombre', 'required');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('headers/head.php');
                    $this->load->view('headers/menu.php');
                    $this->load->view('headers/footer.php');
                    $this->load->view('materiales/insertMaterial');
                } else{
                    $this->MaterialesM->insertMaterial();
                    redirect(base_url('index.php/MaterialesC/show'), 'refresh');
                }
        }

        // actualizar información de Material
        public function updateMaterial($id_Material){
            $this->load->model('MaterialesM');
            $data['material'] = $this->MaterialesM->getMaterial($id_Material);
            $this->load->helper(array('form', 'url'));
                $this->load->library('form_validation');
                $this->form_validation->set_rules('nombre', 'nombre', 'required');

                if($this->form_validation->run() == FALSE){
                    $this->load->view('headers/head.php');
                    $this->load->view('headers/menu.php');
                    $this->load->view('headers/footer.php');
                    $this->load->view('materiales/updateMaterial', $data);
                } else{
                    $this->MaterialesM->updateMaterial($id_Material);
                    redirect(base_url('index.php/MaterialesC/show'), 'refresh');
                }
        }
    }
?>