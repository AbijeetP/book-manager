<?php
App::uses('AppController', 'Controller');

class GenresController extends AppController {
	public function index() {
		$this->set('genres', $this->Genre->find('all', array('order' => array('Genre.name' => 'asc'))));
	}

	public function add() {
		if($this->request->is('post')) {
			$this->Genre->create();
			if($this->Genre->Save($this->request->data)) {
				// TODO: Show proper erorr colors
				$this->Session->setFlash(__('The genre has been saved.','flash_success'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('The genre could not be saved.', 'flash_error'));
		}
	}

	public function edit($id=null) {
		if(!$id) {
			throw new NotFoundException(__('Invalid Genre'));
		}
		$genre = $this->Genre->findById($id);
		if(!$genre){
			throw new NotFoundException(__('Invalid Genre'));
		}
		if($this->request->is(array('post', 'put'))) {
			$this->Genre->id = $id;
			if($this->Genre->save($this->request->data)) {
				$this->Session->setFlash('Author was updated');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update the post'));
		}
	}

	public function delete($id=null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if($this->Genre->hasBooks()) {
			$this->Session->setFlash('Genre has related books in the database. Please delete those first.');
		}
		else {
			if($this->Genre->delete($id)) {
				$this->Session->setFlash('Genre was successfully deleted.');				
			}
			else {
				$this->Session->setFlash('Genre could not be deleted.');
			}
		}
		return $this->redirect(array('action' => 'index'));

	}
}
?>