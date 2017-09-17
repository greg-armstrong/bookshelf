<?php

class bookModel extends model
{
    public function getAllBooks(){
        $this->database->query("SELECT * FROM books");
        $bookArr = $this->database->resultSet();

        return $bookArr;
    }

    public function addBook(){

        $title = $_POST['bookTitle'];
        $author = $_POST['bookAuthor'];
        $description = $_POST['bookDescription'];

        $this->database->query("INSERT INTO books (title, author, read_status, description) VALUES (:title, :author, :readStatus, :description)");
        $this->database->bind(':title', $title);
        $this->database->bind(':author', $author);
        $this->database->bind(':readStatus', 0);
        $this->database->bind(':description', $description);

        $this->database->execute();
        $id = $this->database->lastInsertedId();
        $returnArr = [
            "id" => $id,
            "title" => $title,
            "author" => $author
        ];

        echo json_encode($returnArr);
    }

    public function deleteBook(){
        $id = (int)$_POST['id'];

        $this->database->query("DELETE FROM books WHERE id = :bookId");
        $this->database->bind(':bookId', $id);
        $this->database->execute();

        echo $id;
    }

    /**
     * Change the status of a book to either "read" or "unread"
     */
    public function updateReadStatus(){
        $id = (int)$_POST['id'];
        $state = (int)$_POST['state'];

        $this->database->query("UPDATE books SET read_status = :readStatus WHERE id = :bookId");
        $this->database->bind(':readStatus', $state);
        $this->database->bind(':bookId', $id);

        $this->database->execute();
    }

    public function getBookDetails($id){
        $this->database->query("SELECT * FROM books WHERE id = :bookId");
        $this->database->bind(':bookId', $id);
        $detailsArr = $this->database->resultSet();

        return $detailsArr;
    }

    /**
     * Check if any book titles or orders currently have the text typed in the search field
     */
    public function search(){
        $string = $_POST['string'];
        $this->database->query("SELECT title, author, id FROM books WHERE (title LIKE :string) OR (author LIKE :string)");
        $this->database->bind(':string', '%'.$string.'%');

        $resultsArr = $this->database->resultSet();

        echo json_encode($resultsArr);
    }
}