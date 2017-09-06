<?php
 class Doctor_mdl extends CI_Model {

 function Doctor_mdl() {
 parent::__construct(); //llamada al constructor de Model.
 $this->load->database();
 }
 
function getData() {
 $doctores = $this->db->get('doctor'); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $doctores->result(); //devolvemos el resultado de lanzar la query.
 }


function verificaCorreo($email)
  {
    $this->db->where('email_Doc', $email);    
    $query = $this->db->get('doctor');

     if ($query->num_rows()==1)
     {
        return $query->result();
     }
     
  }


function buscaProveedor($nomEst_Prov) {
 
 $buscaProv = $this->db->get_where('proveedor', array('prov_nomCom' => $nomEst_Prov)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $buscaProv->row_array(); //devolvemos el resultado de lanzar la query.
 }




function buscaHistoriaId($aseg_id) {
 
 $historia = $this->db->get_where('hclinica', array('aseg_id' => $aseg_id)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $historia->row_array(); //devolvemos el resultado de lanzar la query.
 }

 function buscaHA_Id($aseg_id) {
 
 $historia = $this->db->get_where('hactual', array('aseg_id' => $aseg_id)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $historia->row_array(); //devolvemos el resultado de lanzar la query.
 }

 function buscaHA_sinId($sin_id) {
 
 $historia = $this->db->get_where('hactual', array('sin_id' => $sin_id)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $historia->row_array(); //devolvemos el resultado de lanzar la query.
 }

function buscaHistoria($dni) {
 
 $historia = $this->db->get_where('hclinicas', array('hcl_numDocId' => $dni)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $historia->row_array(); //devolvemos el resultado de lanzar la query.
 }


 function siniestro($sin_numOA) {
 
 $this->db->select('*');
 $this->db->from('siniestro');
 $this->db->join('asegurado', 'asegurado.aseg_id = siniestro.aseg_id'); 
 $this->db->join('proveedor', 'proveedor.prov_id = siniestro.prov_id');
 $this->db->where('sin_numOA', $sin_numOA);

 $siniestro = $this->db->get();
 return $siniestro->row_array();

 }

 //diagnosticoPrincipal

 function diagnosticoPrincipal($sin_id) {
    $diagPrin = $this->db->query('select diag_id, lds_nom_enfs, diag_tipo from diagnostico where sin_id='.$sin_id.' and diag_tipo=1');
    return $diagPrin->row_array();
 }

 
 function diagnosticoSecundario($sin_id) {
    $diagSec = $this->db->query('select diag_id, lds_nom_enfs, diag_tipo from diagnostico where sin_id='.$sin_id.' and diag_tipo=3');
    return $diagSec->row_array();
 }

 function tratamientoPrincipal($diag_id) {
    $tratPrin = $this->db->query('select trat_id, trat_medi, trat_cant, trat_dosis, trat_tipo from tratamiento where diag_id='.$diag_id.' and trat_tipo=1');
    return $tratPrin->result_array();

    //$plan = $this->db->get();
    //return $plan->result_array();
 }

 function tratamientoSecPrin($diag_id) {
    $tratPrin = $this->db->query('select trat_id, trat_medi, trat_cant, trat_dosis, trat_tipo from tratamiento where diag_id='.$diag_id.' and trat_tipo=3');
    return $tratPrin->result_array();

    //$plan = $this->db->get();
    //return $plan->result_array();
 }

  function tratamientoSecundario($diag_idSec) {
    $tratSec = $this->db->query('select trat_id, trat_medi, trat_cant, trat_dosis, trat_tipo from tratamiento where diag_id='.$diag_idSec.' and trat_tipo=3');
    return $tratSec->result_array();
 }

   function verlaboratorio($sin_id) {
    $verLab = $this->db->query('select lab_id, detaAnalisis, lab_tipo from laboratorio where sin_id='.$sin_id);
    return $verLab->result_array();
 }



function diagnosticoAdicional($sin_id) {
    $diagAdd = $this->db->query('select diag_id, lds_nom_enfs, diag_tipo from diagnostico where sin_id='.$sin_id.' and diag_tipo=4');
    return $diagAdd->row_array();
 }

function tratamientoAdicional($diag_id) {
    $tratAdd = $this->db->query('select trat_id, trat_medi, trat_cant, trat_dosis, trat_tipo from tratamiento where diag_id='.$diag_id.' and trat_tipo=24 or diag_id='.$diag_id.' and trat_tipo=4');
    return $tratAdd->result_array();

    //$plan = $this->db->get();
    //return $plan->result_array();
 }

 function buscaHC($hcl_nomHC) {
 
 $historia = $this->db->get_where('hclinica', array('hcli_nom' => $hcl_nomHC)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $historia->row_array(); //devolvemos el resultado de lanzar la query.
 }

 function buscaCancelado($numCert) {
 
 $cancelado = $this->db->get_where('cancelado', array('cert_id' => $numCert)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 return $cancelado->row_array(); //devolvemos el resultado de lanzar la query. 
 //$cancelado = $this->db->query('SELECT * FROM cancelados WHERE cert_num='.$numCert.' ORDER BY sin_id DESC LIMIT 1');
       // return $cancelado->row_array();
 }


  function buscaEmp($codPlan) {
 
 //$nomEmp = $this->db->get_where('plan', array('plan_codi' => $codPlan));
 
 $this->db->select('*');
 $this->db->from('plan');
 //$this->db->join('programa', 'programa.prog_id = plan.plan_id'); 
 $this->db->join('programa', 'programa.prog_id = plan.prog_id'); 
 $this->db->join('clientes', 'clientes.cli_id = programa.cli_id');
 $this->db->where('plan.plan_codi', $codPlan); 
   
 //return $nomEmp->row_array(); //devolvemos el resultado de lanzar la query.
 
 $nomEmp = $this->db->get();
 return $nomEmp->row_array(); //devolvemos el resultado de lanzar la query.
 }


function buscaCobrado($numCert) {
 
 $fechCobrado = $this->db->query('SELECT * FROM cobro WHERE cert_id='.$numCert.' ORDER BY cob_vezCob DESC LIMIT 1');
 return $fechCobrado->row_array();

 }
/*function buscaDNI($dni)
    {
        $this->db->where('aseg_numDoc', $dni);
        $this->db->where('cert_estado', 1);
        
        $query = $this->db->get('aseguibk');

        if ($query->num_rows()==1)
        {
            return $query->row_array();
            return $query->result();

        }
        else
        {
            //header("Location: buscaAsegurado");
            return $query->result();

        }
    }*/


function buscaDNI($dni)
    {
       //consulta directa a tablas utilizando el activerecord de CI
       /* 
        $this->db->select('*');
        $this->db->from('asegurado');
        $this->db->join('certificado_asegurado', 'certificado_asegurado.aseg_id = asegurado.aseg_id');
        $this->db->join('certificado', 'certificado.cert_id = certificado_asegurado.cert_id');
        $this->db->join('plan', 'plan.plan_id = certificado.plan_id');
        $this->db->join('tipodoc', 'tipodoc.tipoDoc_id = asegurado.tipoDoc_id');
        $this->db->where('asegurado.aseg_numDoc', $dni);
           //$this->db->order_by("cert_num", "desc");
           //$this->db->LIMIT(1);
        $query = $this->db->get();*/

        //consulta al view buscadni de la BBDD
        $query = $this->db->query('select * from buscadni where aseg_numDoc ='.$dni.' order by cert_estado asc limit 1');


        // codigo anterior
    //$query = $this->db->query('SELECT * FROM siniestros WHERE sin_numDocId='.$dni.' ORDER BY sin_id DESC LIMIT 1');
    //$query = $this->db->query('SELECT * FROM asegurado INNER JOIN certificado_asegurado on certificado_asegurado.aseg_id = asegurado.aseg_id where asegurado.aseg_numDoc ='.$dni);
    //$this->db->where('aseg_numDoc', $dni);
        //$this->db->where('cert_estado', 1);
    //$this->db->order_by("cert_num", "desc");
    //$this->db->LIMIT(1);
        
        //$query = $this->db->get('aseguibk');

        if ($query->num_rows()==1)
        {
            return $query->row_array();
            return $query->result();

        }
        else
        {
            //header("Location: buscaAsegurado");
            return $query->result();

        }
    }
    

function buscaDatos($dni){

        //$query = $this->db->get_where('siniestros', array('sin_numDocId' => $dni));
        //return $query->row_array();

        $query = $this->db->query('SELECT * FROM sinusucert WHERE aseg_numDoc='.$dni.' ORDER BY sin_id DESC LIMIT 1');
        return $query->row_array();

        /*if ($query->num_rows()>=1)
        {
            return $query->row_array();
            return $query->result();
        }
        else
        {
            return $query->result();
        }*/
    }

function buscaNomHC(){
    $query = $this->db->query('SELECT * FROM hclinica ORDER BY hcli_id DESC LIMIT 1');
        return $query->row_array();
}

function buscaNomSin(){
    $query = $this->db->query('SELECT * FROM siniestro ORDER BY sin_numOA DESC LIMIT 1');
        return $query->row_array();
}


function buscaLab($plan_id){
    $query = $this->db->query('SELECT * FROM plan_detalle WHERE varPlan_deta="Laboratorio"' );
    
    return $query->result();
}
//esto devuelve el array de datos (todos los registros)
function buscaDatos2($dni){

        $query = $this->db->get_where('siniestros', array('sin_numDocId' => $dni));
        return $query->row_array();

        //$query = $this->db->query('SELECT nom_Doc FROM doctor WHERE email_Doc=$email');
        //return $query;

        if ($query->num_rows()>=1)
        {
            return $query->row_array();
            return $query->result();
        }
        else
        {
            return $query->result();
        }
    }
function buscaEmpPlan($cert_plan){

       $this->db->where('pla_cod', $cert_plan);
        
        $query = $this->db->get('planes');

        if ($query->num_rows()==1)
        {
            return $query->row_array();
            return $query->result();

        }
        else
        {
            //header("Location: buscaAsegurado");
            return $query->result();

        }

    }
function buscaPlan($cert_plan) {
 
 //$plan = $this->db->get_where('detaplan', array('pla_cod' => $cert_plan)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 //return $plan->result(); //devolvemos el resultado de lanzar la query.


 $this->db->select('*');
 $this->db->from('plan');
 $this->db->join('plan_detalle', 'plan_detalle.plan_id = plan.plan_id'); 
 $this->db->where('plan_codi', $cert_plan);
 $this->db->where('plan_detalle.planDeta_visible', 'si');
 $this->db->order_by('planDeta_id');
    
 //return $nomEmp->row_array(); //devolvemos el resultado de lanzar la query.
 
 $plan = $this->db->get();
 return $plan->result_array(); //devolvemos el resultado de lanzar la query.
 //$query->result_array();
 }


 function buscaPlanData($cert_plan) {
 
 $nomPlan = $this->db->get_where('plan', array('plan_codi' => $cert_plan)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $nomPlan->row_array(); //devolvemos el resultado de lanzar la query.
 }
 function buscaPlanMedicina($cert_plan) {

 $this->db->select('*');
 $this->db->from('plan_detalle');
 $this->db->join('plan', 'plan.plan_id = plan_detalle.plan_id'); 
 $this->db->where('plan.plan_codi', $cert_plan);
 $this->db->where('plan_detalle.varPlan_deta', 'Medicamentos Genericos');
 
 //$plan = $this->db->get_where('plan_detalle', array('pla_cod' => $cert_plan, 'visto_pdf' => '1')); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 $plan = $this->db->get();
 return $plan->result(); //devolvemos el resultado de lanzar la query.
 }

 function buscaPlanLab($cert_plan) {

 $this->db->select('*');
 $this->db->from('plan_detalle');
 $this->db->join('plan', 'plan.plan_id = plan_detalle.plan_id'); 
 $this->db->where('plan.plan_codi', $cert_plan);
 $this->db->where('plan_detalle.varPlan_deta', 'Laboratorio');
 
 //$plan = $this->db->get_where('plan_detalle', array('pla_cod' => $cert_plan, 'visto_pdf' => '1')); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 $plan = $this->db->get();
 return $plan->result(); //devolvemos el resultado de lanzar la query.
 }

 function buscaNomPlan($cert_plan) {
 
 $nomPlan = $this->db->get_where('planes', array('pla_cod' => $cert_plan)); //obtenemos la tabla 'doctores'. db->get('nombre_tabla') equivale a SELECT * FROM nombre_tabla.
 
 return $nomPlan->row_array(); //devolvemos el resultado de lanzar la query.
 }

 function siniestros($dni) {
 
 //$siniestros = $this->db->get_where('sinusucert', array('aseg_numDoc' => $dni));


 $this->db->select('*');
 $this->db->from('sinusucert');
 $this->db->join('proveedor', 'proveedor.prov_id = sinusucert.prov_id'); 
 $this->db->where('aseg_numDoc', $dni);

 $siniestros = $this->db->get();
 return $siniestros->result();
 
 //return $siniestros->result(); //devolvemos el resultado de lanzar la query.
 }





function insert($data) {
 $this->db->set('nom_Doc', $data['nombre']);
 $this->db->set('apePat_Doc', $data['apellido']);
 $this->db->set('email_Doc', $data['email']);
 $this->db->set('pass_Doc', $data['password']);
 $this->db->insert('doctor');
 }

 function guardaSiniestro($data) {
 $this->db->set('sin_numDocId', $data['numDoc']);
 $this->db->set('sin_fech', $data['sin_fecha']);
 $this->db->set('sin_lugar', $data['nomEst_Prov']);
 $this->db->set('sin_diagnostico', $data['sin_diagnostico']);
 $this->db->set('sin_diagnosticoSec', $data['sin_diagnosticoSec']);
 $this->db->set('sin_numOA', $data['sin_numOA']);
 $this->db->set('sin_hclinica', $data['hclinica']);

 $this->db->set('sin_pa', $data['pa']);
 $this->db->set('sin_fc', $data['fc']);
 $this->db->set('sin_fr', $data['fr']);
 $this->db->set('sin_peso', $data['peso']);

 $this->db->set('sin_talla', $data['talla']);
 $this->db->set('sin_cabeza', $data['cabeza']);
 $this->db->set('sin_pielFaneras', $data['pielFaneras']);
 $this->db->set('sin_cvrc', $data['cvrc']);

 $this->db->set('sin_tpmv', $data['tpmv']);
 $this->db->set('sin_abdomen', $data['abdomen']);
 $this->db->set('sin_rha', $data['rha']);
 $this->db->set('sin_neuro', $data['neuro']);

 $this->db->set('sin_osteomuscular', $data['osteomuscular']);
 $this->db->set('sin_guppl', $data['guppl']);
 $this->db->set('sin_gupru', $data['gupru']);
 $this->db->set('sin_tratamiento', $data['sin_tratamiento']);

 $this->db->set('sin_laboratorio', $data['sin_laboratorio']);
 

 $this->db->insert('siniestros');
 }
function guardaSiniestroP0($data) {
 
 $this->db->set('aseg_id', $data['aseg_id']);
 $this->db->set('cert_id', $data['cert_id']);
 $this->db->set('sin_fech', $data['sin_fecha']);
 $this->db->set('prov_id', $data['prov_id']);
 $this->db->set('sin_est', $data['sin_est']); 
 $this->db->set('sin_tipo', $data['sin_tipo']);
 $this->db->set('sin_numOA', $data['sin_numOA']);
 if (isset($data['sin_especialidad'])){
    $this->db->set('sin_esp', $data['sin_especialidad']);
 }
 $this->db->insert('siniestro');
 }

 function guardaHActualP1($data) {
 $this->db->set('aseg_id', $data['aseg_id']);
 $this->db->set('sin_id', $data['sin_id']); 
 $this->db->set('hactual_fec', $data['sin_fecha']);
 $this->db->set('hactual_pa', $data['pa']);
 $this->db->set('hactual_fc', $data['fc']);
 $this->db->set('hactual_fr', $data['fr']);
 $this->db->set('hactual_peso', $data['peso']);
 $this->db->set('hactual_talla', $data['talla']);
 $this->db->set('hactual_cabeza', $data['cabeza']);
 $this->db->set('hactual_pielFaneras', $data['pielFaneras']);
 $this->db->set('hactual_cvrc', $data['cvrc']);
 $this->db->set('hactual_tpmv', $data['tpmv']);
 $this->db->set('hactual_abdomen', $data['abdomen']);
 $this->db->set('hactual_rha', $data['rha']);
 $this->db->set('hactual_neuro', $data['neuro']);
 $this->db->set('hactual_osteomuscular', $data['osteomuscular']);
 $this->db->set('hactual_guppl', $data['guppl']);
 $this->db->set('hactual_gupru', $data['gupru']);
 $this->db->set('hactual_motcons', $data['hactual_motcons']);

 $this->db->insert('hactual');
 }



function guardaDiagnostico($data) {
 $this->db->set('sin_id', $data['sin_id']);
 $this->db->set('lds_nom_enfs', $data['lds_nom_enfs']);
 $this->db->set('diag_tipo', $data['diag_tipo']);
 $this->db->insert('diagnostico');
 //return $last_id;
 }

 function updateDiagnostico($data) {
 $this->db->set('lds_nom_enfs', $data['lds_nom_enfs']);
 $this->db->set('diag_tipo', $data['diag_tipo']);
 $this->db->where('diag_id', $data['diag_id']);
 $this->db->insert('diagnostico');
 }

  function guardaSiniestroP2($data) {
 $this->db->set('diag_id', $data['diag_id']);
 $this->db->set('trat_medi', $data['trat_medi']);
 $this->db->set('trat_cant', $data['trat_cant']);
 $this->db->set('trat_dosis', $data['trat_dosis']);
 $this->db->set('trat_tipo', $data['trat_tipo']); 
 $this->db->insert('tratamiento');
 }



 
 function guardaSiniestroP3($data) {
 
 $this->db->set('detaAnalisis', $data['detaAnalisis']);
 $this->db->set('sin_id', $data['sin_id']);  
 $this->db->set('lab_tipo', $data['lab_tipo']);
 $this->db->insert('laboratorio');   
 
 }



 function guardaOMAdd($data) {

 if (isset($data['sin_tratAd1'])){
     $this->db->set('sin_tratAd1', $data['sin_tratAd1']);     
 }

 if (isset($data['sin_cantTratAd1'])){
     $this->db->set('sin_cantTratAd1', $data['sin_cantTratAd1']);
   }
 if (isset($data['sin_dosisTratAd1'])){
     $this->db->set('sin_dosisTratAd1', $data['sin_dosisTratAd1']);
   }
 if (isset($data['sin_tratAd2'])){
     $this->db->set('sin_tratAd2', $data['sin_tratAd2']);     
 }

 if (isset($data['sin_cantTratAd2'])){
     $this->db->set('sin_cantTratAd2', $data['sin_cantTratAd2']);
   }
 if (isset($data['sin_dosisTratAd2'])){
     $this->db->set('sin_dosisTratAd2', $data['sin_dosisTratAd2']);
   }
if (isset($data['sin_tratAd3'])){
     $this->db->set('sin_tratAd3', $data['sin_tratAd3']);     
 }

 if (isset($data['sin_cantTratAd3'])){
     $this->db->set('sin_cantTratAd3', $data['sin_cantTratAd3']);
   }
 if (isset($data['sin_dosisTratAd3'])){
     $this->db->set('sin_dosisTratAd3', $data['sin_dosisTratAd3']);
   }
if (isset($data['sin_tratAd4'])){
     $this->db->set('sin_tratAd4', $data['sin_tratAd4']);     
 }

 if (isset($data['sin_cantTratAd4'])){
     $this->db->set('sin_cantTratAd4', $data['sin_cantTratAd4']);
   }
 if (isset($data['sin_dosisTratAd4'])){
     $this->db->set('sin_dosisTratAd4', $data['sin_dosisTratAd4']);
   }


 $this->db->set('sin_estado', $data['sin_estado']);
 $this->db->where('sin_numOA', $data['sin_numOA']);
 $this->db->update('siniestros');

 }




 function guardaHistoria($data) {
 
 $this->db->set('aseg_id', $data['aseg_id']);
 $this->db->set('hcli_est', $data['hcli_est']);
 $this->db->set('cert_id', $data['cert_id']);

 $this->db->set('hcli_nom', $data['hcl_nomHC']);
 $this->db->insert('hclinica');
 }


 function updateSinLabFlag($data) { 
 $this->db->set('sin_labFlag', '1'); 
 $this->db->where('sin_id', $data['sin_id']); 
 $this->db->update('siniestro');
 }


 function updateSiniestroP1_A($data) { 
 $this->db->set('sin_esp', $data['sin_especialidad']);
 $this->db->set('sin_est', $data['sin_estado']);
 $this->db->where('sin_id', $data['sin_id']); 
 $this->db->update('siniestro');
 }

 function updateSiniestroP1_OA($data) { 
 $this->db->set('sin_est', $data['sin_estado']);
 $this->db->where('sin_numOA', $data['sin_numOA']); 
 $this->db->update('siniestro');
 }


 function updateHActualP1($data) {
 $this->db->set('aseg_id', $data['aseg_id']);
 $this->db->set('sin_id', $data['sin_id']);
 
 $this->db->set('hactual_fec', $data['sin_fecha']);
 $this->db->set('hactual_pa', $data['pa']);
 $this->db->set('hactual_fc', $data['fc']);
 $this->db->set('hactual_fr', $data['fr']);
 $this->db->set('hactual_peso', $data['peso']);
 $this->db->set('hactual_talla', $data['talla']);
 $this->db->set('hactual_cabeza', $data['cabeza']);
 $this->db->set('hactual_pielFaneras', $data['pielFaneras']);
 $this->db->set('hactual_cvrc', $data['cvrc']);
 $this->db->set('hactual_tpmv', $data['tpmv']);
 $this->db->set('hactual_abdomen', $data['abdomen']);
 $this->db->set('hactual_rha', $data['rha']);
 $this->db->set('hactual_neuro', $data['neuro']);
 $this->db->set('hactual_osteomuscular', $data['osteomuscular']);
 $this->db->set('hactual_guppl', $data['guppl']);
 $this->db->set('hactual_gupru', $data['gupru']);
 $this->db->set('hactual_motcons', $data['hactual_motcons']);
 
 $this->db->update('hactual');
 }





 function update($data) {
 $this->db->set('id_Doc', $data['id_Doc']);
 $this->db->set('tipo_Doc', $data['tipo_Doc']);
 $this->db->set('est_Doc', $data['est_Doc']);
 $this->db->set('dni_Doc', $data['dni_Doc']);
 $this->db->set('ruc_Doc', $data['ruc_Doc']);
 $this->db->set('direc_Doc', $data['direc_Doc']);
 $this->db->set('prov_Doc', $data['prov_Doc']);
 $this->db->set('ciu_Doc', $data['ciu_Doc']);
 $this->db->set('nom_Doc', $data['nom_Doc']);
 $this->db->set('apePat_Doc', $data['apePat_Doc']);
 $this->db->set('apeMat_Doc', $data['apeMat_Doc']);
 $this->db->set('email_Doc', $data['email_Doc']);
 $this->db->set('pass_Doc', $data['pass_Doc']);
 $this->db->set('ncol_Doc', $data['ncol_Doc']);
 $this->db->set('esp_Doc', $data['esp_Doc']);
 $this->db->set('rne_Doc', $data['rne_Doc']);
 $this->db->set('tel_Doc', $data['tel_Doc']);
 $this->db->set('cel_Doc', $data['cel_Doc']);
 $this->db->where('id_Doc', $data['id_Doc']);
 $this->db->update('doctor');
 }


 function updateMedico($data) {
 $this->db->set('id_Doc', $data['id_Doc']);
 $this->db->set('tipo_Doc', $data['tipo_Doc']);
 $this->db->set('est_Doc', $data['est_Doc']); 
 $this->db->set('dep_Doc', $data['dep_Doc']);
 $this->db->set('ciu_Doc', $data['ciu_Doc']);
 $this->db->set('nom_Doc', $data['nom_Doc']);
 $this->db->set('apePat_Doc', $data['apePat_Doc']);
 $this->db->set('apeMat_Doc', $data['apeMat_Doc']);
 $this->db->set('email_Doc', $data['email_Doc']);
 $this->db->set('pass_Doc', $data['pass_Doc']);
 $this->db->set('ncol_Doc', $data['ncol_Doc']);
 $this->db->set('esp_Doc', $data['esp_Doc']);
 $this->db->set('rne_Doc', $data['rne_Doc']);
 $this->db->set('tel_Doc', $data['tel_Doc']);
 //$this->db->set('cel_Doc', $data['cel_Doc']);
 $this->db->where('id_Doc', $data['id_Doc']);
 $this->db->update('doctor');
 }

 function updateCenMedico($data) {
 $this->db->set('id_Doc', $data['id_Doc']);
 $this->db->set('tipo_Doc', $data['tipo_Doc']);
 $this->db->set('est_Doc', $data['est_Doc']);
 $this->db->set('nom_Doc', $data['nom_Doc']);
 $this->db->set('nomCm_Doc', $data['nomCm_Doc']);
 $this->db->set('apePat_Doc', $data['apePat_Doc']);
 $this->db->set('apeMat_Doc', $data['apeMat_Doc']);
 $this->db->set('ruc_Doc', $data['ruc_Doc']);
 $this->db->set('direc_Doc', $data['direc_Doc']);
 $this->db->set('dep_Doc', $data['dep_Doc']);
 $this->db->set('ciu_Doc', $data['ciu_Doc']);
 $this->db->set('tel_Doc', $data['tel_Doc']); 
 $this->db->set('email_Doc', $data['email_Doc']);
 $this->db->set('pass_Doc', $data['pass_Doc']);
 
 //$this->db->set('cel_Doc', $data['cel_Doc']);
 $this->db->where('id_Doc', $data['id_Doc']);
 $this->db->update('doctor');
 }



 function update_tipo($data) {
 $this->db->set('tipo_Doc', $data['tipo_Doc']);
 $this->db->where('id_Doc', $data['id_Doc']);
 $this->db->update('doctor');
 }


 function obtenerContacto($id_Doc) {
$this->db->select('*');
$this->db->from('doctor');
$this->db->where('id_Doc = ' . $id_Doc);
$contacto = $this->db->get();
return $contacto->result();
}

 function obtenerTratamiento($nom_enf) {
$this->db->select('*');
$this->db->from('diagnosticosec');
$this->db->like('nom_enf', $nom_enf); 
//$this->db->where('nom_enf', $nom_enf);
$tratamiento = $this->db->get();
return $tratamiento->result();
}

 function obtenerMedicinas($cod_enf2) {
$this->db->select('*');
$this->db->from('medicamentos');
//$this->db->like('nom_enf', $nom_enf); 
$this->db->where('cod_enf2', $cod_enf2);
$medicamento = $this->db->get();
return $medicamento->result();
}


function sendMail($dataEmail){
$config = Array(        
        /*'protocol' => 'smtp',
        'smtp_host' => 'ssl://smtp.googlemail.com',
        'smtp_port' => 465,
        'smtp_user' => 'user@gmail.com',
        'smtp_pass' => '******',
        'smtp_timeout' => '4',*/

        'protocol' => 'mail',		
		'wordwrap' => TRUE,
        'mailtype' => 'html',
        'charset'  => 'iso-8859-1',
    );

$this->load->library('email', $config);


$this->email->from('afiliacion@red-salud.com', 'Afiliaciones Red Salud Peru');
$this->email->to($dataEmail['email_Doc']); 
$this->email->bcc('contacto@red-salud.com'); 
//$this->email->cc('ellos@su-ejemplo.com'); 

$message = "<html><body>Bienvenido <span style='font-weight: bold'>".$dataEmail['nom_Doc']."</span>. <br><br>Gracias por unirse a Red-Salud. Aqu&iacute; le adjuntamos los datos de su registro:"; 
$message .= "<br>";
$message .= "Su Usuario: ".$dataEmail['email_Doc'];
$message .= "<br>";
$message .= "Su Contrasena: ".$dataEmail['pass_Doc']."<br><br>";
$message .= "Equipo Red-Salud <br><br> Calle El&iacute;as Aguirre 126 Of. 1101<br>Miraflores – Lima Per&uacute;<br>Central: (51 1 ) 242-2298<br>Fax: 242-2298<br>contacto@red-salud.com<br>www.red-salud.com</body></html>";

$this->email->subject('Registro Red Salud');
$this->email->message($message);	

$this->email->send();
}

}
?>