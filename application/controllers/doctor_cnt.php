<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctor_cnt extends CI_Controller {
/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	

	public function __construct() {
	 parent::__construct();
	 }

	public function index()
	{ 
 		

		//$this->load->view('registro_inicio');
		$this->load->view('view_loginDoctor');
	}

	public function vistaAdm(){

		$this->load->model('doctor_mdl'); //cargamos el modelo

		$data['page_title'] = "Red Salud - Doctor Web";

		//Obtener datos de la tabla 'contacto'
		 $doctores = $this->doctor_mdl->getData(); //llamamos a la función getData() del modelo.
		 
		 $data['doctores'] = $doctores;
		 
		 //load de vistas
		 $this->load->view('view_doctores_admin2', $data); //llamada a la vista, que crearemos posteriormente
	}


	Public function altaDoctor() {
		 //recogemos los datos obtenidos por POST
		 $data['nombre'] = $_POST['nombre'];
		 $data['apellido'] = $_POST['apellido'];
		 $data['email'] = $_POST['email'];
		 $data['password'] = $_POST['password'];

		 //verificamos si existe el correo
		 $email= $this->input->post('email');
		 $this->load->model('doctor_mdl');
		 $verifica = $this->doctor_mdl->verificaCorreo($email);

		 if ($verifica){

		 	$error["titulo"]="Error";
			$error["mensaje"]="El email que ingresó ya se encuentra registrado, vuelva a intentarlo.";
			$error["link"]="<br><br><a href='http://www.red-salud.com' style='color:#CF0000; text-decoration:underline;'> Regresar al registro </a>";
			$this->load->view('view_mensaje', $error);
		 	
		 } else

		 {
		 //llamamos al modelo, concretamente a la función insert() para que nos haga el insert en la base de datos.
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->insert($data);
		 
		
		 //enviamos el correo

		 $dataEmail['nom_Doc'] = $_POST['nombre'];
		 $dataEmail['email_Doc'] = $_POST['email'];
		 $dataEmail['pass_Doc'] = $_POST['password'];
		 $this->doctor_mdl->sendMail($dataEmail);
		 
		 //cargamos la vista
		 $this->load->view('view_succLog', $data);
		 	
		 }		 
	}

	function guardaSiniestro(){
		 //recogemos los datos obtenidos por POST
		 $data['hclinica'] = $_POST['hcl_nomHC'];
		 $data['numDoc'] = $_POST['numDoc'];
		 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];
		 $data['sin_fecha'] = $_POST['sin_fecha'];		 
		 $data['nombrePac'] = $_POST['nombrePac'];
		 $data['pa'] = $_POST['pa'];
		 $data['fc'] = $_POST['fc'];
		 $data['fr'] = $_POST['fr'];
		 $data['peso'] = $_POST['peso'];
		 $data['talla'] = $_POST['talla'];
		 $data['cabeza'] = $_POST['cabeza'];
		 $data['pielFaneras'] = $_POST['pielFaneras'];
		 $data['cvrc'] = $_POST['cvrc'];
		 $data['tpmv'] = $_POST['tpmv'];
		 $data['abdomen'] = $_POST['abdomen'];
		 $data['rha'] = $_POST['rha'];
		 $data['neuro'] = $_POST['neuro'];
		 $data['osteomuscular'] = $_POST['osteomuscular'];
		 $data['guppl'] = $_POST['guppl'];
		 $data['gupru'] = $_POST['gupru'];

		 $this->load->model('doctor_mdl');
		 $numSin = $this->doctor_mdl->buscaNomSin();
		 
		 $antiguoIndice=$numSin['sin_numOA'];
		 $nuevoIndice=$antiguoIndice+1;
		 $final=str_pad($nuevoIndice, 6, 0, STR_PAD_LEFT);
		 
		 $data['sin_numOA'] = $final;

		 //llamamos al modelo y guardamos
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->guardaSiniestro($data);

		 //cargamos la vista
		 $this->load->view('view_mcaSuccSiniestro', $data);


	}


	function guardaSiniestroP1(){
		 //en tabla HActual .... recogemos los datos obtenidos por POST
		 $data['aseg_id'] = $_POST['aseg_id'];
		 $data['sin_id'] = $_POST['sin_id'];
		 $data['prov_id'] = $_POST['prov_id'];
		 $data['sin_fecha'] = $_POST['sin_fecha'];
		 $data['plan_id'] = $_POST['plan_id'];

		 $data['hcl_nomHC'] = $_POST['hcl_nomHC'];
		 $data['numDoc'] = $_POST['numDoc'];
		 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];		 		 
		 $data['nombrePac'] = $_POST['nombrePac'];

		 $data['sin_especialidad'] = $_POST['sin_especialidad'];
		 $data['sin_est'] = $_POST['sin_est'];

		 $data['pa'] = $_POST['pa'];
		 $data['fc'] = $_POST['fc'];
		 $data['fr'] = $_POST['fr'];
		 $data['peso'] = $_POST['peso'];
		 $data['talla'] = $_POST['talla'];
		 $data['cabeza'] = $_POST['cabeza'];
		 $data['pielFaneras'] = $_POST['pielFaneras'];
		 $data['cvrc'] = $_POST['cvrc'];
		 $data['tpmv'] = $_POST['tpmv'];
		 $data['abdomen'] = $_POST['abdomen'];
		 $data['rha'] = $_POST['rha'];
		 $data['neuro'] = $_POST['neuro'];
		 $data['osteomuscular'] = $_POST['osteomuscular'];
		 $data['guppl'] = $_POST['guppl'];
		 $data['gupru'] = $_POST['gupru'];
		 $data['hactual_motcons'] = $_POST['hactual_motcons'];
		 		 

		 

		 if ($data['sin_est']>0){
			$data['sin_numOA'] = $_POST['sin_numOA'];
			$sin_numOA = $_POST['sin_numOA'];
			//$data['sin_estado'] = 1;

			//llamamos al modelo y actualizamos		
			$data['sin_id'] = $_POST['sin_id'];	 
			 //$data['sin_estado'] = 1;			 
			 $data['sin_especialidad'] = $_POST['sin_especialidad'];
			 $this->load->model('doctor_mdl');
			 $this->doctor_mdl->updateSiniestroP1_A($data);			
			 $this->doctor_mdl->updateHActualP1($data);


		 } else{

			//$data['sin_estado'] = 1;
			/*$this->load->model('doctor_mdl');
			$numSin = $this->doctor_mdl->buscaNomSin();
			 
			if ($numSin){
			   $antiguoIndice=$numSin['sin_numOA'];
			}else{
			   $antiguoIndice=000000;
			}

			$nuevoIndice=$antiguoIndice+1;
			$final=str_pad($nuevoIndice, 6, 0, STR_PAD_LEFT);*/
			 
			$data['sin_numOA'] = $_POST['sin_numOA'];
			$data['sin_id'] = $_POST['sin_id'];
			$data['sin_estado'] = 1;
			$data['sin_especialidad'] = $_POST['sin_especialidad'];

			//llamamos al modelo y guardamos
			 $this->load->model('doctor_mdl');
			 $this->doctor_mdl->updateSiniestroP1_A($data);
			 $this->doctor_mdl->guardaHActualP1($data);
		 }

		 //cargamos la vista
		 $this->load->view('view_mcaFormSiniestroP2', $data);


	}
	function guardaSiniestroP2(){
		 //recogemos los datos obtenidos por POST		

		 $data['hcl_nomHC'] = $_POST['hcl_nomHC'];
		 $data['numDoc'] = $_POST['numDoc'];
		 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];
		 $data['sin_fecha'] = $_POST['sin_fecha'];		 
		 $data['nombrePac'] = $_POST['nombrePac'];
		 $data['prov_id'] = $_POST['prov_id'];
		 $data['aseg_id'] = $_POST['aseg_id'];
		 $data['sin_especialidad'] = $_POST['sin_especialidad'];

		 $dni = $_POST['numDoc'];

		 //en siniestro		 
		 $data['sin_estado'] = 2;
		 $data['sin_especialidad'] = $_POST['sin_especialidad'];
		 $data['sin_id'] = $_POST['sin_id'];
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->updateSiniestroP1_A($data);

		 //en diagnostico
		 $data['sin_id'] = $_POST['sin_id'];
		 $data['lds_nom_enfs'] = $_POST['sin_diagnostico'];		 
		 $data['diag_tipo'] = 1;
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->guardaDiagnostico($data);
		 //return $insert;
		 $insert = $this->db->insert_id();
		 

		 //en tratamiento

		 for($num = 1; $num<=15; $num++)
			{	
			   $this->load->model('doctor_mdl');
			   $data['diag_id']	= $insert;		
			   
			   if (isset($_POST["sin_trat".$num]) AND $_POST["sin_trat".$num]!==null){
			   	$data['trat_medi'] = $_POST['sin_trat'.$num];
				$data['trat_cant'] = $_POST['sin_cant'.$num];
				$data['trat_dosis'] = $_POST['sin_dosis'.$num];
				//$data['trat_text'] = "";
				$data['trat_tipo'] = 1;
			   $this->doctor_mdl->guardaSiniestroP2($data);

			   }

			    //echo $num "<br>";
			}

		// si hay diagnostico no cubierto

		if(empty($_POST['sin_diagnosticoSec'])){
			
			for($num = 1; $num<=15; $num++)
			{ 		   	   

			   if (isset($_POST["mediNC".$num]) AND $_POST["mediNC".$num]!==null){
			   	$data['trat_medi'] = $_POST['mediNC'.$num];
				$data['trat_cant'] = $_POST['cantNC'.$num];
				$data['trat_dosis'] = $_POST['dosisNC'.$num];
				//$data['trat_text'] = " ";
				$data['trat_tipo'] = 3;
				$data['diag_id'] = $insert;
				$this->load->model('doctor_mdl');
			    $this->doctor_mdl->guardaSiniestroP2($data);

			   }
			}
		} else{

			 $data['sin_id'] = $_POST['sin_id'];			 		 
			 $data['diag_tipo'] = 3;
			 $data['lds_nom_enfs'] = $_POST['sin_diagnosticoSec'];
			 $this->load->model('doctor_mdl');
			 $this->doctor_mdl->guardaDiagnostico($data);
			 //return $insert;
			 $insertN = $this->db->insert_id();

			 for($num = 1; $num<=15; $num++)
			{ 		   	   

			   if (isset($_POST["mediNC".$num]) AND $_POST["mediNC".$num]!==null){
			   	$data['trat_medi'] = $_POST['mediNC'.$num];
				$data['trat_cant'] = $_POST['cantNC'.$num];
				$data['trat_dosis'] = $_POST['dosisNC'.$num];
				//$data['trat_text'] = " ";
				$data['trat_tipo'] = 3;
				$data['diag_id']	= $insertN;
				$this->load->model('doctor_mdl');
			    $this->doctor_mdl->guardaSiniestroP2($data);

			   }
			}

		}	
		 $data['sin_diagnosticoSec'] = $_POST['sin_diagnosticoSec'];	
		 $data['sin_numOA'] = $_POST['sin_numOA'];
		 

		 $this->load->model('doctor_mdl');
		        $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

			     if ($buscaAseg)
			       {
			       	$cert_plan = $buscaAseg['plan_codi'];
			       	
			       	$this->load->model('doctor_mdl');
			     	$verPlan = $this->doctor_mdl->buscaPlan(urldecode($cert_plan));
			     	$dataPlan = $this->doctor_mdl->buscaPlanData(urldecode($cert_plan));
			     	
			     	if ($verPlan){
				        	$data['buscaPlan']=$verPlan;
				        	$data['buscado']=$cert_plan;
				        	$data['nombredelplan']=$cert_plan;
				        	$plan_id = $dataPlan['plan_id'];
				        	$data['plan_id'] = $plan_id;
					        $verifyLab = $this->doctor_mdl->buscaLab(urldecode($plan_id));

					        if (isset($verifyLab)){
					        $data['lab']='0';	
					        
					        }else{

					        $data['lab']='1';

					        }

				        }


			       }

		//cargamos la vista
		$this->load->view('view_mcaFormSiniestroP3', $data);


	}
	function guardaSiniestroP3(){
		 //recogemos los datos obtenidos por POST
		 $data['hcl_nomHC'] = $_POST['hcl_nomHC'];
		 $data['numDoc'] = $_POST['numDoc'];
		 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];
		 $data['sin_fecha'] = $_POST['sin_fecha'];		 
		 $data['nombrePac'] = $_POST['nombrePac'];
		 $data['sin_especialidad'] = $_POST['sin_especialidad'];
		 $data['prov_id'] = $_POST['prov_id'];
		 $data['aseg_id'] = $_POST['aseg_id'];
		 $data['sin_id'] = $_POST['sin_id'];
		 $lab = $_POST['lab'];
		 
		 $data['sin_estado'] = 3;
		 $data['sin_numOA'] = $_POST['sin_numOA'];
		 //$data['sin_lab1'] = $_POST['sin_lab1'];
		 
		 for($num = 1; $num<=15; $num++)
			{   	   
			   if (isset($_POST["analisis".$num]) AND $_POST["analisis".$num]!==null){
			   	$data['sin_id'] = $_POST['sin_id'];
				$data['detaAnalisis'] = $_POST['analisis'.$num];
					if($lab==0)	{			
					$data['lab_tipo'] = 1;
					}else{
					$data['lab_tipo'] = 3;	
					}
				$this->load->model('doctor_mdl');
			    $this->doctor_mdl->guardaSiniestroP3($data);    
			    $this->doctor_mdl->updateSinLabFlag($data);
			   }
			}

			if ((!empty($_POST["sin_labNC"])) or (!isset($_POST["sin_labNC"])))
			 {
				$data['detaAnalisis'] = nl2br($_POST['sin_labNC']);
				$data['sin_id'] = $_POST['sin_id'];								
				$data['lab_tipo'] = 3;
				
				$this->load->model('doctor_mdl');
			    $this->doctor_mdl->guardaSiniestroP3($data);
			    $this->doctor_mdl->updateSinLabFlag($data);
			     //$this->doctor_mdl->guardaSiniestroP3($data);
			 }	

		//en siniestro		 
		 $data['sin_estado'] = 3;
		 $data['sin_especialidad'] = $_POST['sin_especialidad'];
		 $data['sin_id'] = $_POST['sin_id'];
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->updateSiniestroP1_A($data);	 	 

		//cargamos la vista
		 $this->load->view('view_mcaSuccSiniestro', $data);


	}




	function guardaOMAdd(){
		 //recogemos los datos obtenidos por POST
		 
		 $data['hcl_nomHC'] = $_POST['hcl_nomHC'];
		 $data['prov_id'] = $_POST['prov_id'];
		 $data['aseg_id'] = $_POST['aseg_id'];
		 $data['numDoc'] = $_POST['numDoc'];
		 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];
		 //$data['sin_fecha'] = $_POST['sin_fecha'];		 
		 $data['nombrePac'] = $_POST['nombrePac'];
		 $data['sin_especialidad'] = $_POST['sin_especialidad'];
		 $data['sin_numOA'] = $_POST['sin_numOA'];
		 
		 $dni = $_POST['numDoc'];
		 //$data['sin_lab1'] = $_POST['sin_lab1'];	

		 $this->load->model('doctor_mdl');
		 $misDatos = $this->doctor_mdl->buscaDatos($dni);		 


		 //en siniestro	
		 //asegurado
		   $data['aseg_id'] = $_POST['aseg_id'];
		 //certificado
		   $data['cert_id'] = $misDatos['cert_id'];	 
		 //fecha
		   $data['sin_fecha'] = date("Y-m-d");
		 //proveedor
		   $data['prov_id'] = $_POST['prov_id'];
		 //especialidad
		   $data['sin_especialidad'] = $_POST['sin_especialidad'];
		 //estado
		   $data['sin_est'] = 4;
		 //tipo
		   $data['sin_tipo'] = 3;
		 //numOA
		   $data['sin_numOA'] = $_POST['sin_numOA'].'R';

		   $this->doctor_mdl->guardaSiniestroP0($data);
		   $insertSin = $this->db->insert_id();
		 

		 //actualizamos el siniestro original en el campo sin_est a 4

		 //en siniestro 		 
		 $data['sin_estado'] = 4;
		 $data['sin_numOA'] = $_POST['sin_numOA'];
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->updateSiniestroP1_OA($data);	 


		 //en diagnostico
		 $data['sin_id'] = $insertSin;
		 $data['lds_nom_enfs'] = $_POST['sin_diagnostico'];		 
		 $data['diag_tipo'] = 4;
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->guardaDiagnostico($data);
		 //return $insert;
		 $insertDiag = $this->db->insert_id();
		 

		 //en tratamiento

		 for($num = 1; $num<=15; $num++)
			{	
			   $this->load->model('doctor_mdl');
			   $data['diag_id']	= $insertDiag;		
			   
			   if (isset($_POST["sin_trat".$num]) AND $_POST["sin_trat".$num]!==null){
			   	$data['trat_medi'] = $_POST['sin_trat'.$num];
				$data['trat_cant'] = $_POST['sin_cant'.$num];
				$data['trat_dosis'] = $_POST['sin_dosis'.$num];
				//$data['trat_text'] = "";
				$data['trat_tipo'] = 24;
			   $this->doctor_mdl->guardaSiniestroP2($data);

			   }

			    //echo $num "<br>";
			}

		// si hay diagnostico no cubierto

		if(empty($_POST['sin_diagnosticoSec'])){
			
			for($num = 1; $num<=15; $num++)
			{ 		   	   

			   if (isset($_POST["mediNC".$num]) AND $_POST["mediNC".$num]!==null){
			   	$data['trat_medi'] = $_POST['mediNC'.$num];
				$data['trat_cant'] = $_POST['cantNC'.$num];
				$data['trat_dosis'] = $_POST['dosisNC'.$num];
				//$data['trat_text'] = " ";
				$data['trat_tipo'] = 4;
				$data['diag_id'] = $insertDiag;
				$this->load->model('doctor_mdl');
			    $this->doctor_mdl->guardaSiniestroP2($data);

			   }
			}
		} else{

			 $data['sin_id'] = $_POST['sin_id'];			 		 
			 $data['diag_tipo'] = 4;
			 $data['lds_nom_enfs'] = $_POST['sin_diagnosticoSec'];
			 $this->load->model('doctor_mdl');
			 $this->doctor_mdl->guardaDiagnostico($data);
			 //return $insert;
			 $insertN = $this->db->insert_id();

			 for($num = 1; $num<=15; $num++)
			{ 		   	   

			   if (isset($_POST["mediNC".$num]) AND $_POST["mediNC".$num]!==null){
			   	$data['trat_medi'] = $_POST['mediNC'.$num];
				$data['trat_cant'] = $_POST['cantNC'.$num];
				$data['trat_dosis'] = $_POST['dosisNC'.$num];
				//$data['trat_text'] = " ";
				$data['trat_tipo'] = 3;
				$data['diag_id']	= $insertN;
				$this->load->model('doctor_mdl');
			    $this->doctor_mdl->guardaSiniestroP2($data);

			   }
			}

		}

		 //cargamos la vista
		 $this->load->view('view_mcaSuccOMAdd', $data);


	}




	Public function updateDoctor() {
		 //recogemos los datos por POST
		 $data['id_Doc'] = $_POST['id'];
		 $data['tipo_Doc'] = $_POST['tipo'];
		 $data['est_Doc'] = $_POST['est'];
		 $data['dni_Doc'] = $_POST['dni'];
		 $data['ruc_Doc'] = $_POST['ruc'];
		 $data['direc_Doc'] = $_POST['direc'];
		 $data['prov_Doc'] = $_POST['prov'];
		 $data['ciu_Doc'] = $_POST['ciu'];
		 $data['ncol_Doc'] = $_POST['cole'];
		 $data['esp_Doc'] = $_POST['espe'];
		 $data['rne_Doc'] = $_POST['rne'];
		 $data['tel_Doc'] = $_POST['tel'];
		 $data['cel_Doc'] = $_POST['cel'];		
		 $data['nom_Doc'] = $_POST['nombre'];
		 $data['apePat_Doc'] = $_POST['apellidoPat'];
		 $data['apeMat_Doc'] = $_POST['apellidoMat'];
		 $data['email_Doc'] = $_POST['email'];
		 $data['pass_Doc'] = $_POST['password'];

		 //cargamos el modelo y llamamos a la función update()
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->update($data);

		 $this->load->model('doctor_mdl');
		 

		 //volvemos a cargar la primera vista

            $this->load->view('view_formRegDoc2', $data);
		 }

	Public function updateDoctorMedico() {
		 //recogemos los datos por POST
		 $data['id_Doc'] = $_POST['id'];
		 $data['tipo_Doc'] = $_POST['tipo'];
		 $data['est_Doc'] = $_POST['est'];
		 $data['dep_Doc'] = $_POST['dep'];
		 $data['ciu_Doc'] = $_POST['ciu'];
		 $data['ncol_Doc'] = $_POST['cole'];
		 $data['esp_Doc'] = $_POST['espe'];
		 $data['rne_Doc'] = $_POST['rne'];
		 $data['tel_Doc'] = $_POST['tel'];
		 //$data['cel_Doc'] = $_POST['cel'];		
		 $data['nom_Doc'] = $_POST['nombre'];
		 $data['apePat_Doc'] = $_POST['apellidoPat'];
		 $data['apeMat_Doc'] = $_POST['apellidoMat'];
		 $data['email_Doc'] = $_POST['email'];
		 $data['pass_Doc'] = $_POST['password'];

		 //cargamos el modelo y llamamos a la función updateMedico()
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->updateMedico($data);

		 //$this->load->model('doctor_mdl');
		 //$this->doctor_mdl->sendMail($data);

		 //volvemos a cargar la primera vista
		 	redirect("http://www.red-salud.com");
            //$this->load->view('http://www.red-salud.com', $data);
		 }


	Public function updateDoctorCM() {
		 //recogemos los datos por POST
		 
		 $data['id_Doc'] = $_POST['id'];
		 $data['tipo_Doc'] = $_POST['tipo'];
		 $data['est_Doc'] = $_POST['est'];
		 $data['nomCm_Doc'] = $_POST['nombreCm'];
		 $data['nom_Doc'] = $_POST['nombre'];
		 $data['apePat_Doc'] = $_POST['apellidoPat'];
		 $data['apeMat_Doc'] = $_POST['apellidoMat'];
		 $data['ruc_Doc'] = $_POST['ruc'];
		 $data['direc_Doc'] = $_POST['direc'];
		 $data['dep_Doc'] = $_POST['dep'];
		 $data['ciu_Doc'] = $_POST['ciu'];
		 $data['tel_Doc'] = $_POST['tel'];
		 $data['email_Doc'] = $_POST['email'];
		 $data['pass_Doc'] = $_POST['password'];


		 //cargamos el modelo y llamamos a la función updateMedico()
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->updateCenMedico($data);

		 //$this->load->model('doctor_mdl');
		 //$this->doctor_mdl->sendMail($data);

		 //volvemos a cargar la primera vista            
            redirect("http://www.red-salud.com");
		 }

	
	function accionEdita() {
	 //cargamos el modelo y obtenemos la información del contacto seleccionado.
	 $this->load->model('doctor_mdl');
	 $data['usuario'] = $this->doctor_mdl->obtenerContacto($_POST['editar']);
	 //cargamos la vista para editar la información, pasandole dicha información.
	 $this->load->view('edit', $data);
	 }
	 
	 function editar() {
	 //recogemos los datos por POST
	 $data['id'] = $_POST['id'];
	 $data['nombre'] = $_POST['txtNombre'];
	 $data['email'] = $_POST['txtEmail'];
	 $data['telefono'] = $_POST['txtTelefono'];
	 $data['direccion'] = $_POST['txtDireccion'];
	 //cargamos el modelo y llamamos a la función update()
	 $this->load->model('mantenimiento_model');
	 $this->mantenimiento_model->update($data);
	 //volvemos a cargar la primera vista
	 $this->index();
	 }

	 Public function dias_transcurridos($fecha_i,$fecha_f)
	{
		$dias	= (strtotime($fecha_i)-strtotime($fecha_f))/86400;
		$dias 	= abs($dias); $dias = floor($dias);		
		return (int)$dias;
	} 

	Public function dias_transcurridos2($fecha_i,$fecha_f)
	{	
		$date2 = new DateTime($fecha_i);
		$date1 = new DateTime($fecha_f);
			
		$interval = date_diff($date1, $date2, $absolute = true );
		//echo $interval->format('%R%a días');
		return $interval->format('%d');

	}


	 Public function buscaAsegurado() {
	 //recogemos los datos por POST
	 $dniPuro = $this->input->post('dni');
	 $dni = trim($dniPuro);
	 $nomEst_Prov = $this->input->post('nomEst_Prov'); 

	 $this->load->model('doctor_mdl');
     $buscaProv = $this->doctor_mdl->buscaProveedor($nomEst_Prov);

     $prov_id = $buscaProv['prov_id'];
	 $datos['prov_id'] = $prov_id;
	// $sin_numOA = $this->input->post('sin_numOA'); 
    
     //comprobamos si existen en la base de datos enviando los datos al modelo
     $this->load->model('doctor_mdl');
     $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

     if ($buscaAseg)
       {
       	$datos['aseg_id'] = $buscaAseg['aseg_id'];
       	$datos['cert_id'] = $buscaAseg['cert_id'];
       	$datos['nom1'] = $buscaAseg['aseg_nom1'];
       	$datos['nom2'] = $buscaAseg['aseg_nom2'];
       	$datos['ape1'] = $buscaAseg['aseg_ape1'];
       	$datos['ape2'] = $buscaAseg['aseg_ape2'];             
       	$datos['numDoc'] = $buscaAseg['aseg_numDoc'];
       	$datos['tipoDoc'] = $buscaAseg['tipoDoc_id'];
       	$datos['fechNac'] = $buscaAseg['aseg_fechNac'];
       	$datos['aseg_direcc'] = $buscaAseg['aseg_direcc'];
       	$datos['aseg_telef'] = $buscaAseg['aseg_telf'];
       	
       	$datos['cert_plan'] = $buscaAseg['plan_codi'];
       	$codPlan = $buscaAseg['plan_codi'];

       	$nomEmp = $this->doctor_mdl->buscaEmp($codPlan);
       	if ($nomEmp){
	        $datos['nombreEmpresa'] = $nomEmp['cli_nomCom'];
	        $datos['plan'] = $nomEmp['plan_nom'];
	        
	        
	    }else{
	    	$datos['nombreEmpresa'] = "RED-SALUD";
	    }

	    //traemos plan_id
	    $buscaPlan_id = $this->doctor_mdl->buscaPlanData($codPlan);
	    $datos['plan_id'] = $buscaPlan_id['plan_id'];



       	
       	$datos['cert_num'] = $buscaAseg['cert_num'];
       	$numCert = $buscaAseg['cert_num'];
        $cert_id=$buscaAseg['cert_id'];
		
		$fechIniVig = new DateTime($buscaAseg['cert_iniVig']);	
		$fechaIni=	$fechIniVig->format('Y-m-d');

		$now = new DateTime();
		$fechaFin=$now->format('Y-m-d');

		$interval= $this->dias_transcurridos($fechaIni, $fechaFin);

		$datos['fechIniVig']=$fechIniVig;		
		$datos['hoy']=$now;
		$datos['intervalo']=$interval;
       	
       	$cancelado = $this->doctor_mdl->buscaCancelado($cert_id);
       	if ($cancelado){
	        $datos['cance_numCerti'] = $cancelado['can_cert_num'];
	        $datos['cance_estCerti'] = $cancelado['can_estadoCert'];
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVig']);
	        $datos['finVigencia'] = new DateTime($cancelado['can_finVig']);
	        $datos['estadoCerti'] = "CANCELADO";
	        $datos['color'] = "#E21919";    
	    	
	    }elseif ($interval<=30){
	    	$adiciona=new DateInterval('P1M');
	    	$datos['estadoCerti'] = "INACTIVO";
	        $datos['color'] = "#E21919";
	        $datos['edita'] = "disabled";
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVig']);
	        $datos['finVigencia']=$fechIniVig->add($adiciona);

	    }elseif ($interval>30 and $interval<=40) {
	    	$adiciona=new DateInterval('P40D');
	    	$datos['estadoCerti'] = "ACTIVO";
	        $datos['color'] = "#469A05";
	        $datos['edita'] = "enabled";
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVig']);
	        $datos['finVigencia']=$fechIniVig->add($adiciona);


	    }elseif ($interval>=41) {
	    	$fechCobrado = $this->doctor_mdl->buscaCobrado($cert_id);
	    	if ($fechCobrado){
		        $datos['cobro_vezCobro'] = $fechCobrado['cob_vezCob'];
		        $datos['finVigencia'] = $fechCobrado['cob_finCobertura'];


		        $fechaFinVig1 = new DateTime($fechCobrado['cob_finCobertura']);	
				$fechaIni=$fechaFinVig1->format('Y-m-d');
				$now = new DateTime();
				$fechaFin=$now->format('Y-m-d');		        
		        $diasTransDeCobro= $this->dias_transcurridos2($fechaIni, $fechaFin);

		        //if($diasTransDeCobro>=10){	        
			    
			    //$formateada=$adicionada->format('Y-m-d');			    

			    $adiciona=new DateInterval('P40D');
	        	$fechFinVig = new DateTime($fechCobrado['cob_finCobertura']);
			    $finalVigencia1=$fechFinVig->add($adiciona);

			    $actualFecha = $fechaFin;
			    $finalVigencia=$finalVigencia1->format('Y-m-d');

			    if ($actualFecha<=$finalVigencia) {

		        //  if($diasTransDeCobro>=10){

		        	$datos['estadoCerti'] = "ACTIVO";
	        		$datos['color'] = "#469A05";
	        		$datos['edita'] = "enabled";
	        		//$datos['adicionada']=$adicionada->format('d/m/Y');
	        		//$datos['adicionada']=$finalVigencia;
	        		//$datos['finVigencia'] = $fechaFinVig1;

	        		//esto es para agregar dias luego de su fecha de vencimiento
	        		$plan_codigo = $buscaPlan_id['plan_codi'];

	        		if ($plan_codigo = 'PLANCENCO2') { 
						$adiciona=new DateInterval('P30D');
	        		} else { 
	        			$adiciona=new DateInterval('P10D');
	        		}
	        		
	        		$fechFinVig = new DateTime($fechCobrado['cob_finCobertura']);
			        $datos['finVigencia']=$fechFinVig->add($adiciona);
			       
		        	

		        }else{

		        	$datos['estadoCerti'] = "INACTIVO";
			        $datos['color'] = "#E21919";
			        $datos['edita'] = "disabled";
			        $datos['adicionada']=$actualFecha."=".$finalVigencia;

			        $adiciona=new DateInterval('P10D');
	        		$fechFinVig = new DateTime($fechCobrado['cob_finCobertura']);
			        $datos['finVigencia']=$fechFinVig->add($adiciona);
			        //$datos['adicionada'] = "hola";
			        //$datos['fechIniVig']= $fechCobrado['cob_iniCobertura'];

		        }
	

		    }else{
		    	$adiciona=new DateInterval('P1M');
		    	$datos['estadoCerti'] = "INACTIVO";
		        $datos['color'] = "#E21919";
		        $datos['edita'] = "disabled";
		        $fechIniVig = new DateTime($buscaAseg['cert_iniVig']);
		        $datos['finVigencia']=$fechIniVig->add($adiciona);
		    }
	    	
	    }

	    if ($buscaAseg['cert_upProv']>=1){
	    	$adiciona=new DateInterval('P1D');
	    	$datos['estadoCerti'] = "ACTIVO1";
	        $datos['color'] = "#DF7401";
	        $datos['edita'] = "disabled";
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVig']);
	        $datos['finVigencia']=$fechIniVig->add($adiciona);
	    }
	
	    /*$fechCobrado = $this->doctor_mdl->buscaCobrado($numCert);
	    if ($fechCobrado){
	        $datos['cobro_vezCobro'] = $fechCobrado['cob_cobro'];
	        $datos['cobro_fechFinCober'] = $fechCobrado['cob_finCobertura'];        
	    }else{
	    	$datos['cobro_fechFinCober'] = $buscaAseg['cert_finVigencia'];
	    }*/
	    

       	$datos['sexo1'] = $buscaAseg['aseg_sexo'];
       		if ($datos['sexo1']=="M") {
       			$datos['sexo']="Masculino";
       		}else{
       			$datos['sexo']="Femenino";
       		}
       	//$datos['cert_iniVigencia'] = $buscaAseg['cert_iniVigencia'];
       	//$datos['cert_finVigencia'] = $buscaAseg['cert_finVigencia'];
       	$datos['estado'] = $buscaAseg['cert_estado'];
       	$datos['dire1'] = 'esta direccion 1';
       	$datos['nomEst_Prov']=$nomEst_Prov;
       	$datos['prov_id']=$prov_id;
       	$historia = $this->doctor_mdl->buscaHistoriaId($buscaAseg['aseg_id']);
        
        //$misSiniestros = $this->doctor_mdl->buscaSiniestro($dni);
        if ($historia){
	        $datos['hcli_id'] = $historia['hcli_id'];
	        $datos['hcli_nom'] = $historia['hcli_nom'];
			$misDatos = $this->doctor_mdl->buscaDatos($dni);			
			$listaSiniestros = $this->doctor_mdl->siniestros($dni);        
	        if ($misDatos){
		        $datos['sin_numCerti'] = $misDatos['cert_num'];
		        $datos['sin_numDocId'] = $misDatos['aseg_numDoc'];
		        $datos['sin_fecha'] = $misDatos['sin_fech'];
		        $datos['sin_lugar'] = $misDatos['prov_nomCom'];
		        
		        $datos['siniestros']=$listaSiniestros;

		        $this->load->view('view_mcaBuscaRespuesta',$datos);

		    } else
		    {
		    	$this->load->view('view_mcaBuscaRespuesta',$datos);
		    }		    	
		   //$this->load->view('view_mcaBuscaRespuesta',$datos);
	    } else
	      {
			$this->load->view('view_mcaBuscaRespuesta',$datos);
	      }
	        //$this->load->view('view_mcaBuscaRespuesta',$datos);
    	}
    	else
    	{	
    		
    	$info['nomEst_Prov']=$nomEst_Prov;
    	$this->load->view('view_mcaBuscaFail',$info);
    	}

	 }

	 public function verHC($hcl_nomHC){

	 	$this->load->model('doctor_mdl');
     	$verHC = $this->doctor_mdl->buscaHC($hcl_nomHC);
     	if ($verHC){
	        	$datosHC['hcl_numDocId'] = $verHC['hcl_numDocId'];
	        	$datosHC['hcl_nomHC'] = $verHC['hcl_nomHC'];
	        	$datosHC['hcl_nomPac'] = $verHC['hcl_nomPac'];
	        	$datosHC['hcl_apePac'] = $verHC['hcl_apePac'];
	        	$datosHC['hcl_edadAct'] = $verHC['hcl_edadAct'];
	        	$datosHC['hcl_sexo'] = $verHC['hcl_sexo'];

	        	$datosHC['sexo1'] = $verHC['hcl_sexo'];
		       		if ($datosHC['sexo1']=="M") {
		       			$datosHC['hcl_sexo']="Masculino";
		       		}else{
		       			$datosHC['hcl_sexo']="Femenino";
		       		}
	        	$datosHC['hcl_telef'] = $verHC['hcl_telef'];
	        	$datosHC['hcl_direccion'] = $verHC['hcl_direccion'];
	        	$datosHC['hcl_antePers'] = $verHC['hcl_antePers'];
	        	$datosHC['hcl_anteFam'] = $verHC['hcl_anteFam'];
	        	$datosHC['hcl_alergiaFarm'] = $verHC['hcl_alergiaFarm'];
	        	$datosHC['hcl_alergiaAlim'] = $verHC['hcl_alergiaAlim'];
	        	$datosHC['hcl_motPrimConsul'] = $verHC['hcl_motPrimConsul'];

	        	$this->load->view('view_mcaVistaHC',$datosHC);
	    }
	 }



	 public function verPlan($cert_plan){

	 	$this->load->model('doctor_mdl');
     	$verPlan = $this->doctor_mdl->buscaPlan(urldecode($cert_plan));
     	
     	if ($verPlan){
	        	$datosPlan['buscaPlan']=$verPlan;
	        	$datosPlan['buscado']=$cert_plan;

	        	$this->load->view('view_mcaVistaPlan', $datosPlan);
	    }
	 }
	 public function generaHC(){

	 	 $datos['nomEst_Prov']=$_POST['nomEst_Prov'];
	 	 $datos['numDoc']=$_POST['numDoc'];
	 	 $datos['nombres']=$_POST['nombres'];
	 	 $datos['apellidos']=$_POST['apellidos'];
	 	 $datos['fechNac']=$_POST['fechNac'];
	 	 $datos['sexo']=$_POST['sexo'];
	 	 $datos['telefono']=$_POST['telefono'];
	 	 $datos['direccion']=$_POST['direccion'];
	 	 
		 $this->load->view('view_mcaFormGeneraHC', $datos);
	    }

	 public function formSiniestro(){

	 	 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];
	 	 $data['numDoc'] = $_POST['numDoc'];
	 	 $data['nombrePac'] = $_POST['nombrePac'];
	 	 $data['sin_fecha'] = $_POST['sin_fecha'];
	 	 $data['hcl_nomHC'] = $_POST['hcl_nomHC'];

		 $this->load->view('view_mcaFormSiniestroP1', $data);
	    }


	 public function guardaHC(){

	 	 //recogemos los datos obtenidos por POST
		 $data['nomEst_Prov'] = $_POST['nomEst_Prov'];
		 $data['hcl_numDocId'] = $_POST['hcl_numDocId'];
		 $data['hcl_nomPac'] = $_POST['hcl_nomPac'];
		 $data['hcl_apePac'] = $_POST['hcl_apePac'];
		 $data['hcl_fechNac'] = $_POST['hcl_fechNac'];
		 $data['hcl_edadAct'] = $_POST['hcl_edadAct'];
		 $data['hcl_sexo'] = $_POST['hcl_sexo'];
		 $data['hcl_telef'] = $_POST['hcl_telef'];
		 $data['hcl_direccion'] = $_POST['hcl_direccion'];
		 $data['hcl_antePers'] = $_POST['hcl_antePers'];
		 $data['hcl_anteFam'] = $_POST['hcl_anteFam'];
		 $data['hcl_alergiaFarm'] = $_POST['hcl_alergiaFarm'];
		 $data['hcl_alergiaAlim'] = $_POST['hcl_alergiaAlim'];
		 $data['hcl_motPrimConsul'] = $_POST['hcl_motPrimConsul'];

		 $this->load->model('doctor_mdl');
		 $numHC = $this->doctor_mdl->buscaNomHC();
		 
		 if ($numHC){
		 	$antiguoIndice=$numHC['hcl_nomHC'];
		 }else{

		 	$antiguoIndice=000000;
		 }
		 
		 $nuevoIndice=$antiguoIndice+1;
		 $final=str_pad($nuevoIndice, 6, 0, STR_PAD_LEFT);
		 
		 $data['hcl_nomHC'] = $final;

		 //llamamos al modelo y guardamos
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->guardaHistoria($data);

		 //cargamos la vista
		 $this->load->view('view_mcaSuccHistoria', $data);


	    }


	public function editOA(){
	$nomEst_Prov = $this->input->post('nomEst_Prov');
	$sin_numOA = $this->input->post('sin_numOA');
	$nombrePac = $this->input->post('nombrePac');
	$hcl_nomHC = $this->input->post('hcli_nom');
	$aseg_id = $this->input->post('aseg_id');
	$sin_id = $this->input->post('sin_id');
	$prov_id = $this->input->post('prov_id');
	$plan_id = $this->input->post('plan_id');
	$sin_especialidad = $this->input->post('sin_especialidad');

	$this->load->model('doctor_mdl');	
	$siniestro = $this->doctor_mdl->siniestro($sin_numOA);

	
		 $datos['sin_numOA'] = $siniestro['sin_numOA'];
		 $datos['numDoc'] = $siniestro['aseg_numDoc'];
		 $datos['sin_fecha'] = $siniestro['sin_fech'];
		 $datos['hcl_nomHC'] = $hcl_nomHC;
		 $datos['aseg_id'] = $aseg_id;
		 $datos['prov_id'] = $prov_id;
		 $datos['sin_id'] = $sin_id;
		 $datos['plan_id'] = $plan_id;
		 $datos['sin_est'] = $siniestro['sin_est'];
		 $datos['sin_especialidad'] = $siniestro['sin_esp'];

		 $datos['nombrePac'] = $nombrePac;
		 $datos['nomEst_Prov'] = $nomEst_Prov;
		 $dni = $siniestro['aseg_numDoc'];


		 $this->load->model('doctor_mdl');
		 $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

			     if ($buscaAseg)
			       {
			       	$cert_plan = $buscaAseg['plan_codi'];
			       	
			       	$this->load->model('doctor_mdl');
			     	$verPlan = $this->doctor_mdl->buscaPlan(urldecode($cert_plan));
			     	
			     	if ($verPlan){
				        	$datos['buscaPlan']=$verPlan;
				        	$datos['buscado']=$cert_plan;
				        }

			  		}



		 if($siniestro['sin_est']==0){

		 	$this->load->view('view_mcaFormSiniestroP1',$datos);


		 }elseif($siniestro['sin_est']==1){

		 	$this->load->view('view_mcaFormSiniestroP2',$datos);

		 }elseif($siniestro['sin_est']==2){

		 	////aqui stoy

		 	$verifyLab = $this->doctor_mdl->buscaLab(urldecode($plan_id));
			if (!empty($verifyLab)){
				$datos['lab']='0';	
			}else{
				$datos['lab']='1';
			}
			

		 	$this->load->view('view_mcaFormSiniestroP3',$datos);

		 }



	}
	public function addOM(){
	$nomEst_Prov = $this->input->post('nomEst_Prov');
	$sin_numOA = $this->input->post('sin_numOA');
	$nombrePac = $this->input->post('nombrePac');
	$sin_id = $this->input->post('sin_id');
	$dni = $this->input->post('dni');
	//$sin_especialidad = $this->input->post('sin_especialidad');

	$this->load->model('doctor_mdl');	
	$siniestro = $this->doctor_mdl->siniestro($sin_numOA);

	$diagPrin = $this->doctor_mdl->diagnosticoPrincipal($sin_id);
	$diagSec = $this->doctor_mdl->diagnosticoSecundario($sin_id);

	if($diagPrin){	
	$datos['sin_diagnostico'] = $diagPrin['lds_nom_enfs'];
	}

	if($diagSec){	
	$datos['sin_diagnosticoSec'] = $diagSec['lds_nom_enfs'];
	}

	if ($siniestro){
	
		 $datos['sin_numOA'] = $siniestro['sin_numOA'];
		 $datos['sin_id'] = $siniestro['sin_id'];
		 $datos['prov_id'] = $siniestro['prov_id'];
		 $datos['aseg_id'] = $siniestro['aseg_id'];
		 $datos['numDoc'] = $dni;
		 $datos['sin_fecha'] = $siniestro['sin_fech'];
		 $datos['hcl_nomHC'] = $dni;
		 $datos['sin_especialidad'] = $siniestro['sin_esp'];
		 //$datos['sin_diagnostico'] = $siniestro['sin_diagnostico'];

		 $datos['nombrePac'] = $nombrePac;
		 $datos['nomEst_Prov'] = $nomEst_Prov;
		 //$dni = $siniestro['sin_numDocId'];

		}


	$this->load->view('view_mcaFormAddOM',$datos);



	}


	




	public function vistaOA(){

		
		
		//recogemos los datos por POST
	 $dni = $this->input->post('numDoc');
	 $sin_numOA = $this->input->post('sin_numOA');  
     //$nomCm_Doc = $this->input->post('nomCm_Doc'); 
     //comprobamos si existen en la base de datos enviando los datos al modelo
     $this->load->model('doctor_mdl');
     $historia = $this->doctor_mdl->buscaHistoria($dni);
     
        if ($historia){

        	$datos['nomEst_Prov'] = $_POST['nomEst_Prov'];
        	$datos['hcl_numDocId'] = $historia['hcl_numDocId'];
	        $datos['hcl_nomHC'] = $historia['hcl_nomHC'];
	        $datos['hcl_nomPac'] = $historia['hcl_nomPac'];
	        $datos['hcl_apePac'] = $historia['hcl_apePac'];
	        $datos['hcl_edadAct'] = $historia['hcl_edadAct'];
	        $datos['hcl_fechNac'] = $historia['hcl_fechNac'];
	        //$datosHC['hcl_sexo'] = $historia['hcl_sexo'];

	        $datos['sexo1'] = $historia['hcl_sexo'];
		     		if ($datos['sexo1']=="M") {
		       			$datos['hcl_sexo']="Masculino";
		       		}else{
		       			$datos['hcl_sexo']="Femenino";
		       		}
	        $datos['hcl_telef'] = $historia['hcl_telef'];
	        $datos['hcl_direccion'] = $historia['hcl_direccion'];
	        $datos['hcl_antePers'] = $historia['hcl_antePers'];
	        $datos['hcl_anteFam'] = $historia['hcl_anteFam'];
	        $datos['hcl_alergiaFarm'] = $historia['hcl_alergiaFarm'];
	        $datos['hcl_alergiaAlim'] = $historia['hcl_alergiaAlim'];
	        $datos['hcl_motPrimConsul'] = $historia['hcl_motPrimConsul'];
        
			$this->load->model('doctor_mdl');	
			$siniestro = $this->doctor_mdl->siniestro($sin_numOA);
        
	        if ($siniestro){
		        $datos['sin_numOA'] = $siniestro['sin_numOA'];
		        $datos['sin_numDocId'] = $siniestro['sin_numDocId'];
		        $datos['sin_fecha'] = $siniestro['sin_fech'];
		        $datos['sin_lugar'] = $siniestro['sin_lugar'];
		        $datos['sin_diagnostico'] = $siniestro['sin_diagnostico'];
		        $datos['sin_diagnosticoSec'] = $siniestro['sin_diagnosticoSec'];
		        $datos['sin_tratamientoSec'] = $siniestro['sin_tratamientoSec'];

		        if (isset($siniestro['sin_trat1'])){

				     $datos['sin_trat1'] = $siniestro['sin_trat1'];
				     $datos['sin_dosis1'] = $siniestro['sin_dosis1'];
				 }

				 if (isset($siniestro['sin_trat2'])){

				     $datos['sin_trat2'] = $siniestro['sin_trat2'];
				     $datos['sin_dosis2'] = $siniestro['sin_dosis2'];
				 }

				 if (isset($siniestro['sin_trat3'])){

				     $datos['sin_trat3'] = $siniestro['sin_trat3'];
				     $datos['sin_dosis3'] = $siniestro['sin_dosis3'];
				 }

				 if (isset($siniestro['sin_trat4'])){

				     $datos['sin_trat4'] = $siniestro['sin_trat4'];
				     $datos['sin_dosis4'] = $siniestro['sin_dosis4'];
				 }
	        
		        $datos['sin_lab1'] = $siniestro['sin_lab1'];

		        $datos['sin_pa'] = $siniestro['sin_pa'];
		        $datos['sin_fc'] = $siniestro['sin_fc'];
		        $datos['sin_fr'] = $siniestro['sin_fr'];
		        $datos['sin_peso'] = $siniestro['sin_peso'];

		        $datos['sin_talla'] = $siniestro['sin_talla'];
		        $datos['sin_cabeza'] = $siniestro['sin_cabeza'];
		        $datos['sin_pielFaneras'] = $siniestro['sin_pielFaneras'];
		        $datos['sin_cvrc'] = $siniestro['sin_cvrc'];

		        $datos['sin_tpmv'] = $siniestro['sin_tpmv'];
		        $datos['sin_abdomen'] = $siniestro['sin_abdomen'];
		        $datos['sin_rha'] = $siniestro['sin_rha'];
		        $datos['sin_neuro'] = $siniestro['sin_neuro'];

		        $datos['sin_osteomuscular'] = $siniestro['sin_osteomuscular'];
		        $datos['sin_guppl'] = $siniestro['sin_guppl'];
		        $datos['sin_gupru'] = $siniestro['sin_gupru'];
		        
		        

		        $this->load->view('view_mcaVistaPrevia',$datos);

		    } 
	    } 
    }
		
	
	 

	 public function verOA($sin_numOA){

	 	$this->load->model('doctor_mdl');
     	$siniestro = $this->doctor_mdl->siniestro($sin_numOA);
     	if ($siniestro){
	        	$datos['sin_numOA'] = $siniestro['sin_numOA'];
		        $datos['sin_numDocId'] = $siniestro['sin_numDocId'];
		        $datos['sin_fecha'] = $siniestro['sin_fech'];
		        $datos['sin_lugar'] = $siniestro['sin_lugar'];
		        $datos['sin_diagnostico'] = $siniestro['sin_diagnostico'];
		        $datos['sin_diagnosticoSec'] = $siniestro['sin_diagnosticoSec'];
		        $datos['sin_tratamientoSec'] = $siniestro['sin_tratamientoSec'];
		        
		        if (isset($siniestro['sin_trat1'])){

				     $datos['sin_trat1'] = $siniestro['sin_trat1'];
				     $datos['sin_dosis1'] = $siniestro['sin_dosis1'];
				 }

				 if (isset($siniestro['sin_trat2'])){

				     $datos['sin_trat2'] = $siniestro['sin_trat2'];
				     $datos['sin_dosis2'] = $siniestro['sin_dosis2'];
				 }

				 if (isset($siniestro['sin_trat3'])){

				     $datos['sin_trat3'] = $siniestro['sin_trat3'];
				     $datos['sin_dosis3'] = $siniestro['sin_dosis3'];
				 }

				 if (isset($siniestro['sin_trat4'])){

				     $datos['sin_trat4'] = $siniestro['sin_trat4'];
				     $datos['sin_dosis4'] = $siniestro['sin_dosis4'];
				 }
		        
		        $datos['sin_lab1'] = $siniestro['sin_lab1'];

		        $datos['sin_pa'] = $siniestro['sin_pa'];
		        $datos['sin_fc'] = $siniestro['sin_fc'];
		        $datos['sin_fr'] = $siniestro['sin_fr'];
		        $datos['sin_peso'] = $siniestro['sin_peso'];

		        $datos['sin_talla'] = $siniestro['sin_talla'];
		        $datos['sin_cabeza'] = $siniestro['sin_cabeza'];
		        $datos['sin_pielFaneras'] = $siniestro['sin_pielFaneras'];
		        $datos['sin_cvrc'] = $siniestro['sin_cvrc'];

		        $datos['sin_tpmv'] = $siniestro['sin_tpmv'];
		        $datos['sin_abdomen'] = $siniestro['sin_abdomen'];
		        $datos['sin_rha'] = $siniestro['sin_rha'];
		        $datos['sin_neuro'] = $siniestro['sin_neuro'];

		        $datos['sin_osteomuscular'] = $siniestro['sin_osteomuscular'];
		        $datos['sin_guppl'] = $siniestro['sin_guppl'];
		        $datos['sin_gupru'] = $siniestro['sin_gupru'];
		        

	        	$this->load->view('view_mcaVistaOA',$datos);
	    }
	 }



	public function regisOK()
	{
		$data = $_POST['user'];
		
		$datos["nombre"]=$data;

		$datos["nombre"]=$data;
		$datos["apellido"]="Linares";
		$this->load->view('view_succLog', $datos);
	}

	public function panelDoc1()
	{
		$data = $_POST['user'];
		
		$datos["nombre"]=$data;
		$datos["apellido"]="Linares";
		$this->load->view('view_panelDoc1', $datos);
	}

	public function panelDoc2()
	{
		
		//$data = $_POST['user'];
		
		$datos["nombre"]="Carlos";
		$datos["apellido"]="Linares";
		$this->load->view('view_panelDoc2', $datos);
	}

	public function login()
	{			
		$this->load->view('view_loginDoctor');
	}


	public function update_type()
	{			
		 //recogemos los datos por POST
		 $data['id_Doc'] = $_POST['id'];
		 $data['tipo_Doc'] = $_POST['tipo'];
		

		 //cargamos el modelo y llamamos a la función update()
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->update_tipo($data);

		 //cargamos modelo que devuelve los datos del ID
		 $id=$data['id_Doc'];
		 $this->load->model('verificar_model');
            $miNombre = $this->verificar_model->consultaNombreId($id);
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
            
            if ($datos['tipo_Doc']=="Médico") {
            $this->load->view('view_formRegDocMed',$datos);
            }
            elseif ($datos['tipo_Doc']=="Centro Médico"){
            $this->load->view('view_formRegDocCM',$datos);
            }
            elseif ($datos['tipo_Doc']=="Laboratorio"){
            $this->load->view('view_formRegDocCM',$datos);
            }
            elseif ($datos['tipo_Doc']=="Farmacia"){
            $this->load->view('view_formRegDocCM',$datos);
            }            
    }


	public function upAfiliado()
	{
		
		//$data = $_POST['user'];
		
		$this->load->view('microseguro/view_searchAfiliado');
	}

	public function vistaOA2(){		
		
		//recogemos los datos por POST
	 $dni = $this->input->post('dni');
	 
     $this->load->model('doctor_mdl');
     $afiliado = $this->doctor_mdl->buscaDNI($dni);
     
        if ($afiliado){

        	//$datos['nomEst_Prov'] = $_POST['nomEst_Prov'];
        	$datos['aseg_numDoc'] = $afiliado['aseg_numDoc'];
        	$datos['cert_num'] = $afiliado['cert_num'];
        	$datos['aseg_nom1'] = $afiliado['aseg_nom1'];
        	$datos['aseg_nom2'] = $afiliado['aseg_nom2'];
        	$datos['aseg_ape1'] = $afiliado['aseg_ape1'];
        	$datos['aseg_ape2'] = $afiliado['aseg_ape2'];
        	$datos['cert_iniVigencia'] = $afiliado['cert_iniVigencia'];
        }else{
        	$datos['texto'];
        }

}












	public function doctorPanel()
	{
		
		//$data = $_POST['user'];
		
		$this->load->view('microseguro/view_principal');
	}

	public function buscaConsulta()
	{
				
		$this->load->view('microseguro/view_buscaConsulta');
	}

	public function resultBusca()
	{
				
		$this->load->view('microseguro/view_resultBuscaCon');
	}

	public function nuevaConsulta()
	{
				
		$this->load->view('microseguro/view_nuevaConsulta');
	}
	public function resultNuevoBusca()
	{
				
		$this->load->view('microseguro/view_resultGeneraNuevaCon');
	}

	public function generoConsulta()
	{
				
		$this->load->view('microseguro/view_generoConsulta');
	}

	public function buscaPacientes()
	{
				
		$this->load->view('microseguro/view_buscaPacientes');
	}
	public function resultBuscaPac()
	{
				
		$this->load->view('microseguro/view_resultBuscaPac');
	}
	public function nuevoPaciente()
	{
				
		$this->load->view('microseguro/view_nuevoPaciente');
	}
	public function modificaPaciente()
	{
				
		$this->load->view('microseguro/view_modificaPaciente');
	}
	public function guardaPaciente()
	{
				
		$this->load->view('microseguro/view_guardaPaciente');
	}
	public function episodios()
	{
				
		$this->load->view('microseguro/view_episodios');
	}
	public function resultBuscaEpi()
	{
				
		$this->load->view('microseguro/view_resultBuscaEpi');
	}
	public function nuevoEpisodio()
	{
				
		$this->load->view('microseguro/view_nuevoEpisodio');
	}
	public function resultNuevoBuscaEpi()
	{
				
		$this->load->view('microseguro/view_resultNuevoBuscaEpi');
	}
	public function generoEpisodio1()
	{
		$nom_enf = $_POST['nom_enf'];
		$this->load->model('doctor_mdl');
		$data['tratamiento']=$this->doctor_mdl->obtenerTratamiento($nom_enf);
		$data['nom_enf']=$nom_enf;

		$this->load->view('microseguro/view_generoEpisodio1', $data);
		
	}

	

	public function generoTratamiento()
	{
		$cod_enf2 = $_POST['cod_enf2'];
		$this->load->model('doctor_mdl');
		$data['medicamento']=$this->doctor_mdl->obtenerMedicinas($cod_enf2);
		$this->load->view('microseguro/view_generoMedicina', $data);

		
	}


	public function pdfMuestra()
	{		
			$data['receta'][] = (object) array('medicina' => 'Tetraciclina', 'presentacion' => '500mg', 'dosis' => '1 tab/6h', 'periodo' => 'de 3 a 7 dias'); 
			$data['receta'][] = (object) array('medicina' => 'Cloranfenicol', 'presentacion' => '250mg', 'dosis' => '5ml/6h', 'periodo' => 'de 3 a 7 dias'); 

			$this->load->view('microseguro/view_receta', $data);
			
			$this ->load->helper('dompdf_helper');
			//$html = $this->load->view( 'microseguro/view_receta' , $data , true );

			//pdf_create ($html,'receta1');
	}

	public function pdfImprime()
	{		
			$data['receta'][] = (object) array('medicina' => 'Tetraciclina', 'presentacion' => '500mg', 'dosis' => '1 tab/6h', 'periodo' => 'de 3 a 7 dias');
			$data['receta'][] = (object) array('medicina' => 'Cloranfenicol', 'presentacion' => '250mg', 'dosis' => '5ml/6h', 'periodo' => 'de 3 a 7 dias'); 
			$this->load->view('microseguro/view_receta', $data);
			
			$this ->load->helper('dompdf_helper');
			$html = $this->load->view( 'microseguro/view_receta' , $data , true );

			pdf_create ($html,'receta1');
	}

	public function resumenTratamiento()
	{
			$data['receta'] = $_POST['cod_med'];

			$this->load->view('microseguro/view_receta', $data);
			
			/*$this ->load->helper('dompdf_helper');
			$html = $this->load->view( 'microseguro/view_receta' , $data , true );

			pdf_create ($html,'receta1');*/
	}


	function imprimeOA_test()
	{
	    $this->load->helper('pdf_helper');
	    
	    $dni = $this->input->post('numDoc');
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

	    $this->load->view('pdfOA', $data);
	}





