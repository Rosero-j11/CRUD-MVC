<?php
require_once './models/Contact.php';
require_once './config/database.php';

class ContactController {
    private $db;
    private $contact;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->contact = new Contact($this->db);
    }

    public function index() {
        $contacts = $this->contact->getContacts();
        require_once './views/index.php';
    }

    public function show($id) {
        $contact = $this->contact->getContact($id);
        require_once './views/show.php';
    }

    public function create() {
        require_once './views/create.php';
    }

    public function store($data) {
        $this->contact->nombre = $data['nombre'];
        $this->contact->telefono = $data['telefono'];
        $this->contact->email = $data['email'];
        $this->contact->direccion = $data['direccion'];
        $this->contact->createContact();
        header("Location: index.php");
    }

    public function edit($id) {
        $contact = $this->contact->getContact($id);
        require_once './views/edit.php';
    }

    public function update($data) {
        $this->contact->id = $data['id'];
        $this->contact->nombre = $data['nombre'];
        $this->contact->telefono = $data['telefono'];
        $this->contact->email = $data['email'];
        $this->contact->direccion = $data['direccion'];
        $this->contact->updateContact();
        header("Location: index.php");
    }

    public function delete($id) {
        $this->contact->id = $id;
        $this->contact->deleteContact();
        header("Location: index.php");
    }
}
?>
