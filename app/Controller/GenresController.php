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
				$this->Session->setFlash(__('The genre has been saved.'),'default', array('class' => 'success'));
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
				$this->Session->setFlash(__('Genre was updated'),'default', array('class' => 'success'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('The genre could not be updated.'));
		}
	}

	public function delete($id=null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		if($this->Genre->hasBooks($id)) {
			$this->Session->setFlash(__('Genre has related books. Please delete those first.'));
		}
		else {
			if($this->Genre->delete($id)) {
				$this->Session->setFlash(__('Genre was successfully deleted.'),'default', array('class' => 'success'));				
			}
			else {
				$this->Session->setFlash(__('Genre could not be deleted.'));
			}
		}
		return $this->redirect(array('action' => 'index'));

	}
}
?>