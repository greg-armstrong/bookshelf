# Bookshelf
A simple PHP MVC framework and bookshelf app

## Setup
I have included a MySQL dump file in the root directory with some sample data to get you up and running.
You can input your database credentials in the Framework class' "init" function.

## Functionality to note:
- [URLs](#urls)
- [Add a book](#add-a-book)
- [Delete a book](#delete-a-book)
- [Mark as read](#mark-as-read)
- [Live search](#live-search)

### URLs
It works by splitting the url into a controller, an action and a parameter (unfortunately, it only works for a single parameter at the moment) as follows:
```
bookshelf.dev/[controller]/[action]/[parameter]
```
This allows us to quickly reference sections of the site without having to individually set up routes for every path.
A good example of this in action is on the book details pages. If we go to `bookshelf.dev/book/details/1`, we are sending a GET request to the book controller, using the details function and pulling back the details for the book with an ID of 1.

### Add A Book
The form to add a book on the "Bookshelf" page is submitted via AJAX and, if the row is successfully added to the database, the list of books is updated by jquery without a page refresh.

### Delete a book
Deleting a book works in much the same way as adding and, as with adding, the list of books is updated.

### Mark as read
The "Mark as read" checkbox on each book allows us to update the read status of a book without a page refresh.

### Live Search
The live search functionality works by checking the "title" and "author" tables of the books table in the database for the string that we are searching for. This search is done via a POST request on "keyup" and the returned array is formatted into an html table and displayed.
