
<?php

require_once('crud_empleado.php');
require_once('empleado.php');

$crud= new CrudEmpleado();
$empleados= new Empleados();

	// si el elemento insertar no viene nulo llama al crud e inserta un empleados
	if (isset($_POST['insertar'])) {
		$empleados->setNombre($_POST['nombre']);
		$empleados->setApellidos($_POST['apellidos']);
        $empleados->setEdad($_POST['edad']);
        $empleados->setDni($_POST['dni']);
        $empleados->setEmail($_POST['email']);
        $empleados->setOcupacion($_POST['ocupacion']);
		//llama a la función insertar definida en el crud
		$crud->insertar($empleados);
		header('Location: index.html');
	// si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el empleados
	}elseif(isset($_POST['actualizar'])){
		$empleados->setId($_POST['id']);
		$empleados->setNombre($_POST['nombre']);
		$empleados->setApellidos($_POST['apellidos']);
        $empleados->setEdad($_POST['edad']);
        $empleados->setDni($_POST['dni']);
        $empleados->setEmail($_POST['email']);
        $empleados->setOcupacion($_POST['ocupacion']);
		$crud->actualizar($empleados);
		header('Location: index.html');
	// si la variable accion enviada por GET es == 'e' llama al crud y elimina un empleados
	}elseif ($_GET['accion']=='e') {
		$crud->eliminar($_GET['id']);
		header('Location: index.html');		
	// si la variable accion enviada por GET es == 'a', envía a la página actualizar.php 
	}elseif($_GET['accion']=='a'){
		header('Location: actualizar.php');
	}
?>