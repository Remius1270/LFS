<?php
 $path = "/var/www/html/LFS";
include_once($path."/model/Model.php");

class Controller {
	public $model;

	public function __construct()
    {
        $this->model = new Model();

    }

	public function invoke()
	{
		if (!isset($_GET['teamID']))
		{
			// no special book is requested, we'll show a list of all available books
			$response = $this->model->getTeams();
			include '/var/www/html/LFS/view/teamList.php';
		}
		else if(isset($_GET['teamID']))
		{
			// show the requested book
			$response = $this->model->getTeam($_GET['teamID']);
			include '/var/www/html/LFS/view/team.php';
		}

	}
}

?>
