<?php namespace App\Models;

use CodeIgniter\Model;

class PhonebookModel extends Model
{
protected $table = 'contacts';

public function contacts () {
//The user field in the database is the key to differentiate between which contacts were created by which user in a hypathetical situation this app had more than one user.
$mail ="tawacodes@gmail.com";

$sql = "SELECT * FROM contacts WHERE user = $this->escape('$mail')";
$execute = $this->db->query($sql)->getResult();

return $execute;
}

//search
public function search () {
//fetch the search terms
$search = $_POST['search'];

$sql = $this->db->query("SELECT * FROM contacts WHERE name LIKE $this->escape('%$search%') OR email LIKE $this->escape('%$search%') OR phone LIKE $this->escape('%$search%') OR address LIKE $this->escape('%$search%') OR other LIKE $this->escape('%$search%') AND user = $this->escape('tawacodes@gmail.com')")->getResult();

return $sql;
}

//insert
public function create() {
$db      = \Config\Database::connect();
$builder = $db->table('contacts');

//fetch form fields
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$other = $_POST['other'];

//create array of data to be shortly inserted into the database
$data = [
'user' => 'tawacodes@gmail.com',
'name' => $_POST['name'],
'email' => $_POST['email'],
'phone' => $_POST['phone'],
'address' => $_POST['address'],
'other' => $_POST['other'],
];

$builder->insert($data);
}

//update
public function upd () {
$id = $_POST['id'];

//only show the record to be updated
return $this->db->query("SELECT * FROM contacts WHERE id = $id")->getRow();
}

public function edit () {
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$other = $_POST['other'];

$query = $this->db->query("update contacts SET name=$this->escape('$name'), email=$this->escape('$email'), phone=$this->escape('$phone'), address=$this->escape('$address'), other=$this->escape('$other') WHERE id = '$id'");
}

//delete
public function del () {
$id = $_POST['id'];

$sql = $this->db->query("DELETE FROM contacts WHERE id=$this->escape('$id')");
}

//end of class 
}