<?php namespace App\Controllers;

use App\Models\PhonebookModel;
use CodeIgniter\Controller;

class Phonebook extends BaseController
{
public function index(){
//create an object of the model to be able to pass the sql operations done in the model to the controller, and finally to the view
$model = new PhonebookModel();

//create an array of the select statement, so the view will be able to use the array key to access output from the sql select query
$data = [
'output' => $model->contacts()
];

echo view('navigation');
echo view('contacts', $data);
echo view('footer');
}

public function searchresults () {
$model = new PhonebookModel();

$data = [
'output' => $model->search()
];

//Because the layout of the view is exactly the same, we reuse the same view used in index
echo view('navigation');
echo view('contacts', $data);
echo view('footer');
}

//create
public function create () {
//show the form to create new contacts
echo view('navigation');
echo view('create');
echo view('footer');
$model = new PhonebookModel();

//if the submit button has been pressed, create the contact then redirect to the contacts page
if (isset($_POST['sub'])) {
$model->create();
return redirect()->to(base_url('Phonebook/index'));
}
}

//update
public function update () {
$model = new PhonebookModel();

$data = [
'fields' => $model->upd()
];

echo view('update', $data);
}

//edit
public function edit() {
$model = new PhonebookModel();

if (isset($_POST['upd'])) {
$finish = $model->edit();
}
if ($finish = TRUE) {
echo "Update successful";
return redirect()->to(base_url('Phonebook/index'));
}
}

//delete
public function del () {
$model = new PhonebookModel();

if (isset($_POST['del'])) {
$erase = $model->del();
}

if ($erase = TRUE) {
return redirect()->to('index');
}
}

//end of class
}