function imprimeOA()
{
$this->load->helper('pdf_helper');

$dni = $this->input->post('numDoc');
$sin_numOA = $this->input->post('sin_numOA');
$nomEst_Prov = $this->input->post('nomEst_Prov');
$nombrePac = $this->input->post('nombrePac');
$sin_especialidad = $this->input->post('sin_especialidad');
$sin_id = $this->input->post('sin_id');
$data['sin_id'] = $sin_id;

$this->load->model('doctor_mdl');
$siniestro = $this->doctor_mdl->siniestro($sin_numOA);
$diagPrin = $this->doctor_mdl->diagnosticoPrincipal($sin_id);
if($diagPrin){
	$diag_id = $diagPrin['diag_id'];
	$data['sin_diagnostico'] = $diagPrin['lds_nom_enfs'];
	$tratPrin = $this->doctor_mdl->tratamientoPrincipal($diag_id);
	$tratSecPrin = $this->doctor_mdl->tratamientoSecPrin($diag_id);
	$data['tratPrin'] = $tratPrin;
	$data['tratSecPrin'] = $tratSecPrin;
}else{
	$data['sin_diagnostico'] = 0;
	$data['tratPrin'] = 0;
	$data['tratSecPrin'] = 0;
}

$diagSec = $this->doctor_mdl->diagnosticoSecundario($sin_id);

if($diagSec){
	$diag_idSec = $diagSec['diag_id'];
	$data['diag_idSec']=$diag_idSec;
	$data['sin_diagnosticoSec'] = $diagSec['lds_nom_enfs'];
	$tratSec = $this->doctor_mdl->tratamientoSecundario($diag_idSec);
	$data['tratSec'] = $tratSec;
}else{
	$data['sin_diagnosticoSec'] = 0;
	$data['tratSec'] = 0;
}


$verLab = $this->doctor_mdl->verlaboratorio($sin_id);

if($verLab){
	//$lab_tipo = $verLab['lab_tipo'];
	$data['verLab']=$verLab;	
	
}else{
	$data['verLab'] = 0;
	
}




$hclinica = "HC"+$dni;
if ($siniestro){

	$data['nombrePac'] = $nombrePac;
	$data['sin_id'] = $siniestro['sin_id'];
	$data['sin_numOA'] = $siniestro['sin_numOA'];
	$data['sin_numDocId'] = $siniestro['aseg_numDoc'];
	$data['sin_hclinica'] = $hclinica;
	$data['sin_fecha'] = $siniestro['sin_fech'];
	$data['sin_lugar'] = $siniestro['prov_nomCom'];
	//$data['sin_diagnostico'] = $diagPrin['lds_nom_enfs'];		        
	//$data['sin_diagnosticoSec'] = $siniestro['lds_nom_enfs'];
	//$data['sin_tratamientoSec'] = $siniestro['sin_tratamientoSec'];
	//$data['sin_dosisSecundaria'] = $siniestro['sin_dosisSecundaria'];
	$data['sin_especialidad'] = $siniestro['sin_esp'];

	$this->load->model('doctor_mdl');
	$datosHA = $this->doctor_mdl->buscaHA_sinId($sin_id);
	
	
		if ($datosHA){

			$data['sin_pa'] = $datosHA['hactual_pa'];
		    $data['sin_fc'] = $datosHA['hactual_fc'];
		    $data['sin_fr'] = $datosHA['hactual_fr'];
		    $data['sin_peso'] = $datosHA['hactual_peso'];

		    $data['sin_talla'] = $datosHA['hactual_talla'];
		    $data['sin_cabeza'] = $datosHA['hactual_cabeza'];
		    $data['sin_pielFaneras'] = $datosHA['hactual_pielFaneras'];
		    $data['sin_cvrc'] = $datosHA['hactual_cvrc'];

		    $data['sin_tpmv'] = $datosHA['hactual_tpmv'];
		    $data['sin_abdomen'] = $datosHA['hactual_abdomen'];
		    $data['sin_rha'] = $datosHA['hactual_rha'];
		    $data['sin_neuro'] = $datosHA['hactual_neuro'];

		    $data['sin_osteomuscular'] = $datosHA['hactual_osteomuscular'];
		    $data['sin_guppl'] = $datosHA['hactual_guppl'];
		    $data['sin_gupru'] = $datosHA['hactual_gupru'];

		}  	        


		        $this->load->model('doctor_mdl');
		        $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

			     if ($buscaAseg)
			       {
			       	$cert_plan = $buscaAseg['plan_codi'];
			       	$this->load->model('doctor_mdl');
			     	$verPlan = $this->doctor_mdl->buscaPlan(urldecode($cert_plan));
			     	
			     	if ($verPlan){
				        	$data['buscaPlan']=$verPlan;
				        	$data['buscado']=$cert_plan;

				        	
				        }

			       }		        
		        

		        //$this->load->view('view_mcaVistaPrevia',$data);
			       //$this->load->helper('pdf_helper');
		        $this->load->view('pdfOA', $data);

		    }
}



