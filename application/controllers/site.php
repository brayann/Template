<?php

	class Site extends CI_Controller {
	
		public $dados;
	
		public function __construct() {
		
			parent::__construct();
			
			$this->load->library('template');
			$this->load->model('template_model');
			
			$this->template->getTemplate(1); // @todo make the parameter dynamic.
			
		}
		
		public function select_template() {
		
			$this->dados['titulo'] = 'Select your template';
			$this->dados['pagina'] = 'show_templates';
			$this->dados['theme']  = $this->template->name;
			$this->dados['path']  = $this->template->path;
			
			$this->dados['templates'] = $this->template_model->getTemplates();
			
			$this->load->view( $this->template->template, $this->dados);
			
		
		}
		
		public function change_template() {
		
			$this->template->setTemplate( $this->input->post('template_id'), 1 );
			redirect('site');
		
		}
		
		public function index () {
		
			$this->dados['titulo'] = 'Bem vindo | Welcome';
			$this->dados['pagina'] = 'welcome_page';
			$this->dados['theme']  = $this->template->name;
			$this->dados['path']  = $this->template->path;
			
			$this->load->view( $this->template->template, $this->dados);
		
		}
	
	}