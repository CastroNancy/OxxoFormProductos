<?php
class Persona
{
	private $pdo;
    
    public $Idproducto;
    public $caducidad;
    public $precio;
    public $tamano;
    public $promocion;
    public $distribuidora;
	public $idSucursal;
	public $nombreProduc;
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Conexion::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM persona");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function getting($Idproducto)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM persona WHERE Idproducto = ?");
			          

			$stm->execute(array($Idproducto));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($Idproducto)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM persona WHERE Idproducto = ?");			          

			$stm->execute(array($Idproducto));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE persona SET 
						caducidad          = ?, 
						precio        = ?,
                        tamano        = ?,
						promocion            = ?, 
						distribuidora = ?,
						idSucursal = ?,
						nombreProduc = ?
				    WHERE Idproducto = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->caducidad, 
                        $data->precio,
                        $data->tamano,
                        $data->promocion,
                        $data->distribuidora,
						$data->idSucursal,
						$data->nombreProduc,
                        $data->Idproducto
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar($data)
	{
		try 
		{
		$sql = "INSERT INTO `persona` (caducidad,precio,tamano,promocion,distribuidora,idSucursal,nombreProduc) 
		        VALUES (?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->caducidad, 
                    $data->precio,
                    $data->tamano,
                    $data->promocion,
                    $data->distribuidora,
					$data->idSucursal,
					$data->nombreProduc
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>
