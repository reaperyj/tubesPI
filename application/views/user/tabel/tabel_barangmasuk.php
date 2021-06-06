<br><br><br>
    <div class="container text-center" style="margin: 2em auto;">
    <h2 class="tex-center">Stock Barang di Gudang USU</h2>
    <table class="table table-bordered table-striped" style="margin: 2em auto;" id="tabel_barangmasuk">
    <thead>
      <tr>
        <th>No</th>
        <th>ID_Transaksi</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php if(is_array($list_data)){ ?>
        <?php $no = 1;?>
        <?php foreach($list_data as $dd): ?>
          <td><?=$no?></td>
          <td><?=$dd->id_transaksi?></td>
          <td><?=$dd->tanggal?></td>
          <td><?=$dd->lokasi?></td>
          <td><?=$dd->kode_barang?></td>
          <td><?=$dd->nama_barang?></td>
          <td><?=$dd->satuan?></td>
          <td><?=$dd->jumlah?></td>
      </tr>
    <?php $no++; ?>
    <?php endforeach;?>
    <?php }else { ?>
          <td colspan="7" align="center"><strong>Data Kosong</strong></td>
    <?php } ?>
    </tbody>
  </table>
  </div>
  <br><br>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="container">
            <!-- general form elements -->
          <div class="box" style="width:94%;" id="box_forms">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);"><i class="fa fa-archive" aria-hidden="true"></i> Form Perimantaan Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="container">
            <form action="<?=base_url('admin/proses_databarang_masuk_insert')?>" role="form" method="post">

              <?php if($this->session->flashdata('msg_berhasil')){ ?>
                <div class="alert alert-success alert-dismissible" style="width:91%">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('msg_berhasil');?>
               </div>
              <?php } ?>

              <?php if(validation_errors()){ ?>
              <div class="alert alert-warning alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Warning!</strong><br> <?php echo validation_errors(); ?>
             </div>
            <?php } ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="id_transaksi" style="margin-left:220px;display:inline;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">ID Transaksi</label>
                  <input type="text" id="id_transaksi" name="id_transaksi" style="margin-left:37px;width:20%;display:inline;" class="form-control" readonly="readonly" value="WG-<?=date("Y");?><?=random_string('numeric', 8);?>">
                </div>
                <div class="form-group">
                  <label for="tanggal" style="margin-left:220px;display:inline;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">Tanggal</label>
                  <input type="text" id="tanggal" name="tanggal" style="margin-left:66px;width:20%;display:inline;" class="form-control form_datetime" placeholder="Klik Disini">
                </div>
                <div class="form-group" style="margin-bottom:40px;">
                  <label for="nama_barang" style="margin-left:220px;display:inline;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">Lokasi</label>
                  <select class="form-control" id="lokasi" name="lokasi" style="margin-left:75px;width:20%;display:inline;">
                    <option value="">-- Pilih --</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Bali">Bali</option>
                    <option value="Bengkulu">Bengkulu</option>
                    <option value="Jakarta">Jakarta Raya</option>
                    <option value="Jambi">Jambi</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Papua">Papua</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                    <option value="Kalimantan Barat">Kalimantan Barat</option>
                    <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                    <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                    <option value="Kalimantan Timur">Kalimantan Timur</option>
                    <option value="Lampung">Lampung</option>
                    <option value="NTB">Nusa Tenggara Barat</option>
                    <option value="NTT">Nusa Tenggara Timur</option>
                    <option value="Riau">Riau</option>
                    <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                    <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                    <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                    <option value="Sumatera Barat">Sumatera Barat</option>
                    <option value="Sumatera Utara">Sumatera Utara</option>
                    <option value="Maluku">Maluku</option>
                    <option value="Maluku Utara">Maluku Utara</option>
                    <option value="Sulawesi Utara">Sulawesi Utara</option>
                    <option value="Sulawesi Selatan">Sumatera Selatan</option>
                    <option value="Banten">Banten</option>
                    <option value="Gorontalo">Gorontalo</option>
                    <option value="Bangka">Bangka Belitung</option>
                  </select>
                </div>
                <div class="form-group" style="display:inline-block;">
                  <label for="kode_barang" style="width:87%;margin-left: 12px;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">Kode Barang / Barcode</label>
                  <input type="text" id="kode_barang" name="kode_barang" style="width: 90%;margin-right: 67px;margin-left: 11px;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);" class="form-control" id="kode_barang" placeholder="Kode Barang">
                </div>
                <div class="form-group" style="display:inline-block;">
                  <label for="nama_Barang" style="width:73%;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">Nama Barang</label>
                  <input type="text" id="nama_barang" name="nama_barang" style="width:90%;margin-right: 67px;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);" class="form-control" id="nama_Barang" placeholder="Nama Barang">
              </div>
                <div class="form-group" style="display:inline-block;">
                  <label for="satuan" id="satuan" style="width:73%;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">Satuan</label>
                  <select class="form-control" id="satuan" name="satuan" style="width:110%;margin-right: 18px;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">
                    <option value="" selected="">-- Pilih --</option>
                    <?php foreach($list_satuan as $s){ ?>
                    <option value="<?=$s->kode_satuan?>"><?=$s->nama_satuan?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group" style="display:inline-block;">
                <label for="jumlah" id="jumlah" style="width:73%;margin-left:33px;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);">Jumlah</label>
                <input type="number" name="jumlah" style="width:41%;margin-left:34px;margin-right:18px;font-family: 'Ubuntu', sans-serif;color:rgb(63, 63, 63);" class="form-control" id="jumlah">
            </div>
            <div class="form-group" style="display:inline-block;">
              <button type="reset" id="button1" class="btn btn-basic" name="btn_reset" style="width:95px;margin-left:-12rem;"><i class="fa fa-eraser" aria-hidden="true"></i> Reset</button>
            </div>
              <!-- /.box-body -->
              <div class="box-footer" style="width:93%;">
                <button type="submit" id="button4" style="width:20%" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
              </div>
            </form>
          </div>
          </div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#tabel_barangmasuk').DataTable();
  });
</script>