function imprimeTratamiento()
{
$this->load->helper('pdf_helper');

$dni = $this->input->post('numDoc');
$sin_numOA = $this->input->post('sin_numOA');
$nomEst_Prov = $this->input->post('nomEst_Prov');
$nombrePac = $this->input->post('nombrePac');
$sin_id = $this->input->post('sin_id');

$hclinica = "HC"+$dni;

$this->load->model('doctor_mdl');
$diagPrin = $this->doctor_mdl->diagnosticoPrincipal($sin_id);
$diagSec = $this->doctor_mdl->diagnosticoSecundario($sin_id);	
$siniestro = $this->doctor_mdl->siniestro($sin_numOA);


if($diagPrin){
	$diag_id = $diagPrin['diag_id'];
	$data['sin_diagnostico'] = $diagPrin['lds_nom_enfs'];
	$tratPrin = $this->doctor_mdl->tratamientoPrincipal($diag_id);
	$tratSecPrin = $this->doctor_mdl->tratamientoSecPrin($diag_id);
	$data['tratPrin'] = $tratPrin;
	$data['tratSecPrin'] = $tratSecPrin;
}else{
	$data['sin_diagnostico'] = 0;
	$data['tratPrin'] = 0;
	$data['tratSecPrin'] = 0;
}



if($diagSec){
	$diag_idSec = $diagSec['diag_id'];
	$data['diag_idSec']=$diag_idSec;
	$data['sin_diagnosticoSec'] = $diagSec['lds_nom_enfs'];
	$tratSec = $this->doctor_mdl->tratamientoSecundario($diag_idSec);
	$data['tratSec'] = $tratSec;
}else{
	$data['sin_diagnosticoSec'] = 0;
	$data['tratSec'] = 0;
}



if ($siniestro){

	$data['nombrePac'] = $nombrePac;
	$data['sin_numOA'] = $siniestro['sin_numOA'];
	$data['sin_numDocId'] = $siniestro['aseg_numDoc'];
	$data['sin_hclinica'] = $hclinica;
	$data['sin_fecha'] = $siniestro['sin_fech'];
	$data['sin_lugar'] = $siniestro['prov_nomCom'];        

	$this->load->model('doctor_mdl');
	$buscaAseg = $this->doctor_mdl->buscaDNI($dni);

	if ($buscaAseg){
		
		$cert_plan = $buscaAseg['plan_codi'];
		$this->load->model('doctor_mdl');
		$buscaNomPlan = $this->doctor_mdl->buscaNomPlan(urldecode($cert_plan));
		
		if ($buscaNomPlan){
			$data['nomPlan']=$buscaNomPlan['pla_nom'];
		}

		$verPlan = $this->doctor_mdl->buscaPlanMedicina(urldecode($cert_plan));
			     	
		if ($verPlan){
			$data['buscaPlan']=$verPlan;
			$data['buscado']=$cert_plan;
		}

	}
	        
		        
	//$this->load->view('view_mcaVistaPrevia',$data);
	$this->load->view('pdfTratamiento', $data);

}
}


