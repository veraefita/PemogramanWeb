<?php
require_once __DIR__ . '/../lib/Connection.php';
function getKategori()
{
    global $db;
    $query = "SELECT * FROM m_kategori ORDER BY kategori_nama ASC";
    $result = sqlsrv_query($db, $query);
    $kategori = [];
    if ($result) {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $kategori[] = $row;
        }
    } else {
        die(print_r(sqlsrv_errors(), true));
    }
    return $kategori;
}
$kategori = getKategori();
?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Buku</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Buku</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Buku</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-md btn-primary" onclick="tambahData()">
                    Tambah
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="table-data">
                <thead>
                    <tr>
                        <th style="width: 5%;">No</th>
                        <th style="width: 5%;">Kategori Buku</th>
                        <th style="width: 10%;">Kode Buku</th>
                        <th style="width: 15%;">Nama Buku</th>
                        <th style="width: 5%;">Jumlah</th>
                        <th style="width: 38%;">Deskripsi</th>
                        <th style="width: 5%;">Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="form-data" style="display: none;" aria-hidden="true">
    <form action="action/BukuAction.php?act=save" method="post" id="form-tambah">
        <!-- Ukuran Modal
            modal-sm : Modal ukuran kecil
            modal-md : Modal ukuran sedang
            modal-lg : Modal ukuran besar
            modal-xl : Modal ukuran sangat besar
            penerapan setelah class modal-dialog seperti di bawah
        -->
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Buku</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori Buku</label>
                        <select id="kategori_id" name="kategori_id" class="form-control">
                            <?php if (!empty($kategori)): ?>
                                <?php foreach ($kategori as $id): ?>
                                    <option value="<?= htmlspecialchars($id['kategori_id']); ?>">
                                        <?= htmlspecialchars($id['kategori_nama']); ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">-</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Buku</label>
                        <input type="text" class="form-control" name="buku_kode"
                            id="buku_kode">
                    </div>
                    <div class="form-group">
                        <label>Nama Buku</label>
                        <input type="text" class="form-control" name="buku_nama"
                            id="buku_nama">
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" name="jumlah"
                            id="jumlah">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input type="text" class="form-control" name="deskripsi"
                            id="deskripsi">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="text" class="form-control" name="gambar"
                            id="gambar">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    // function loadKategori() {
    //     $.ajax({
    //         url: 'action/BukuAction.php?act=get_kategori',
    //         method: 'GET',
    //         success: function(response) {
    //             console.log("Data kategori:", response); 
    //             var data = response; // Response otomatis di-parse oleh jQuery jika JSON
    //             var kategoriSelect = $('#kategori_id');

    //             kategoriSelect.empty();
    //             kategoriSelect.append('<option value="">Pilih Kategori</option>');

    //             data.forEach(function(kategori) {
    //                 kategoriSelect.append('<option value="' + kategori.id + '">' + kategori.nama + '</option>');
    //             });
    //         },
    //         error: function(xhr, status, error) {
    //             console.error("Error loadKategori:", status, error); // Debugging 
    //         }
    //     });
    // }

    // // Panggil loadKategori saat halaman siap atau modal ditampilkan
    // $(document).ready(function() {
    //     loadKategori();
    // });


    function tambahData() {
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/BukuAction.php?act=save');
        $('#kategori_id').val('');
        $('#buku_kode').val('');
        $('#buku_nama').val('');
        $('#jumlah').val('');
        $('#deskripsi').val('');
        $('#gambar').val('');
    }

    function editData(id) {
        $.ajax({
            url: 'action/BukuAction.php?act=get&id=' + id,
            method: 'post',
            success: function(response) {
                var data = JSON.parse(response);
                $('#form-data').modal('show');
                $('#form-tambah').attr('action',
                    'action/BukuAction.php?act=update&id=' + id);
                $('#kategori_id').val(data.kategori_id).trigger('change');
                $('#buku_kode').val(data.buku_kode);
                $('#buku_nama').val(data.buku_nama);
                $('#jumlah').val(data.jumlah);
                $('#deskripsi').val(data.deskripsi);
                $('#gambar').val(data.gambar);
            }
        });
    }

    function deleteData(id) {
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                url: 'action/BukuAction.php?act=delete&id=' + id,
                method: 'post',
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status) {
                        tabelData.ajax.reload();
                    } else {
                        alert(result.message);
                    }
                }
            });
        }
    }
    var tabelData;
    $(document).ready(function() {
        tabelData = $('#table-data').DataTable({
            ajax: 'action/BukuAction.php?act=load',
        });
        $('#form-tambah').validate({
            rules: {
                kategori_id: {
                    required: true,
                    minlength: 1
                },
                buku_kode: {
                    required: true,
                    minlength: 2
                },
                buku_nama: {
                    required: true,
                    minlength: 5
                },
                jumlah: {
                    required: true,
                    minlength: 1
                },
                deskripsi: {
                    required: true,
                    minlength: 5
                },
                gambar: {
                    required: true,
                    minlength: 5
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'post',
                    data: $(form).serialize(),
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('#form-data').modal('hide');
                            tabelData.ajax.reload(); // reload data tabel
                        } else {
                            alert(result.message);
                        }
                    }
                });
            }
        });
    });
</script>