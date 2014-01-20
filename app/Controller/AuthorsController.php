<?php
App::uses('AppController', 'Controller');

class AuthorsController extends AppController
{
	public function index() {
		$this->set('authors', $this->Author->find('all', array('order' => array('Author.name' => 'asc'))));
	}

	public function add() {
		if($this->request->is('post')) {
			$this->Author->create();
			if($this->Author->Save($this->request->data)) {
				// TODO: Show proper erorr colors
				$this->Session->setFlash(__('The author has been saved.','flash_success'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('The author could not be saved.', 'flash_error'));
		}
	}
	
	public function edit($id=null) {
		if(!$id) {
			throw new NotFoundException(__('Invalid Post'));
		}
		
		$author = $this->Author->findById($id);
		
		if(!$author) {
			throw new NotFoundException(__('Invalid Post'));
		}
		
		// POST/ PUT means we are saving the data
		if($this->request->is(array('post', 'put'))) {
			$this->Author->id = $id;
			if($this->Author->save($this->request->data)) {
				$this->Session->setFlash('Author was updated');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update the post'));
		}
		
		// Sending the values back for the views
		if(!$this->request->data) {
			$this->request->data = $author;
		}
	}

	public function delete($id=null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if($this->Author->hasBooks($id)) {
			$this->Session->setFlash('Author has books in the database. Please delete those first.');
			return $this->redirect(array('action' => 'index'));
		}
		else {
			if($this->Author->delete($id)) {
				$this->Session->setFlash('Author was successfully deleted.');
				return $this->redirect(array('action' => 'index'));
			}
		}		
	}
}
?>