function imprimeExamen()
{
$this->load->helper('pdf_helper');

$dni = $this->input->post('numDoc');
$sin_numOA = $this->input->post('sin_numOA');
$nomEst_Prov = $this->input->post('nomEst_Prov');
$nombrePac = $this->input->post('nombrePac');
$sin_id = $this->input->post('sin_id');

$hclinica = "HC"+$dni;

$this->load->model('doctor_mdl');	
$siniestro = $this->doctor_mdl->siniestro($sin_numOA);
$verLab = $this->doctor_mdl->verlaboratorio($sin_id);
$diagPrin = $this->doctor_mdl->diagnosticoPrincipal($sin_id);
$diagSec = $this->doctor_mdl->diagnosticoSecundario($sin_id);

if($verLab){
	//$lab_tipo = $verLab['lab_tipo'];
	$data['verLab']=$verLab;	
	
}else{
	$data['verLab'] = 0;
	
}


if($diagPrin){
	$diag_id = $diagPrin['diag_id'];
	$data['sin_diagnostico'] = $diagPrin['lds_nom_enfs'];
	$tratPrin = $this->doctor_mdl->tratamientoPrincipal($diag_id);
	$tratSecPrin = $this->doctor_mdl->tratamientoSecPrin($diag_id);
	$data['tratPrin'] = $tratPrin;
	$data['tratSecPrin'] = $tratSecPrin;
}else{
	$data['sin_diagnostico'] = 0;
	$data['tratPrin'] = 0;
	$data['tratSecPrin'] = 0;
}



if($diagSec){
	$diag_idSec = $diagSec['diag_id'];
	$data['diag_idSec']=$diag_idSec;
	$data['sin_diagnosticoSec'] = $diagSec['lds_nom_enfs'];
	$tratSec = $this->doctor_mdl->tratamientoSecundario($diag_idSec);
	$data['tratSec'] = $tratSec;
}else{
	$data['sin_diagnosticoSec'] = 0;
	$data['tratSec'] = 0;
}


if ($siniestro){

				$data['nombrePac'] = $nombrePac;
		        $data['sin_numOA'] = $siniestro['sin_numOA'];
		        $data['sin_numDocId'] = $siniestro['aseg_numDoc'];
		        $data['sin_hclinica'] = $hclinica;
		        $data['sin_fecha'] = $siniestro['sin_fech'];
		        $data['sin_lugar'] = $siniestro['prov_nomCom'];
		                

		        $this->load->model('doctor_mdl');
		         $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

			     if ($buscaAseg){
		
					$cert_plan = $buscaAseg['plan_codi'];
					$this->load->model('doctor_mdl');
					$buscaNomPlan = $this->doctor_mdl->buscaNomPlan(urldecode($cert_plan));
					
					if ($buscaNomPlan){
						$data['nomPlan']=$buscaNomPlan['pla_nom'];
					}

					$verPlan = $this->doctor_mdl->buscaPlanLab(urldecode($cert_plan));
						     	
					if ($verPlan){
						$data['buscaPlan']=$verPlan;
						$data['buscado']=$cert_plan;
					}else{
						$data['buscaPlan']=0;
					}

				}

		        //$this->load->view('view_mcaVistaPrevia',$data);
		        $this->load->view('pdfExamenes', $data);

		    }
}








