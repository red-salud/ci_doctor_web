<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
        class Verificar extends CI_Controller {     
            function __construct()     {         
                parent::__construct();         
                $this->load->model('verificar_model');
                $this->load->helper('form');
                $this->load->library('form_validation');
    }
 
    function index()
    {
        $data['title'] = 'Formulario de login';
        $this->load->view('view_loginDoctor', $data);
    }

    function failLogin()
    {
        $data['title'] = 'Formulario de login';
        $this->load->view('view_loginDoctorFail', $data);
    }
 
    function nueva_sesion()
        {
        $this->form_validation->set_rules('email', 'email_Doc', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'pass_Doc', 'trim|required|xss_clean');
 
        $this->form_validation->set_message('required', 'El %s es requerido');
 
        if ($this->form_validation->run() == FALSE)
            {
            $this->index();
                //$this->load->view('microseguro/view_buscaConsulta');
            }
        else
            {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            //comprobamos si existen en la base de datos enviando los datos al modelo
            $login = $this->verificar_model->verificar($email, $pass);
            if ($login)
            {              
            $miNombre = $this->verificar_model->consultaNombre($email);
            $datos['tipo_Doc'] = $miNombre['tipo_Doc'];
            $datos['nom_Doc'] = $miNombre['nom_Doc'];
            $datos['nomCm_Doc'] = $miNombre['nomCm_Doc'];
            $datos['apePat_Doc'] = $miNombre['apePat_Doc'];
            $datos['apeMat_Doc'] = $miNombre['apeMat_Doc'];
            $datos['email_Doc'] = $miNombre['email_Doc'];
            $datos['pass_Doc'] = $miNombre['pass_Doc'];
            $datos['id_Doc'] = $miNombre['id_Doc'];
            $datos['est_Doc'] = $miNombre['est_Doc'];
            $datos['ruc_Doc'] = $miNombre['ruc_Doc'];
            $datos['direc_Doc'] = $miNombre['direc_Doc'];
            $datos['dep_Doc'] = $miNombre['dep_Doc'];
            $datos['ciu_Doc'] = $miNombre['ciu_Doc'];
            $datos['afi_Doc'] = $miNombre['afi_Doc'];

             $datos['dni_Doc'] = $miNombre['dni_Doc'];
             $datos['ncol_Doc'] = $miNombre['ncol_Doc'];
             $datos['esp_Doc'] = $miNombre['esp_Doc'];
             $datos['rne_Doc'] = $miNombre['rne_Doc'];
             $datos['tel_Doc'] = $miNombre['tel_Doc'];
             $datos['cel_Doc'] = $miNombre['cel_Doc'];

             if ($datos['afi_Doc']=="ARC"){

                $this->load->view('view_mcaPrincipal',$datos);
                //$this->load->view('welcome_message',$datos);
             }else{
            
            if (isset($datos['tipo_Doc'])) {

                switch ($datos['tipo_Doc']) {
                    case "Médico":
                        $this->load->view('view_formRegDocMed',$datos);
                        break;
                    case "Centro Médico":
                        $this->load->view('view_formRegDocCM',$datos);
                        break;
                    case "Laboratorio":
                        $this->load->view('view_formRegDocCM',$datos);
                        break;
                    case "Farmacia":
                        $this->load->view('view_formRegDocCM',$datos);
                        break;
                }
                
            }
            else{
            $this->load->view('view_elijeTipoDoc',$datos);
            }
            }            
            }
        }
    }


    function prov_sesion()
        {
        $this->form_validation->set_rules('email', 'email1_Prov', 'trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'pass_Prov', 'trim|required|xss_clean');
 
        $this->form_validation->set_message('required', 'El %s es requerido');
 
        if ($this->form_validation->run() == FALSE)
            {
            $this->index();
                //$this->load->view('microseguro/view_buscaConsulta');
            }
        else
            {
            $email = $this->input->post('email');
            $pass = $this->input->post('pass');
            //comprobamos si existen en la base de datos enviando los datos al modelo
            $login = $this->verificar_model->verificaProveedor($email, $pass);
            if ($login)
            {              
            //$miNombre = $this->verificar_model->consultaNombreProveedor($email);
            
            $datos['nomEst_Prov'] = $login['prov_nomCom'];            
            $datos['red_id'] = $login['red_id'];
            $datos['est_Prov'] = $login['prov_est'];
            $datos['prov_id'] = $login['prov_id'];
            
             if ($datos['est_Prov']=="1"){

                $this->load->view('view_mcaPrincipal',$datos);
                //$this->load->view('welcome_message',$datos);
             }
             /*else{
            
            if (isset($datos['tipo_Doc'])) {

                switch ($datos['tipo_Doc']) {
                    case "Médico":
                        $this->load->view('view_formRegDocMed',$datos);
                        break;
                    case "Centro Médico":
                        $this->load->view('view_formRegDocCM',$datos);
                        break;
                    case "Laboratorio":
                        $this->load->view('view_formRegDocCM',$datos);
                        break;
                    case "Farmacia":
                        $this->load->view('view_formRegDocCM',$datos);
                        break;
                }
                
            }
            else{
            $this->load->view('view_elijeTipoDoc',$datos);
            }
            }*/            
            } else {
                $this->load->view('view_loginDoctorFail');
            }
        }
    }

}