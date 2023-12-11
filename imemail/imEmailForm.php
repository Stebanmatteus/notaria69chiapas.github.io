<?php
if(substr(basename($_SERVER['PHP_SELF']), 0, 11) == "imEmailForm") {
	include '../res/x5engine.php';
	$form = new ImForm();
	$form->setField('Nombre:', $_POST['imObjectForm_9_1'], '', false);
	$form->setField('Teléfono:', $_POST['imObjectForm_9_2'], '', false);
	$form->setField('E-Mail', $_POST['imObjectForm_9_3'], '', false);
	$form->setField('Favor de indicar el motivo de su correo.', $_POST['imObjectForm_9_4'], '', false);
	$fileResult = $form->setFile('Anexar documento en caso de ser requerido', $_FILES['imObjectForm_9_5'], $imSettings['general']['public_folder'], '', '');
	if ($fileResult == -1) { die(imPrintError('Cannot send file: Anexar documento en caso de ser requerido')); }
	if ($fileResult < -1) { die(imPrintError('"Anexar documento en caso de ser requerido" formato incorrecto.')); }

	if(@$_POST['action'] != 'check_answer') {
		if(!isset($_POST['imJsCheck']) || $_POST['imJsCheck'] != 'jsactive' || (isset($_POST['imSpProt']) && $_POST['imSpProt'] != ""))
			die(imPrintJsError());
		$form->mailToOwner($_POST['imObjectForm_9_3'] != "" ? $_POST['imObjectForm_9_3'] : 'notaria69chiapas@hotmail.com', 'notaria69chiapas@hotmail.com', 'Contacto', 'Contacto a traves de pagina WEB.', true);
		$form->mailToCustomer('notaria69chiapas@hotmail.com', $_POST['imObjectForm_9_3'], 'Recibido Notaria 69', 'Hemos recibido su mensaje.

Gracias por su prferencia.

Notaria 69 Palenque Chiapas
Lic. Alejandor Parada Seer
Notario', true);
		@header('Location: ../index.html');
		exit();
	} else {
		echo $form->checkAnswer(@$_POST['id'], @$_POST['answer']) ? 1 : 0;
	}
}

// End of file