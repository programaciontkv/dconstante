<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emisor_model extends CI_Model {

	public function lista_emisores(){
		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->order_by('emi_id');
		$resultado=$this->db->get();
		return $resultado->result();
	}


	
	public function insert($data){
		
		$this->db->insert("erp_emisor",$data);
		return $this->db->insert_id();
			
	}

	public function lista_un_emisor($id){
		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social, ep.emp_logo" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('em.emi_id',$id);
		$resultado=$this->db->get();
		return $resultado->row();
			
	}

	public function lista_emisores_estado($est){

		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('emi_estado',$est);
		$this->db->order_by('emi_id');
		$resultado=$this->db->get();
		return $resultado->result();
			
	}


	public function lista_emisores_estado_2($est){

		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('emi_rep','1');
		$this->db->where('emi_estado',$est);
		$this->db->order_by('emi_id');
		$resultado=$this->db->get();
		return $resultado->result();
			
	}

	public function lista_emisores_empresa_estado($emp,$est){

		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social,c.cli_id" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('ep.emp_id',$emp);
		$this->db->where('emi_estado',$est);
		$this->db->order_by('emi_id');
		$resultado=$this->db->get();
		return $resultado->result();
			
	}

	public function update($id,$data){
		$this->db->where('emi_id',$id);
		return $this->db->update("erp_emisor",$data);
			
	}

	public function delete($id){
		$this->db->where('emi_id',$id);
		return $this->db->delete("erp_emisor");
			
	}

	public function lista_emisores_empresa($id){

		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('emi_estado','1');
		$this->db->where('em.emp_id',$id);
		$this->db->order_by('emi_cod_orden');
		$resultado=$this->db->get();
		return $resultado->result();
			
	}

	public function lista_emisores_empresa_2($id){

		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('emi_estado','1');
		$this->db->where('emi_rep','1');
		$this->db->where('em.emp_id',$id);
		$this->db->order_by('emi_cod_orden');
		$resultado=$this->db->get();
		return $resultado->result();
		//echo $this->db->last_query();
			
	}

	public function lista_emisor_cliente($id){

		$this->db->select("em.*,e.est_descripcion,ep.emp_nombre,ep.emp_identificacion, ep.emp_direccion, c.cli_raz_social" );
		$this->db->from('erp_emisor em');
		$this->db->join('erp_empresas ep','em.emp_id=ep.emp_id');
		$this->db->join('erp_estados e','e.est_id=em.emi_estado');
		$this->db->join('erp_i_cliente c','c.cli_id=em.emi_cod_cli');
		$this->db->where('em.emi_cod_cli',$id);
		$resultado=$this->db->get();
		return $resultado->row();
			
	}

	public function insert_ctas_asientos($id){
		$query = "insert into erp_ctas_asientos(cas_tipo_doc, pln_id, cas_descripcion, cas_estado, cas_orden, 
       emi_id, cas_orden_emi)
       (select cas_tipo_doc, pln_id, cas_descripcion, cas_estado, cas_orden, 
       $id, cas_orden_emi from erp_ctas_asientos where emi_id=6);";
		$resultado=$this->db->query($query);
		return $resultado;
	}

}

?>