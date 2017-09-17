
$(document).ready(function() {
    $(".read-checkbox").change(function () {
        var isChecked = $(this).is(":checked") ? 1 : 0;
        $.ajax({
            url: '/book/updatereadstatus/',
            type: 'POST',
            data: {id: $(this).attr("data-book-id"), state: isChecked}
        });
    });

    $("#addBookForm").submit(function (e) {
        $.ajax({
            type: "POST",
            url: "/book/addBook",
            data: $("#addBookForm").serialize(),
            success: function(data)
            {
                data = $.parseJSON(data);
                var newRow = $('<tr id="book-row-'+data.id+'"><td><a href="/book/details/'+data.id+'">'+data.title+'</a></td><td>'+data.author+'</td><td><input type="checkbox" class="read-checkbox" data-book-id="'+data.id+'" ></td><td><button type="button" class="close" aria-label="Close" data-book-id="'+data.id+'"><span aria-hidden="true">&times;</span></button></td></tr>')
                    .hide()
                    .fadeIn(500);
                $("#bookListTable").append(newRow);
            }
        });

        e.preventDefault();
    });

    $(".delete-button").click(function () {
        $.ajax({
            type: "POST",
            url: "/book/deleteBook",
            data: {id: $(this).attr("data-book-id")},
            success: function(id)
            {
                $("#book-row-"+id).fadeOut(500, function() { $("#book-row-"+id).remove(); });
            }
        });
    });

    $('#search-form').on("keyup", function(){
        /* Get input value on change */
        var inputVal = $(this).val();

        $.ajax({
            url: '/book/search/',
            type: 'POST',
            data: {string: inputVal},
            success: function(data){
                console.log(data);
                data = $.parseJSON(data);

                var string = "<table class='table'>";
                $.each(data, function(){
                    string += "<tr><td><a href='/book/details/"+this.id+"'>"+this.title+"</a></td><td>"+this.author+"</td></tr>";
                });
                string += "</table>";
                $("#search-results").html(string);
            }
        });
    });

    $("body").click(function (){
        $("#search-results").empty();
    });

});


