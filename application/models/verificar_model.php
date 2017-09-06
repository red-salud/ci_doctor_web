<?php  
    class Verificar_model extends CI_Model {  
    public function construct()     {       
    parent::__construct();         
    $this->load->database();//con esto hacemos que pueda cargar nuestra base de datos con el modelo
    }

    function verificar($email,$pass)
    {
        $this->db->where('email_Doc', $email);
        $this->db->where('pass_Doc', $pass);
        $query = $this->db->get('doctor');

        if ($query->num_rows()==1)
        {
            return $query->result();
        }
        else
        {
            header("Location: verificar");
        }
    }


    function verificaProveedor($email,$pass)
    {
        
        $this->db->where('prov_email1', $email);
        $this->db->where('prov_pass', $pass);
        $query = $this->db->get('proveedor');

        if ($query->num_rows()==1)
        {
            //return $query->result();
            return $query->row_array();
        }
        else
        {
            header("Location: http://www.red-salud.com/ci_doctorweb/failLogin");
            //header("Location: http://www.google.com.pe");
        }
    }


    /*function verificaProveedor($email,$pass)
    {
        
        $this->db->where('prov_email1', $email);
        $this->db->where('prov_pass', $pass);
        $query = $this->db->get('proveedor');
        return $query->result();
        return $query->row_array();
        
    }*/


    function consultaNombreProveedor($email){

        $query = $this->db->get_where('proveedores', array('email1_Prov' => $email));
        return $query->row_array();

        //$query = $this->db->query('SELECT nom_Doc FROM doctor WHERE email_Doc=$email');
        //return $query;
    }





    function consultaNombre($email){

        $query = $this->db->get_where('doctor', array('email_Doc' => $email));
        return $query->row_array();

        //$query = $this->db->query('SELECT nom_Doc FROM doctor WHERE email_Doc=$email');
        //return $query;
    }

    function consultaNombreId($id){

        $query = $this->db->get_where('doctor', array('id_Doc' => $id));
        return $query->row_array();

        //$query = $this->db->query('SELECT nom_Doc FROM doctor WHERE email_Doc=$email');
        //return $query;
    }
}