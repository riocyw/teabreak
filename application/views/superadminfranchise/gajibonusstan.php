        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Master Data Produk</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Semua Data Produk</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tambah Produk</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                            <div class="card-body card-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="id" class=" form-control-label">Kode Barang</label>
                                            <input type="text" id="id" placeholder="Masukkan Kode Barang" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nama" class=" form-control-label">Nama Barang</label>
                                            <input type="text" id="nama" placeholder="Masukkan Nama Barang" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="harga" class=" form-control-label">Harga Jual</label>
                                            <input type="text" id="harga" onkeyup="this.value=currency(this.value);" placeholder="Masukkan Harga Barang" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="kategori" class=" form-control-label">Kategori Barang</label>
                                            <input type="text" id="kategori" placeholder="Masukkan Kategori Barang" class="form-control">
                                        </div>
                                        <div class="input-group">
                                            
                                            <div class="input-group-btn"><button onclick="tambahproduk()" class="btn btn-success">Tambah Produk</button></div>
                                        </div> 
                                    </div>
                                </div>
                            </div>    
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Produk</strong>
                        </div>
                        <div class="card-body">
                          <table id="mytable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Jual</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                          </table>
                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->
                </div>
            </div>


        </div> <!-- .content -->
    </div><!-- /#right-panel -->