function imprimeTratamientoAdicional()
{
$this->load->helper('pdf_helper');

$dni = $this->input->post('numDoc');
$sin_numOA = $this->input->post('sin_numOA');
$nomEst_Prov = $this->input->post('nomEst_Prov');
$nombrePac = $this->input->post('nombrePac');
$sin_id = $this->input->post('sin_id');

$this->load->model('doctor_mdl');	
$buscaAseg = $this->doctor_mdl->buscaDNI($dni);
$diagAdd = $this->doctor_mdl->diagnosticoAdicional($sin_id);	



if($diagAdd){
	$diag_id = $diagAdd['diag_id'];
	$data['sin_diagnostico'] = $diagAdd['lds_nom_enfs'];
	$tratAdd = $this->doctor_mdl->tratamientoAdicional($diag_id);	
	$data['tratAdd'] = $tratAdd;
	
}else{
	$data['sin_diagnostico'] = 0;
	$data['tratAdd'] = 0;
	
}








	if ($buscaAseg){
		
		$cert_plan = $buscaAseg['plan_codi'];
		$this->load->model('doctor_mdl');
		$buscaNomPlan = $this->doctor_mdl->buscaNomPlan(urldecode($cert_plan));
		
		if ($buscaNomPlan){
			$data['nomPlan']=$buscaNomPlan['pla_nom'];
		}

		$verPlan = $this->doctor_mdl->buscaPlanMedicina(urldecode($cert_plan));
			     	
		if ($verPlan){
			$data['buscaPlan']=$verPlan;
			$data['buscado']=$cert_plan;
		}

	}


$siniestro = $this->doctor_mdl->siniestro($sin_numOA);

if ($siniestro){

	$data['nombrePac'] = $nombrePac;
	$data['sin_numOA'] = $siniestro['sin_numOA'];
	$data['sin_numDocId'] = $dni;
	$data['sin_hclinica'] = $dni;
	$data['sin_fecha'] = $siniestro['sin_fech'];
	$data['sin_lugar'] = $nomEst_Prov;
		        //$this->load->view('view_mcaVistaPrevia',$data);
}
$this->load->view('pdfTratamientoAdd', $data);

}








 Public function cargaAseguradoDNI($numDoc, $nomEst_Prov) {

 	//recogemos los datos por POST
	 
	 $dni = $numDoc;
	      
     //comprobamos si existen en la base de datos enviando los datos al modelo
     $this->load->model('doctor_mdl');
     $buscaAseg = $this->doctor_mdl->buscaDNI($dni);

     if ($buscaAseg)
       {
       	$datos['nom1'] = $buscaAseg['aseg_nom1'];
       	$datos['nom2'] = $buscaAseg['aseg_nom2'];
       	$datos['ape1'] = $buscaAseg['aseg_ape1'];
       	$datos['ape2'] = $buscaAseg['aseg_ape2'];             
       	$datos['numDoc'] = $buscaAseg['aseg_numDoc'];
       	$datos['tipoDoc'] = $buscaAseg['aseg_tipoDoc'];
       	$datos['fechNac'] = $buscaAseg['aseg_fechNac'];
       	$datos['aseg_direcc'] = $buscaAseg['aseg_direcc'];
       	$datos['aseg_telef'] = $buscaAseg['aseg_telef'];
       	
       	$datos['cert_plan'] = $buscaAseg['cert_plan'];
       	$codPlan = $buscaAseg['cert_plan'];

       	$nomEmp = $this->doctor_mdl->buscaEmp($codPlan);
       	if ($nomEmp){
	        $datos['nombreEmpresa'] = $nomEmp['pla_emp'];
	        
	        
	    }else{
	    	$datos['nombreEmpresa'] = "RED-SALUD";
	    }

       	
       	$datos['cert_num'] = $buscaAseg['cert_num'];
       	$numCert = $buscaAseg['cert_num'];
		
		$fechIniVig = new DateTime($buscaAseg['cert_iniVigencia']);	
		$fechaIni=	$fechIniVig->format('Y-m-d');

		$now = new DateTime();
		$fechaFin=$now->format('Y-m-d');

		$interval= $this->dias_transcurridos($fechaIni, $fechaFin);

		$datos['fechIniVig']=$fechIniVig;		
		$datos['hoy']=$now;
		$datos['intervalo']=$interval;
		
       	
       	$cancelado = $this->doctor_mdl->buscaCancelado($numCert);
       	if ($cancelado){
	        $datos['cance_numCerti'] = $cancelado['cert_num'];
	        $datos['cance_estCerti'] = $cancelado['cert_estado'];
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVigencia']);
	        $datos['finVigencia'] = new DateTime($cancelado['cert_finVigencia']);
	        $datos['estadoCerti'] = "CANCELADO";
	        $datos['color'] = "#E21919";

	    }elseif ($interval<=30){
	    	$adiciona=new DateInterval('P1M');
	    	$datos['estadoCerti'] = "INACTIVO";
	        $datos['color'] = "#E21919";
	        $datos['edita'] = "disabled";
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVigencia']);
	        $datos['finVigencia']=$fechIniVig->add($adiciona);

	    }elseif ($interval>30 and $interval<=40) {
	    	$adiciona=new DateInterval('P40D');
	    	$datos['estadoCerti'] = "ACTIVO";
	        $datos['color'] = "#469A05";
	        $datos['edita'] = "enabled";
	        $fechIniVig = new DateTime($buscaAseg['cert_iniVigencia']);
	        $datos['finVigencia']=$fechIniVig->add($adiciona);


	    }elseif ($interval>=41) {
	    	$fechCobrado = $this->doctor_mdl->buscaCobrado($numCert);
	    	if ($fechCobrado){
		        $datos['cobro_vezCobro'] = $fechCobrado['cob_cobro'];
		        $datos['finVigencia'] = $fechCobrado['cob_finCobertura'];


		        $fechaFinVig1 = new DateTime($fechCobrado['cob_finCobertura']);	
				$fechaIni=$fechaFinVig1->format('Y-m-d');
				$now = new DateTime();
				$fechaFin=$now->format('Y-m-d');		        
		        $diasTransDeCobro= $this->dias_transcurridos($fechaIni, $fechaFin);

		        if($diasTransDeCobro>=40){
		        	$datos['estadoCerti'] = "INACTIVO";
			        $datos['color'] = "#E21919";
			        $datos['edita'] = "disabled";
			        $datos['finVigencia'] = $fechaFinVig1;
			        //$datos['fechIniVig']= $fechCobrado['cob_iniCobertura'];

		        }else{
		        	$datos['estadoCerti'] = "ACTIVO";
	        		$datos['color'] = "#469A05";
	        		$datos['edita'] = "enabled";
	        		//$datos['finVigencia'] = $fechaFinVig1;

	        		$adiciona=new DateInterval('P40D');
	        		$fechFinVig = new DateTime($fechCobrado['cob_finCobertura']);
			        $datos['finVigencia']=$fechFinVig->add($adiciona);



		        }
	

		    }else{
		    	$adiciona=new DateInterval('P1M');
		    	$datos['estadoCerti'] = "INACTIVO";
		        $datos['color'] = "#E21919";
		        $datos['edita'] = "disabled";
		        $fechIniVig = new DateTime($buscaAseg['cert_iniVigencia']);
		        $datos['finVigencia']=$fechIniVig->add($adiciona);
		    }
	    	
	    }

	    /*$fechCobrado = $this->doctor_mdl->buscaCobrado($numCert);
	    if ($fechCobrado){
	        $datos['cobro_vezCobro'] = $fechCobrado['cob_cobro'];
	        $datos['cobro_fechFinCober'] = $fechCobrado['cob_finCobertura'];        
	    }else{
	    	$datos['cobro_fechFinCober'] = $buscaAseg['cert_finVigencia'];
	    }*/
	    

       	$datos['sexo1'] = $buscaAseg['aseg_sexo'];
       		if ($datos['sexo1']=="M") {
       			$datos['sexo']="Masculino";
       		}else{
       			$datos['sexo']="Femenino";
       		}
       	//$datos['cert_iniVigencia'] = $buscaAseg['cert_iniVigencia'];
       	//$datos['cert_finVigencia'] = $buscaAseg['cert_finVigencia'];
       	$datos['estado'] = $buscaAseg['cert_estado'];
       	$datos['dire1'] = 'esta direccion 1';
       	$datos['nomEst_Prov']=$nomEst_Prov;
       	$historia = $this->doctor_mdl->buscaHistoria($dni);
        
        //$misSiniestros = $this->doctor_mdl->buscaSiniestro($dni);
        if ($historia){
	        $datos['hcl_numDocId'] = $historia['hcl_numDocId'];
	        $datos['hcl_nomHC'] = $historia['hcl_nomHC'];
			$misDatos = $this->doctor_mdl->buscaDatos($dni);			
			$listaSiniestros = $this->doctor_mdl->siniestros($dni);        
	        if ($misDatos){
		        $datos['sin_numCerti'] = $misDatos['sin_numCerti'];
		        $datos['sin_numDocId'] = $misDatos['sin_numDocId'];
		        $datos['sin_fecha'] = $misDatos['sin_fech'];
		        $datos['sin_lugar'] = $misDatos['sin_lugar'];
		        
		        $datos['siniestros']=$listaSiniestros;

		        $this->load->view('view_mcaBuscaRespuesta',$datos);

		    } else
		    {
		    	$this->load->view('view_mcaBuscaRespuesta',$datos);
		    }		    	
		   //$this->load->view('view_mcaBuscaRespuesta',$datos);
	    } else
	      {
			$this->load->view('view_mcaBuscaRespuesta',$datos);
	      }
	        //$this->load->view('view_mcaBuscaRespuesta',$datos);
    	}
    	else
    	{	
    		
    	$info['nomEst_Prov']=$nomEst_Prov;
    	$this->load->view('view_mcaBuscaFail',$info);
    	}

	 }



