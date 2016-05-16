<?php
require_once '../core/init.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';

require_once '../classes/Config.php';
require_once '../classes/User.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/DatabaseObject.php';
require_once '../classes/Input.php';
require_once '../classes/Redirect.php';
if (Session::exists('subscriberID')) {
	$id = Session::get('subscriberID');
} else {
	Redirect::to('../index.php');
}


include_once '../layouts/header.php';




if(!$id = Input::get('id')) {
	Redirect::to('index.php');
} else {
	$user = new User($id);

	if(!$user->exists()) {
		Redirect::to(404);
	} else {
		$data = $user->data();
	}
	?>

	<h3 style="color: cyan"><?php echo escape($data->name); ?></h3>
	<div style="font-size: 11pt;padding-bottom: 5px;">Full name: <?php echo escape($data->name); ?></div>
	<div style="font-size: 11pt;padding-bottom: 5px;">Email Address: <?php echo escape($data->email); ?></div>

	<div style="font-size: 11pt;padding-bottom: 5px;">Last Login: <?php echo escape($data->lastlogin); ?></div>

<?php
}


?>



<?php


include_once '../layouts/footer.php'

?>