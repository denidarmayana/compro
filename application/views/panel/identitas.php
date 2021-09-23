<div class="row">
	<div class="col-md-12">
		 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Identitas Website</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              	<form class="form-horizontal" enctype="multipart/form-data" id="tambahSuratMasuk">
              	<div class="form-group">
                  <label for="exampleInputRounded0">Judul Website</label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="Judul Website" id="title" value="<?=$data->title ?>">
                </div>
              	<div class="form-group">
	              <label for="exampleInputRounded0">Author</label>
	              <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="Author" id="author" value="<?=$data->author ?>">
	            </div>
	            <div class="form-group">
	              <label for="exampleInputRounded0">Deskripsi</label>
	              <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder="Deskripsi" id="description" value="<?=$data->description ?>">
	            </div>
		          <div class="form-group">
	                <div class="custom-file">
	                  <input type="file" class="custom-file-input" name="logo" id="logo">
	                  <label class="custom-file-label" for="customFile">Pilih Logo</label>
	                </div>
	              </div>
	              <div class="form-group">
	                <div class="custom-file">
	                  <input type="file" class="custom-file-input" name="favicon" id="favicon">
	                  <label class="custom-file-label" for="customFile">Pilih favicon</label>
	                </div>
	              </div>
	            </form>
	        </div>
	        <div class="card-footer">
	        	<div class="float-right">
	        		<button class="btn btn-sm btn-warning" type="submit" id="submit_info"><i class="fa fa-save"></i> Simpan</button>
	        	</div>
	        </div>
          </div>
	</div>
</div>