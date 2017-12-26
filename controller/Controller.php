<?php
include_once("/var/www/html/LFS/model/Model.php");

class Controller {
	public $model;

	public function __construct()
    {
        $this->model = new Model();

    }

	public function invoke()
	{
		if (!isset($_GET['team']))
		{
			// no special book is requested, we'll show a list of all available books
			$response = $this->model->getTeams();
			include '/var/www/html/LFS/view/teamList.php';
		}
		else
		{
			// show the requested book
			$book = $this->model->getTeam($_GET['team']);
			include '/var/www/html/LFS/view/viewTeam.php';
		}
	}
}

?>
