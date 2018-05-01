<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<?php $this->load->view('frame/Filecss'); ?>
		<style type="text/css">
		.modal.bottom-sheet{
			max-height: 60% !important;
		}
		td{
		  
		}
		td > .ellipsis{
		  width: 200px;
		  overflow: hidden;
		  text-overflow: ellipsis;
		  white-space: nowrap;
		}
	</style>
</head>
<body class="grey lighten-4">
	<main>
		<div style="padding:20px 20px;">
			<div class="row">
				<div class="col s12 m4 l4" >
					<div class="card-panel hoverable" style="border-top: 2px solid #2196f3">
						<?php if ($this->session->flashdata('error-img')) {?>
						<script type="text/javascript">
							var toastHTML = '<center ><h6><?php echo $this->session->flashdata("error"); ?></h6></center>';
							M.toast({html: toastHTML,classes:'white-text red'});
						</script>
						<?php } ?>
						<h5 class="blue-text"><center><b > Form Users  </b></center></h5>
						<div class="row">
							<form id="frmUser" enctype="multipart/form-data">
								<div class="input-field s12">
									<input type="text" name="usr"   class="validate" autofocus required>
									<label for="">Username</label>
								</div>
								<div class="input-field s12">
									<input type="password" name="psd"   class="validate"  required>
									<label for="">Password</label>
								</div>
								<div class="input-field s12">
									<select name="jk" >
										<option value="L" selected> Laki Laki </option>
										<option value="P"> Perempuan </option>
									</select>
								</div>
								<div class="input-field s12">
									<textarea name="ket" class="materialize-textarea"></textarea>
								</div>
								<div class="input-field s12">
									<input type="file" class="dropify" name="file" data-height="200" data-max-file-size="1M" data-max-width="2500" data-max-height="2500" data-show-remove="false" data-allowed-file-extensions="png jpg">
								</div>
								<div class="input-field s12">
									<button type="submit" class="btn waves-effect waves-light green right"> Kirim Data </button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col s12 m8 l8">
					<div class="card-panel hoverable" style="border-top: 2px solid #2196f3">
						<table id="example" class="table responsive-table">
							<thead>
								<tr>
									<th>Image</th>
									<th>Username</th>
									<th>Password</th>
									<th>Jenis Kelamin</th>
									<th>Ket </th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								 $no=0;
								 foreach ($tampil_user as $usr) { $no++; ?>
								<tr>
									<td><img src="<?php echo base_url('assets/img').'/'.$usr->gambar ?>" alt="" class="materialboxed responsive-img rounded" width="150" height="150"></td>
									<td><?php echo $usr->username; ?></td>
									<td ><div class="ellipsis"><?php echo $usr->password; ?></div></td>
									<td><?php echo $usr->jenis_kelamin; ?></td>
									<td><?php echo $usr->ket; ?></td>
									<td>
		                                <a class="modal-trigger" href="#" onclick="edit_users('<?php echo $usr->id_users ?>');">
		                                  <button type="button" class="waves-effect waves-light btn btn-small blue"> 
		                                    <i class="ion ion-ios-color-wand"></i>
		                                  </button>
		                                </a>
		                                <a href="javascript:void(0);" onclick="deleteUsers('<?php echo $usr->id_users ?>');">
		                                  <button type="button" class="waves-effect waves-light btn btn-small red"> 
		                                    <i class="ion ion-ios-trash"></i>
		                                  </button>
		                                </a>
		                            </td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>

	<div id="modalUsers" class="modal bottom-sheet">
    <div class="modal-content">
      <h4 class="flow-text"> <i class="ion ion-ios-color-wand"></i> Form Edit seksi</h4>
        <div class="row ">
            <form id="frmUser_u" enctype="multipart/form-data" >
              <div class="row">
	                  <div class="col s12 m12 l5">
	                  	<div class="input-field s12">
							<input type="file" class="dropify" name="file" data-height="200" data-max-file-size="1M" data-max-width="2500" data-max-height="2500" data-show-remove="false" data-allowed-file-extensions="png jpg">
						</div>
						<div class="input-field s12">
							<button type="submit" class="btn btn-block  btn-small waves-effect waves-light blue right">
		                      Update
		                      <i class="ion ion-ios-paperplane right"></i>
		                    </button>	
						</div>
	                  </div>
                  	  <div class="col s12 m12 l7">
		                    <div class="input-field col s12">
		                      <input name="id_users"  type="number"  class="validate" data-length="50" autofocus required readonly>
		                      <label for="icon_prefix"> ID  </label>
		                    </div>
		                    <div class="input-field col s12">
		                      <input name="username"  type="text" class="validate" data-length="50" required >
		                      <label for="icon_prefix"> Username  </label>
		                    </div>
		                    <div class="input-field col s12">
		                      <input name="password"  type="password" class="validate" data-length="50" required >
		                      <label for="icon_prefix"> Password  </label>
		                    </div>
		                     <div class="input-field col s12">
		                      <select name="jenis_kelamin" >
		                      	<option value="L"> Laki Laki</option>
		                      	<option value="P"> Perempuan</option>
		                      </select>
		                    </div>
		                    <div class="input-field col s12">
		                      <textarea name="ket" class="materialize-textarea" class="validate"></textarea>
		                      <label for="icon_prefix"> Keterangan  </label>
		                    </div>  
	                  </div>
                  </div> 
              </div>
          </form>
        </div>
    </div>
</div>
	<?php $this->load->view('frame/Filejs'); ?>
</body>
</html>