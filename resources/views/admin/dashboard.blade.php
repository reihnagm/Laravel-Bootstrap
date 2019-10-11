<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet" type="text/css">
</head>

<body>

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href={{ route('admin.dashboard') }}>{{auth()->user()->fullname}}</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <div id="wrapper">
        <ul class="sidebar navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span></span>
                </a>
            </li>
        </ul>
        <div id="content-wrapper">
            <div class="container-fluid">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0" id="admin-user-datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama Panggilan</th>
                                        <th>Nama Lengkap</th>
                                        <th>Surat Elektronik</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Kode Pos</th>
                                        <th>Nomor Telepon</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto"></div>
                </div>
            </footer>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/datatable.all.users.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
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
    </script>

</body>

</html>
