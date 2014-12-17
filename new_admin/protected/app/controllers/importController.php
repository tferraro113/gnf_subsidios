<?php

class ImportController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function archivos (){


		/*$value = str_contains('This is Masc name', 'asculino');

		dd($value);
		*/
		$archivos = Archivos::where('estado' , '=', 'Pendiente')->get();

		foreach ($archivos as $archivo) {
			# code...
				$url = $archivo->archivo;

				$objPHPExcel = PHPExcel_IOFactory::load("uploads/archivos/$url");
			
				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
					    $worksheetTitle     = $worksheet->getTitle();
					    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
					    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
					    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
					    $nrColumns = ord($highestColumn) - 64;
					   
					    for ($row = 2; $row <= $highestRow; ++ $row) {
					    	$contacto = new Contactos;

					        $cell = $worksheet->getCellByColumnAndRow(0, $row);
				            $val = $cell->getValue();
				            $contacto->nombre = $val;

			                $cell = $worksheet->getCellByColumnAndRow(1, $row);
				            $val = $cell->getValue();
				            $contacto->apellido = $val;

				            $cell = $worksheet->getCellByColumnAndRow(2, $row);
				            $val = $cell->getValue();
				            $contacto->sexo = $val;

				            $cell = $worksheet->getCellByColumnAndRow(3, $row);
				            $val = $cell->getValue();
				            $contacto->fecha_nacimiento = $val;

				            $cell = $worksheet->getCellByColumnAndRow(4, $row);
				            $val = $cell->getValue();
				            $contacto->tipo_documento = $val;

				            $cell = $worksheet->getCellByColumnAndRow(5, $row);
				            $val = $cell->getValue();
				            $contacto->numero = $val;

				            $cell = $worksheet->getCellByColumnAndRow(6, $row);
				            $val = $cell->getValue();
				            $contacto->telefono = $val;

				            $cell = $worksheet->getCellByColumnAndRow(7, $row);
				            $val = $cell->getValue();
				            $contacto->mail = $val;

				            $cell = $worksheet->getCellByColumnAndRow(8, $row);
				            $val = $cell->getValue();
				            $contacto->municipio_id = $val;

				            $cell = $worksheet->getCellByColumnAndRow(9, $row);
				            $val = $cell->getValue();
				            $contacto->localidad_id = $val;

				            $cell = $worksheet->getCellByColumnAndRow(10, $row);
				            $val = $cell->getValue();
				            $contacto->calle = $val;

				            $cell = $worksheet->getCellByColumnAndRow(11, $row);
				            $val = $cell->getValue();
				            $contacto->numero_calle = $val;

				            $cell = $worksheet->getCellByColumnAndRow(12, $row);
				            $val = $cell->getValue();
				            $contacto->complemento = $val;

				            $cell = $worksheet->getCellByColumnAndRow(13, $row);
				            $val = $cell->getValue();
				            $contacto->entre_calles = $val;

				            $cell = $worksheet->getCellByColumnAndRow(14, $row);
				            $val = $cell->getValue();
				            $contacto->instalacion_coccion = $val;

				            $cell = $worksheet->getCellByColumnAndRow(15, $row);
				            $val = $cell->getValue();
				            $contacto->instalacion_aguaCaliente = $val;

				            $cell = $worksheet->getCellByColumnAndRow(16, $row);
				            $val = $cell->getValue();
				            $contacto->instalacion_calefaccion = $val;

				            $cell = $worksheet->getCellByColumnAndRow(17, $row);
				            $val = $cell->getValue();
				            $contacto->posee_gas = $val;

				            $cell = $worksheet->getCellByColumnAndRow(18, $row);
				            $val = $cell->getValue();

				            $contacto->estado = $val;

				            $contacto->created_by =  6;


				            $now = new DateTime('NOW');

				            $contacto->created = $now;
				            /*
					        for ($col = 0; $col < $highestColumnIndex; ++ $col) {
					            $dataType = PHPExcel_Cell_DataType::dataTypeForValue($val);
					            echo '<td>' . $val . '<br>(Typ ' . $dataType . ')</td>';
					        } */
					       
					       $contacto->save();
					    }
				}

				$archivo->estado = "Importado";
				$archivo->save();

		}

		 return Redirect::to('archivos');

	}


}
