<?php

	require_once ("/var/www/Smarty-2.6.6/libs/Smarty.class.php");
	$smarty = new Smarty();
	session_start();
	
	$smarty->assign ("naslov", "CRUD kontorla");
	$smarty->assign ("include1", '<script type="text/javascript" src="js/CRUD.js"></script>');
	
	require_once ('ajaxCRUD/preheader.php');
	include ('ajaxCRUD/ajaxCRUD.class.php');

	

	$opcije = array("casopis","casopis_pretplate","komentar","korisnik","kosarica","ocjena","pretplata","slika","status_korisnika","tip_korisnika");
	$smarty->assign("opcije",$opcije);

	if (isset($_POST['ok'])) {
		$t = $_POST['tb'];
		switch ($t) {
			case "casopis": $cru_korisnik = new ajaxCRUD("Časopis", "casopis", "id_casopis", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_casopis","ID");
							 $cru_korisnik->displayAs("korisnik_id_korisnik","Korisnik");
							 #$cru_korisnik->setLimit(10);
							 $cru_korisnik->showTable();
							 break;
			case "casopis_pretplate": $cru_korisnik = new ajaxCRUD("Časopis pretplate", "casopis_pretplate", "casopis_id_casopis", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("casopis_id_casopis","ID Časopis");
							 $cru_korisnik->displayAs("pretplata_id_pretplata","Id Pretplata");
							 $cru_korisnik->displayAs("kosarica_id_kosarica","Id Košarica");
							 $cru_korisnik->showTable();
							 break;
			case "komentar": $cru_korisnik = new ajaxCRUD("Komentar", "komentar", "id_komentar", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_komentar","ID");
							 $cru_korisnik->displayAs("pretplata_id_pretplata","Pretplata");
							 $cru_korisnik->displayAs("slika_id_slika","Slika");
							 $cru_korisnik->displayAs("casopis_id_casopis","Časopis");
							 $cru_korisnik->displayAs("korisnik_id_korisnik","Korisnik");
							 $cru_korisnik->showTable();
							 break;
			case "korisnik": $cru_korisnik = new ajaxCRUD("Korisnik", "korisnik", "id_korisnik", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_korisnik","ID");
							 $cru_korisnik->displayAs("status_korisnika_id_status","Status");
							 $cru_korisnik->displayAs("tip_korisnika_id_tip","Tip");
							 $cru_korisnik->showTable();
							 break;
			case "kosarica": $cru_korisnik = new ajaxCRUD("Košarica", "kosarica", "id_kosarica", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_kosarica","ID");
							 $cru_korisnik->displayAs("korisnik_id_korisnik","Korisnik");
							 $cru_korisnik->showTable();
							 break;
			case "ocjena": $cru_korisnik = new ajaxCRUD("Ocjena", "ocjena", "id_ocjena", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_ocjena","ID");
							 $cru_korisnik->displayAs("casopis_id_casopis","Časopis");
							 $cru_korisnik->displayAs("korisnik_id_korisnik","Korisnik");
							 $cru_korisnik->showTable();
							 break;
			case "pretplata": $cru_korisnik = new ajaxCRUD("Pretplata", "pretplata", "id_pretplata", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_pretplata","ID");
							 $cru_korisnik->showTable();
							 break;
			case "slika": $cru_korisnik = new ajaxCRUD("Slika", "slika", "id_slika", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_slika","ID");
							 $cru_korisnik->displayAs("casopis_id_casopis","Časopis");
							 $cru_korisnik->showTable();
							 break;
			case "status_korisnika": $cru_korisnik = new ajaxCRUD("Status korisnika", "status_korisnika", "id_status", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_status","ID");
							 $cru_korisnik->showTable();
							 break;
			case "tip_korisnika": $cru_korisnik = new ajaxCRUD("Tip korisnika", "tip_korisnika", "id_tip", "ajaxCRUD/");
							 $cru_korisnik->omitPrimaryKey();
							 $cru_korisnik->disallowDelete();
							 $cru_korisnik->displayAs("id_tip","ID");
							 $cru_korisnik->showTable();
							 break;
		}
	}

	$smarty->display("CRU.tpl");

?>