<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tables - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"></div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url() ?>login/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="<?= base_url() ?>instansi">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Instansi
                        </a>
                        <a class="nav-link" href="<?= base_url() ?>login/logout">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Instansi</h1>

                    <div class="mt-2 mb-2">
                        <form onsubmit="cari(); return false">
                            <div class="mb-3 row">
                                <label for="cari_instansi" class="col-sm-2 col-form-label">Instansi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="cari_instansi">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Aksi</th>
                                        <th>Nama Instansi</th>
                                        <th>Deskripsi</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTable">
                                    <?php
                                    $no = 1;
                                    foreach ($instansi as $ins) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <button onclick="edit_instansi(<?= $ins->id_instansi ?>)" class="btn btn-warning btn-sm">Edit</button>
                                                <a href="<?= base_url(); ?>instansi/hapus/<?= $ins->id_instansi ?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                            <td><?= $ins->nama_instansi; ?></td>
                                            <td><?= $ins->deskripsi; ?></td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Tambah Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url() ?>instansi/tambah" method="post">
                            <div class="modal-body">
                                <div class="mb-3 row">
                                    <label for="tambah" class="col-sm-2 col-form-label">Instansi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_intansi" class="form-control" id="tambah">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="editInstansi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url() ?>instansi/update" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id_ins" id="id_inst_edit">
                                <div class="mb-3 row">
                                    <label for="namaEdit" class="col-sm-2 col-form-label">Instansi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_intansi" class="form-control" id="namaEdit">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="deskripsiEdit" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="deskripsi" id="deskripsiEdit" rows="3"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>assets/js/datatables-simple-demo.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    <script>
        function edit_instansi(id) {
            $.ajax({
                url: `http://localhost/cobaci3/instansi/edit/` + id,
                success: function(data) {
                    console.log(data)
                    document.getElementById("namaEdit").value = data.nama_instansi;
                    document.getElementById("deskripsiEdit").value = data.deskripsi;
                    document.getElementById("id_inst_edit").value = data.id_instansi;
                    $("#editInstansi").modal('show')
                }
            })
        }

        function cari() {
            cari = document.getElementById("cari_instansi").value
            $.ajax({
                type: "POST",
                data: {
                    cari: cari
                },
                url: `http://localhost/cobaci3/instansi/cari`,
                success: function(data) {
                    if (data.length == 0) {
                        console.log('kosong');
                    }

                    if (data.length > 0) {

                        text = '';
                        for (let i = 0; i < data.length; i++) {
                            text += `
                                            <tr>
                                                <td>${i + 1}</td>
                                                <td>
                                                    <button onclick="edit_instansi(${data[i].id_instansi})" class="btn btn-warning btn-sm">Edit</button>
                                                    <a href="<?= base_url(); ?>instansi/hapus/${data[i].id_instansi}" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                                <td>${data[i].nama_instansi}</td>
                                                <td>${data[i].deskripsi}</td>
                                            </tr>
                            `;

                        }
                        $('#bodyTable').html(text);
                    }
                }
            });
            document.getElementById("cari_instansi").value = ''
            event.preventDefault();
        }
    </script>
</body>

</html>