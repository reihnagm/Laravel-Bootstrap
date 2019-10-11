$(function() {
    $("#admin-user-datatable").DataTable({
        "processing": true,
        "serverSide": true,
        "responsive": true,
        "ajax": {
            "url": "/admin/datatable-user",
            "type": "GET"
        },
        "columns": [
               { "data": "id" },
               { "data": "nickname" },
               { "data": "fullname" },
               { "data": "email" },
               { "data": "gender" },
               { "data": "address"},
               { "data": "postcode"},
               { "data": "phone"},
               { "data": "birthplace"},
               { "data": "birthdate"}
           ]
    });
})
