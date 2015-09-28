<?php

// Inclusion del Modelo Principal
	REQUIRE_ONCE('model/main_model.php');

// Inclusion de la Vista Principal
	REQUIRE_ONCE('view/main_view.php');

// Definicion del Controlador Principal
	class MainController{
		private $model;
		private $view;

		function __construct(){
			$this->model = new MainModel();
			$this->view = new MainView();
		}

	// Carga el Head, Nav y Footer
		function index(){
			$this->view->showIndex();
		}

	// Carga la Seccion de Inicio
		function inicio(){
			$this->view->showInicio($this->model->leerNoticias());
		}

	// Carga la Seccion de Inicio con la Noticia Indicada
		function noticia(){
			$this->view->showNoticia($this->model->leerNoticia($_REQUEST['id']));
		}

	// Carga la Seccion de Actividades
		function actividades(){
			$this->view->showActividades();
		}

	// Carga la Seccion de Galeria
		function galeria(){
			$this->view->showGaleria();
		}

	// Carga la Seccion de Contacto
		function contacto(){
			$this->view->showContacto();
		}

	// Carga la Seccion del Gestor de Administrador
		function gestorAdmin(){
			$this->view->showGestorAdmin($this->model->leerCategorias(), $this->model->leerNoticias());
		}

	// Crea una Nueva Categoria de Noticias
		function agregarCategoria(){
			if(isset($_REQUEST['categoria'])){
				$this->model->agregarCategoria($_REQUEST['categoria']);
				header('Location: /');
			}
		}

	// Crea una Nueva Noticia
		function agregarNoticia(){
			if(isset($_REQUEST['id_categoria']) &&
			   isset($_REQUEST['titulo']) &&
			   isset($_REQUEST['contenido'])){
				$this->model->agregarNoticia($_REQUEST['id_categoria'], $_REQUEST['titulo'], $_REQUEST['contenido']);
				header('Location: /');
			}
		}

	}
?>