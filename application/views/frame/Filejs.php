<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.19.2/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
<script type="text/javascript">
 		$(document).ready(function(){
          $(".modal").modal();
	    });
	    $(document).ready(function(){
	      
	  $('.dropify').dropify({
	      messages: {
	          default: 'Pilih / Drop Gambar',
	        replace: 'Ganti',
	        remove:  'Hapus',
	        error:   'Gagal Upload Gambar '
	        }
	      });
	     });
     
      $(document).ready(function() {
	    $('#example').DataTable();
	  });

	  $(document).ready(function(){
	    $('select').formSelect();
	  });
	  $(document).ready(function(){
	    $('.materialboxed').materialbox();
	  });

	 
	 /* Script AJAX */
	 $(document).ready(function(e){
	 		$('#frmUser').on('submit',(function(e){
	 		e.preventDefault();
	 		$.ajax({
	 			url:"<?php echo base_url() ?>Dashboard/simpan",
	 			type:"POST",
	 			data:new FormData(this),
	 			dataType:"JSON",
	 			processData:false,
	 			cache:false,
	 			contentType:false,
	 			success:function(){
	 				swal({
	 					type:"success",
	 					title:"Berhasil Tambah Users",
	 					showConfirmButton:true,
	 					timer:1500,
	 				}).then(function(){
	 					location.reload();
	 				});
	 			},error:function(jqXHR,textStatus,errorThrown,data){
	    	 alert(textStatus + " Gagal Simpan Users: " + errorThrown + " " + jqXHR);  
	    	 console.log(data); 
	 			}
	 		});
	 	}));
	 });
	 function deleteUsers(id){
 		$.ajax({
 			url:"<?php echo base_url() ?>Dashboard/delete/"+id,
 			type:"POST",
 			data:new FormData(this),
 			dataType:"JSON",
 			processData:false,
 			cache:false,
 			contentType:false,
 			success:function(){
 				swal({
 					type:"success",
 					title:"Berhasil Hapus Users",
 					showConfirmButton:true,
 					timer:1500,
 				}).then(function(){
 					location.reload();
 				});
 			},error:function(jqXHR,textStatus,errorThrown,data){
    	 alert(textStatus + " Gagal Hapus Users: " + errorThrown + " " + jqXHR);  
    	 console.log(data); 
 			}
 		});
	 }

	 function edit_users(id){
	 	$.ajax({
 			url:"<?php echo base_url() ?>Dashboard/edit/"+id,
 			type:"GET",
 			dataType:"JSON",
 			success:function(data){
 				$('[name="id_users"]').val(data.id_users);
 				$('[name="username"]').val(data.username);
 				$('[name="password"]').val(data.password);
 				$('[name="ket"]').val(data.ket);
 				$('#modalUsers').modal();
 				$('#modalUsers').modal('open');


 			},error:function(jqXHR,textStatus,errorThrown,data){
    	 alert(textStatus + " Gagal Hapus Users: " + errorThrown + " " + jqXHR);  
    	 console.log(data); 
 			}
 		});
	 }
	 $(document).ready(function(e){
	 	$('#frmUser_u').on('submit',(function(e){
	 		e.preventDefault();
	 		$.ajax({
	 			url:"<?php echo base_url() ?>Dashboard/update",
	 			type:"POST",
	 			data:new FormData(this),
	 			dataType:"JSON",
	 			processData:false,
	 			cache:false,
	 			contentType:false,
	 			success:function(){
	 				swal({
	 					type:"success",
	 					title:"Berhasil Update Users",
	 					showConfirmButton:true,
	 					timer:1500,
	 				}).then(function(){
	 					location.reload();
	 				});
	 			},error:function(jqXHR,textStatus,errorThrown,data){
	    	 alert(textStatus + " Gagal Update Users: " + errorThrown + " " + jqXHR);  
	    	 console.log(data); 
	 			}
	 		});
	 	}));
	 })

</script>