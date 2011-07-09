<?php
/**
 * Template Library for Codeigniter
 * @author Brayan Laurindo Rastelli
 */
	class Template {
		
		/**
		 * @var Object
		*/
		private $CI;
		
		/**
		 * @var string
		 */
		public $path;
		
		/**
		 * @var string
		*/
		public $template;
		
		/**
		 * @var string
		 */
		public $name;
	
		/**
		 * Loads the CI Object and the template_model
		 */
		public function __construct () {
		
			$this->CI = get_instance();
			$this->CI->load->model('template_model');
			
		}
		
		/**
		 * Set the template for the user.
		 * @params	int $id
		 * @params	int $user
		 * @author Brayan L. Rastelli
		 */
		public function setTemplate( $id, $user ) {
		
			if ( empty($id) || empty($user) ) {

				return false;

			}
			
			if ( $this->CI->template_model->setTemplate($id,$user) == 0 )
				return false;
			
			return $this->getTemplate($user);
		
		}
		
		/**
		 * Get all the information of the current template of the user.
		 * @params int $user
		 * @author Brayan L. Rastelli
		 */
		public function getTemplate ($user) {
		
			$dados = $this->CI->template_model->getUserTemplate( $user )->row();
			
			if( !$dados )
				$dados = $this->CI->template_model->getDefault();
				
			$this->path 	= base_url() . 'templates/' . $dados->path . '/';
			$this->template = 'templates/' . $dados->path . '/index.php';
			$this->name 	= $dados->name;
		
		}
	
	}