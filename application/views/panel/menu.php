<div class="row">
	<div class="col-md-4">
		  <div class="card">
	          <div class="card-header">
	            <h3 class="card-title">Form Menu</h3>
	            <div class="card-tools">
	              <button type="button" class="btn btn-tool" data-card-widget="collapse">
	                <i class="fas fa-minus"></i>
	              </button>
	              <button type="button" class="btn btn-tool" data-card-widget="remove">
	                <i class="fas fa-times"></i>
	              </button>
	            </div>
	          </div>
	          <div class="card-body">
	          	<div class="form-group">
                  <label for="exampleInputRounded0">Nama Menu</label>
                  <input type="text" class="form-control rounded-0" placeholder="Nama Menu" name="name" autocomplete="off">
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Parent Menu</label>
                  <select class="form-control rounded-0 select" style="width: 100%;" name="parent">
                  	<option value="0">Non Parent</option>
                  	<?php foreach ($parent as $p) {
                  		echo '<option value="'.$p->id.'">'.$p->name.'</option>';
                  	} ?>
                  </select>
                </div>
                
	          </div>
	          <div class="card-footer">
                	<button class="btn btn-sm btn-warning float-right"><i class="fa fa-save"></i> Simpan</button>
                </div>
	      </div>
	      <!-- CARD -->
	</div>
	<div class="col-md-8">
	   <div class="card">
          <div class="card-header">
            <h3 class="card-title">Data Menu</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
          	<table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Parent</th>
                <th>Submenu</th>
                <th>Aksi</th>
              </tr>
              </thead>
              <tbody>
              	<?php $no=0; foreach ($data as $key) {
              		$no++;
              		echo '<tr><td>'.$no.'</td><td>'.$key->name.'</td><td>'.($key->parent ==0 ?"Tidak" : "Ya").'</td><td>'.($key->submenu == 0 ?"Tidak" : "Ya").'</td><td></td></tr>';
              	} ?>
              </tbody>
          </table>
          </div>
      </div>
      <!-- CARD -->
	</div>
</div>