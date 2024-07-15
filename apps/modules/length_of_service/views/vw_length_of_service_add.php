<!-- load css dan js -->
<script src="<?php echo PLUG_URL;?>jquery-validation/jquery.validate.min.js"></script>
<!-- end load css dan js -->

<section class="content">
	<div class="container-fluid">
		<div class="card"> <!-- start .card -->
			<div class="card-header"> <!-- start .card-header -->
				<?php echo $form_header;?>
			</div> <!-- end .card-header -->
			
			<div class="card-body"> <!-- start .card-body -->
				<form name="frmLength_of_service" id="frmLength_of_service" method="post" class="form-horizontal">
				<input type="hidden" name="f_id" id="f_id" value="" >
				<input type="hidden" name="f_account_id" id="f_account_id" value="" >
				<div class="form-group row">
					<label class="col-md-2" style="padding-top:7px;">Nama <span class="text-red">*</span></label>
					<div class="col-md-6"><input type="text" name="f_service_desc" id="f_service_desc" class="form-control" placeholder="Nama ..." value="" required></div>
				</div>
				<input type="hidden" name="f_service_aktif" id="f_service_aktif" value="" >	
					<div class="col-md-8" align="center" id="fnButton">
			<?php 	
				if($fAct == 'Add')	echo '<input type="submit" name="submit" value="Save" id="btnSave" class="btn btn-success" />';
	
				if($fAct == 'Edit')	echo '<input type="submit" name="submit" value="Ubah" id="btnUpdate" class="btn btn-warning" />';
			?>
					&nbsp;&nbsp;&nbsp;
					<a onClick="fnBack()" class="btn btn-danger"> Cancel</a>
					</div>
				</form>
	
			</div> <!-- end .card-body -->
			<div class="card-footer" align="right"> <!-- start box-footer -->
			  <p>Page rendered in <strong>{elapsed_time}</strong> seconds</p>
			</div> <!-- end .card-footer-->
		</div> <!-- end .card -->
	</div> <!-- end .container-fluid -->
</section><!-- /.content -->

<script>
var oTable;
$(document).ready(function(){
	$('#frmLength_of_service').validate({
		highlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('has-error').addClass('has-success');
		}		
	});
	
<?php if($fAct == 'Edit') { ;?>
	$.get("<?php echo site_url('length_of_service/fnLength_of_serviceDataId?id='.$fId);?>",function(data){
		if(data)
		{
			$('#f_id').val(data.f_id);
			$('#f_account_id').val(data.f_account_id);
			$('#f_service_desc').val(data.f_service_desc);
			$('#f_service_aktif').val(data.f_service_aktif);
		}
	}, "json");

	var url = "<?php echo site_url('length_of_service/fnLength_of_serviceUpdate?id='.$fId);?>";
<?php } ?>

<?php if($fAct == 'Add') { ;?>
	var url = "<?php echo site_url('length_of_service/fnLength_of_serviceSave');?>";
<?php } ?>

	// Menyimpan data
	$('#frmLength_of_service').submit(function(e){
		var oForm = $('#frmLength_of_service');
		var rec = $('#frmLength_of_service').serialize();
		// rec.push({name: '<?php echo $this->security->get_csrf_token_name(); ?>',value:'<?php echo $this->security->get_csrf_hash();?>'});
		e.preventDefault();
		if($(this).valid()) {
			$.post(url, rec, function(msg){
				if(msg.msg)
				{
					window.location.href = "<?php echo site_url('length_of_service');?>";
				}
				else
				{
					swal.fire({text: 'Gagal !!',icon: 'error',confirmButtonText:'Close',confirmButtonColor: '#FF0000'})
				}
			}, 'json');
		}
	});
});

function fnBack()
{
	window.location.href = "<?php echo site_url('length_of_service');?>";
}
</script>



