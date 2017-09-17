<?php

class bookController extends controller
{

    function __construct()
    {
        $this->view = new View();
        $this->model = new bookModel();
    }

    /**
     * Books overview page
     */
    public function index()
    {
        $booksArr = $this->model->getAllBooks();
        $this->view->render('bookView.php', ["booksArr" => $booksArr]);
    }

    /**
     * Change the status of a book to either "read" or "unread"
     */
    public function updateReadStatus(){
        $this->model->updateReadStatus();
    }

    public function addBook(){
        $this->model->addBook();
    }

    public function deleteBook(){
        $this->model->deleteBook();
    }

    /**
     * Get the details of a single book and output the books "details page"
     */
    public function details($id)
    {
        $detailsArr = $this->model->getBookDetails($id);
        $detailsArr = $detailsArr[0];

        $this->view->render('bookDetailsView.php', ["detailsArr" => $detailsArr]);
    }

    /**
     * This is called via AJAX to search authors and book titles
     */
    public function search(){
        $this->model->search();
    }
}