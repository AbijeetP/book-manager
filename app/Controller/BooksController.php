<?php
App::uses('AppController', 'Controller');

class BooksController extends AppController
{

	public $components = array('Paginator');

	public $paginate = array(
		'limit'=> GRID_PAGE_LIMIT,
		'order' => array(
			'Book.name'=> 'asc'
		)
	);

	public
	function index()
	{
		$this->Paginator->settings = $this->paginate;
		$allBooks = $this->Paginator->paginate('Book');
		$this->set('books',$allBooks);
	}

	public
	function add()
	{
		if($this->request->is('post'))
		{
			$this->Book->create();
			if($this->Book->Save($this->request->data))
			{
				// TODO: Show proper erorr colors
				$this->Session->setFlash(__('The book has been saved.'),'default', array('class' => 'success'));
				return $this->redirect(array('action'=> 'index'));
			}
			$this->Session->setFlash(__('The book could not be saved.'));
		}
		$authors = $this->Book->Author->find('list');
		$genres  = $this->Book->Genre->find('list');

		$this->set(compact('authors','genres'));
	}

	public
	function edit($id = null)
	{
		if(!$id){
			throw new NotFoundException(__('Invalid Book'));
		}

		$book = $this->Book->findById($id);

		if(!$book)
		{
			throw new NotFoundException(__('Invalid Book'));
		}

		if($this->request->is(array('post', 'put')))
		{
			$this->Book->id = $id;
			if($this->Book->save($this->request->data))
			{
				$this->Session->setFlash(__('Book was updated'),'default', array('class' => 'success'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to update the book'));
		}
		$this->request->data = $book;
		$authors = $this->Book->Author->find('list');
		$genres  = $this->Book->Genre->find('list');

		$this->set(compact('authors','genres'));
	}

	public
	function delete($id = null)
	{
		if($this->request->is('get'))
		{
			throw new MethodNotAllowedException();
		}
		if($this->Book->delete($id))
		{
			$this->Session->setFlash(__('Book was successfully deleted.'),'default', array('class' => 'success'));
			return $this->redirect(array('action'=> 'index'));
		}
		$this->Session->setFlash('There was an error while deleting the book.');
	}
}
?>