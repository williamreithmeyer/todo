var ajaxURL = "/todo/ajax.php";


$(document).ready(function (e) {

    // todo
    $("#add_todo_list_create").on("click", function () {
        $.ajax({
            url: ajaxURL,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "createList",
                name: $("#add_todo_list_name").val()
            },
            success: function (data) {
                window.location.href = "/todo/" + data["file"];
            }
        });
    });

    $("#list_title_input").on("change", function() {
        $.ajax({
            url: ajaxURL,
            type: "POST",
            dataType: "JSON",
            data: {
                action: "updateList",
                listID: $("#list_title_input").attr("data-list"),
                name: $("#list_title_input").val()
            },
            success: function (data) {
                // TODO add "Updated" toast
                if (data["success"]){

                }
            }
        });
    });

});
