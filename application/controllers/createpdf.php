<?php
function pdf()
{
    $this->load->helper('pdf_helper');
    
    $dni = $this->input->post('dni');
	 $nomEst_Prov = $this->input->post('nomEst_Prov');  
    
     //comprobamos si existen en la base de datos enviando los datos al modelo
     $this->load->model('doctor_mdl');
     $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

     if ($buscaAseg)
       {
       	$data['nom1'] = $buscaAseg['aseg_nom1'];
       	$data['nom2'] = $buscaAseg['aseg_nom2'];
       	$data['ape1'] = $buscaAseg['aseg_ape1'];
       	$data['ape2'] = $buscaAseg['aseg_ape2'];
       }

    $this->load->view('pdfreport', $data);
}

 ?>