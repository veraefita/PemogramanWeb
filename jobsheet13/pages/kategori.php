<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kategori Buku</h1>
            </div>
            <div class="com-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Kategori</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Kategori Buku</h3>
            <div class="card-tools">
                <button class="btn btn-md btn-primary" type="button" onclick="tambahData()">Tambah</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered table-striped" id="table-data">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
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
    <form action="action/kategoriAction.php?act=save" method="post" id="form-tambah">
        <!-- Ukuran modal
        modal-sm : modal ukuran kecil
        modal-md : modal ukuran sedang
        modal-lg : modal ukuran besar
        modal-xl : modal ukuran sangat besar
        penerapan setelah class modal-dialog seperti dibwh ini -->

        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kode Kategori</label>
                        <input type="text" class="form-control" name="kategori_kode" id="kategori_nama">
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" id="kategori_nama" name="kategori_nama">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function tambahData() {
        $('#form-data').modal('show');
        $('#form-tambah').attr('action', 'action/kategoriAction.php?act=save');
        $('#kategori_kode').val('');
        $('#kategori_nama').val('');
    }

    function editData(id) {
        $.ajax({
            url: 'action/kategoriAction.php?act=get&id=' + id,
            method: post,
            success: function(response) {
                var data = JSON.parse(response);
                $('#form-data').modal('show');
                $('#form-tambah').attr('action', 'action/kategoriAction.php?act=update&id='+id);
                $('#kategori_kode').val(data.kategori_kode);
                $('#kategori_nama').val(data.kategori_nama);
            }
        });
    }

    function deleteData(id){
        if (confirm('Apakah anda yakin?')) {
            $.ajax({
                url: 'action/kategoriAction.php?act=delete&id='+id,
                method: 'post',
                success: function(response){
                    var result = JSON.parse(response);
                    if (result.status) {
                        tabelData.ajax.reload();
                    }else{
                        alert(result.message);
                    }
                }
            });
        }
    }

    var tabelData;
    $(document).ready(function(){
        tabelData = $('#table-data').DataTable({
            ajax: 'action/kategoriAction.php?act=load',
        });
        $('#form-tambah').validate({
            rules: {
                kategori_kode: {
                    requires: true,
                    minlength: 3
                },
                kategori_nama: {
                    requires: true,
                    minlength: 5
                }
            },
            erroeElement: 'span',
            errorPlacement: function(error, element){
                error.addClass('invalid-feedback');
                error.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form){
                $.ajax({
                    url: $(form).attr('action'),
                    method: 'post',
                    data: $(form).serialize(),
                    success: function(response){
                        var result = JSON.parse(response);
                        if (result.status) {
                            $('#form-data').modal(hide);
                            tabelData.ajax.reload(); //reload data table
                        }else{
                            alert(result.message);
                        }
                    }
                });
            }
        });
    });
</script>