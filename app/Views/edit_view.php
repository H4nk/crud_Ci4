<div class="container p-5">
    <a href="<?= base_url('karyawan'); ?>" class="btn btn-secondary mb-2"><i class="fas fa-home"></i></a>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="card-title">Edit Data Vaksinasi Karyawan</h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('karyawan/update'); ?>">
                <div class="form-group">
                    <label for="">Nama Karyawan</label>
                    <input type="text" value="<?= $data_karyawan->nama_karyawan; ?>" name="nama_karyawan" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Usia</label>
                    <input type="text" value="<?= $data_karyawan->usia; ?>" name="usia" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Status Vaksin 1</label>
                    <select class="form-control" name="status_vaksin_1">
                        <option value="<?= $data_karyawan->status_vaksin_1; ?>">---Pilih Status Vaksin--</option>
                        <option value="Belum">Belum Vaksin</option>
                        <option value="Sudah">Sudah Vaksin</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Status Vaksin 2</label>
                    <select class="form-control" name="status_vaksin_2">
                        <option value="">---Pilih Status Vaksin--</option>
                        <option value="Belum">Belum Vaksin</option>
                        <option value="Sudah">Sudah Vaksin</option>
                    </select>
                </div>
 
                <input type="hidden" value="<?= $data_karyawan->id; ?>" name="id">
                <div class="text-right">
                    <button class="btn btn-success">Update</button>
                </div>
            </form>
 
        </div>
    </div>
</div>