<?php include VIEW_PATH.'layouts/header.php'; ?>
<div class="row">
    <div class="col-12">
        <h1>Bookshelf</h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <table id="bookListTable" class="table">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Read</th>
                <th>Delete</th>
            </tr>

        <?php foreach ($booksArr as $book): ?>
            <tr id="book-row-<?php echo $book['id']?>">
                <td><a href="/book/details/<?php echo $book['id']?>"><?php echo $book['title']?></a></td>
                <td><?php echo $book['author']?></td>
                <td><input type="checkbox" class="read-checkbox" data-book-id="<?php echo $book['id']?>" <?php if($book['read_status']){echo "checked";}?>></td>
                <td>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true" class="delete-button" data-book-id="<?php echo $book['id']?>">&times;</span>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </table>
        <hr>
        <h3>Add a book</h3>
        <form id="addBookForm">
            <div class="form-group">
                <input type="text" class="form-control" name="bookTitle" id="bookTitle" placeholder="Title">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="bookAuthor" id="bookAuthor" placeholder="Author">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="bookDescription" id="description" rows="3" placeholder="Write a short decription..."></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php include VIEW_PATH.'layouts/footer.php'; ?>