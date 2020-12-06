
<?php

require_once('conexion.php');

	class CrudEmpleado{
		
		public function __construct(){}

		
		public function insertar($empleados){
			$db=Database::conectar();
			$insert=$db->prepare('INSERT INTO empleados values(null, :nombre, :apellidos, :edad, :dni, :email, :ocupacion)');
			$insert->bindValue('nombre',$empleados->getNombre());
			$insert->bindValue('apellidos',$empleados->getApellidos());
            $insert->bindValue('edad',$empleados->getEdad());
            $insert->bindValue('dni',$empleados->getDni());
            $insert->bindValue('email',$empleados->getEmail());
            $insert->bindValue('ocupacion',$empleados->getOcupacion());
			$insert->execute();

		}

		
		public function mostrar(){
			$db=Database::conectar();
			$listaEmpleados=[];
			$select=$db->query('SELECT * FROM empleados');

			foreach($select->fetchAll() as $empleados){
				$myempleados= new Empleados();
				$myempleados->setId($empleados['Id']);
				$myempleados->setNombre($empleados['Nombre']);
				$myempleados->setApellidos($empleados['Apellidos']);
                $myempleados->setEdad($empleados['Edad']);
                $myempleados->setDni($empleados['DNI']);
                $myempleados->setEmail($empleados['Email']);
                $myempleados->setOcupacion($empleados['ocupación']);
				$listaEmpleados[]=$myempleados;
			}
			return $listaEmpleados;
		}

		public function eliminar($id){
			$db=Database::conectar();
			$eliminar=$db->prepare('DELETE FROM empleados WHERE Id=:id');
			$eliminar->bindValue('id',$id);
			$eliminar->execute();
		}


		public function obtenerEmpleados($id){
			$db=Database::conectar();
			$select=$db->prepare('SELECT * FROM empleados WHERE Id=:id');
			$select->bindValue('id',$id);
			$select->execute();
			$empleados=$select->fetch();
			$myempleados= new Empleados();
			$myempleados->setId($empleados['Id']);
			$myempleados->setNombre($empleados['Nombre']);
			$myempleados->setApellidos($empleados['Apellidos']);
            $myempleados->setEdad($empleados['Edad']);
            $myempleados->setDni($empleados['DNI']);
            $myempleados->setEmail($empleados['Email']);
            $myempleados->setOcupacion($empleados['ocupación']);
			return $empleados;
		}

	
		public function actualizar($empleados){
			$db=Database::conectar();
			$actualizar=$db->prepare('UPDATE empleados SET Nombre=:nombre, Apellidos=:apellidos, Edad=:edad, DNI=:dni, Email=:email, ocupación=:ocupacion WHERE Id=:id');
			$actualizar->bindValue('id',$empleados->getId());
			$actualizar->bindValue('nombre',$empleados->getNombre());
			$actualizar->bindValue('apellidos',$empleados->getApellidos());
            $actualizar->bindValue('edad',$empleados->getEdad());
            $actualizar->bindValue('dni',$empleados->getDni());
            $actualizar->bindValue('email',$empleados->getEmail());
            $actualizar->bindValue('ocupacion',$empleados->getOcupacion());
			$actualizar->execute();
		}
	}
?>