function previoImpresion(){

$nombreCompleto = $this->input->post('nombreCompleto');
$sexo = $this->input->post('sexo');
$fechNac = $this->input->post('fechNac');
$nomEst_Prov = $this->input->post('nomEst_Prov');
$sin_fecha = $this->input->post('sin_fecha');
$numDoc = $this->input->post('numDoc');
$nombres = $this->input->post('nombres');
$apellidos = $this->input->post('apellidos');
$aseg_id = $this->input->post('aseg_id');
$prov_id = $this->input->post('prov_id');
$cert_id = $this->input->post('cert_id');


//esto no habia antes, aqui guardamos la HC defrente y el link d generar HC en la vista BuscaRespuesta se elimina.
	$this->load->model('doctor_mdl');

	$historia = $this->doctor_mdl->buscaHistoriaId($aseg_id);

	if (!$historia) {
	
	$dataHC['aseg_id'] = $aseg_id;
	$dataHC['hcli_est'] = 1;
	$dataHC['prov_id'] = $prov_id;
	$dataHC['cert_id'] = $cert_id;

// comentamos esto hasta q se decida crear y guardar en tabla hc_detalle
	/*$dataHC['nomEst_Prov'] = $nomEst_Prov;
	$dataHC['hcl_numDocId'] = $numDoc;
	$dataHC['hcl_nomPac'] = $nombres;
	$dataHC['hcl_apePac'] = $apellidos;
	$dataHC['hcl_fechNac'] = " ";
	$dataHC['hcl_edadAct'] = " ";
	$dataHC['hcl_sexo'] = " ";
	$dataHC['hcl_telef'] = " ";
	$dataHC['hcl_direccion'] = " ";
	$dataHC['hcl_antePers'] = " ";
	$dataHC['hcl_anteFam'] = " ";
	$dataHC['hcl_alergiaFarm'] = " ";
	$dataHC['hcl_alergiaAlim'] = " ";
	$dataHC['hcl_motPrimConsul'] = " ";*/

	//esto ya no se hace por que el #de HC sera su DNI
	/*$this->load->model('doctor_mdl');
	$numHC = $this->doctor_mdl->buscaNomHC();
		 
	if ($numHC){
		$antiguoIndice=$numHC['hcl_nomHC'];
	}else{

	 	$antiguoIndice=000000;
	}*/
		 
	$nuevoIndice=$numDoc;
	//$final=str_pad($nuevoIndice, 6, 0, STR_PAD_LEFT);	 
	//$dataHC['hcl_nomHC'] = $final;

	$dataHC['hcl_nomHC'] = $nuevoIndice;

	$hclinica = $nuevoIndice;
	//llamamos al modelo y guardamos
	$this->load->model('doctor_mdl');
	$this->doctor_mdl->guardaHistoria($dataHC);
} else {
	$hclinica = $historia['hcli_nom'];
}

// fin de cambios para guardar directamente la HC y desaparecer el boton de la vista buscaRespuesta

$data['nombreCompleto'] = $nombreCompleto;
$data['sexo'] = $sexo;
$data['fechNac'] = $fechNac;
$data['nomEst_Prov'] = $nomEst_Prov;
$data['sin_fecha'] = $sin_fecha;
$data['numDoc'] = $numDoc;
$data['hcl_nomHC'] = $hclinica;
$data['aseg_id'] = $aseg_id;
$data['prov_id'] = $prov_id;
$data['cert_id'] = $cert_id;


$this->load->view('view_mcaPrevioImpresion',$data);


}


