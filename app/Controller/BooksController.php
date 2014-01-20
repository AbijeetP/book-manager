<?php
App::uses('AppController', 'Controller');

class BooksController extends AppController {
	public function index(){
		$this->set('books', $this->Book->find('all', array('order' => array('Author.name' => 'asc'))));
	}
	
	public function add() {
		if($this->request->is('post')) {
			$this->Book->create();
			if($this->Book->Save($this->request->data)) {
				// TODO: Show proper erorr colors
				$this->Session->setFlash(__('The book has been saved.','flash_success'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('The book could not be saved.','flash_success'));
		}
		$authors = $this->Book->Author->find('list');
		$genres = $this->Book->Genre->find('list');
		
		$this->set(compact('authors','genres'));
	}

	public function edit($id=null) {
		if(!$id)
		{
			throw new NotFoundException('Invalid Book');
		}
		
		$book = $this->Book->findById($id);
		
		if(!$book) {
			throw new NotFoundException(__('Invalid Book'));
		}
		
		if($this->request->is(array('post', 'put'))) {
			$this->Book->id = $id;
			if($this->Book->save($this->request->data)) {
				$this->Session->setFlash('Book was updated');
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update the book'));
		}
		$this->request->data = $book;
		$authors = $this->Book->Author->find('list');
		$genres = $this->Book->Genre->find('list');
		
		$this->set(compact('authors','genres'));
	}

	public function delete($id=null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if($this->Book->delete($id)) {
			$this->Session->setFlash('Book was successfully deleted.');
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('There was an error while deleting the book.');
	}
}
?>