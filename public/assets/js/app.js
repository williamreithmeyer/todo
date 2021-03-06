var ajaxURL = "/todo/ajax.php";


$(document).ready(function (e) {

    // todo
    $("#add_todo_list_create").on("click", function () {
        $.ajax({
            url: ajaxURL,
            type: "POST",
            dataType: "JSON",
            data: {
                name: $("#add_todo_list_name").val()
            },
            success: function (data) {
                window.location.href = "/todo/" + data["file"];
            }
        });
    });

});