function imprimeFormulario()
{
$this->load->helper('pdf_helper');

$nombreCompleto = $this->input->post('nombreCompleto');
$sexo = $this->input->post('sexo');
$fechNac = $this->input->post('fechNac');
$nomEst_Prov = $this->input->post('nomEst_Prov');
$sin_fecha = $this->input->post('sin_fecha');
$numDoc = $this->input->post('numDoc');
$dni = $this->input->post('numDoc');

$aseg_id = $this->input->post('aseg_id');
$prov_id = $this->input->post('prov_id');
$cert_id = $this->input->post('cert_id');



$data['nombreCompleto'] = $nombreCompleto;
$data['sexo'] = $sexo;
$data['fechNac'] = $fechNac;
$data['nomEst_Prov'] = $nomEst_Prov;
$data['sin_fecha'] = $sin_fecha;
$data['numDoc'] = $numDoc;

$this->load->model('doctor_mdl');

//$this->doctor_mdl->guardaSiniestroHead($data);

$buscaAseg = $this->doctor_mdl->buscaDNI($dni);

	if ($buscaAseg)
	{
            //$cert_plan = $buscaAseg['cert_num'];
            $cert_plan = $buscaAseg['plan_codi'];
            $this->load->model('doctor_mdl');
            $verPlan = $this->doctor_mdl->buscaPlan(urldecode($cert_plan));
           
            if ($verPlan){
                $data['buscaPlan']= $verPlan;
                $data['buscado']=$cert_plan;
                $data['nombrePlan']=$verPlan[0]['plan_nom'];
                $data['planDetalle']=$verPlan[0]['varPlan_deta'];
                $data['planDetalleDesc']=$verPlan[0]['planDeta_textWeb'];
                
            }

	}


		 $data['nombrePac'] = $nombreCompleto;
		 $data['pa'] = " ";
		 $data['fc'] = " ";
		 $data['fr'] = " ";
		 $data['peso'] = " ";
		 $data['talla'] = " ";
		 $data['cabeza'] = " ";
		 $data['pielFaneras'] = " ";
		 $data['cvrc'] = " ";
		 $data['tpmv'] = " ";
		 $data['abdomen'] = " ";
		 $data['rha'] = " ";
		 $data['neuro'] = " ";
		 $data['osteomuscular'] = " ";
		 $data['guppl'] = " ";
		 $data['gupru'] = " ";
		 $data['sin_especialidad'] = " ";
		 $data['sin_estado'] = 0;

		 $this->load->model('doctor_mdl');
		 $numSin = $this->doctor_mdl->buscaNomSin();
		 
		 if ($numSin){
		 	$antiguoIndice=$numSin['sin_numOA'];
		 }else{
		 	$antiguoIndice=000000;
		 }

		 $nuevoIndice=$antiguoIndice+1;
		 $final=str_pad($nuevoIndice, 6, 0, STR_PAD_LEFT);
		 
		 $data['sin_numOA'] = $final;
		 $data['aseg_id'] = $aseg_id;
		 $data['cert_id'] = $cert_id;
		 
		 $data['prov_id'] = $prov_id;
		 $data['sin_est'] = 0;
		 $data['sin_tipo'] = 1;

		 //llamamos al modelo y guardamos
		 $this->load->model('doctor_mdl');
		 $this->doctor_mdl->guardaSiniestroP0($data);
                 
$this->load->view('pdfFormulario', $data);
}
function pdfPrueba()
{
$this->load->helper('pdf_helper');
//$this->load->view('view_mcaVistaPrevia',$data);
$this->load->view('pdfPrueba');
		    
}



}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
