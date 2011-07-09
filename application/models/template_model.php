<?php

	/* 
	 * @description Model for template library
	 * @author Brayan L. Rastelli
	*/
	class Template_model extends CI_Model {
	
		/*
		 * @description get all the lists of templates available.
		 * @author Brayan L. Rastelli
		 * @params Array $params - optional
		*/	
		public function getTemplates( $params = array() ) {
		
			if ( !empty ( $params ) ) {
			
				foreach( $params as $key => $value ) {
				
					$this->db->where($key, $value);
				
				}	
				
			}
			
			return $this->db->get('template');
		
		}
		
		public function getUserTemplate( $id ) {
		
			$this->db->select('template_id');
			
			$this->db->where( 'user_id' , $id);

			$tpl_id = $this->db->get('user')->row()->template_id;
			
			return $this->getTemplates( array( 'template_id' => $tpl_id ) );
		
		}
		
		public function setTemplate ($id,$user) {
		
		
			$data = array ( 'template_id' 	=> $id );
					 
			$this->db->where( 'user_id' , $user )
					 ->update( 'user' , $data );
					 
			return $this->db->affected_rows();
		
		
		}
		
		public function getDefault() {
		
			$this->db->where('default',1);

			return$this->db->get('template')->row();
		
		}
	
	}