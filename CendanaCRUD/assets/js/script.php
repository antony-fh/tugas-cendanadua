var r;
function refresh(){
	r.ajax.reload(null,false);
}
/*Pegawai*/
$(document).ready(function(){
	r = $('#pegawai').DataTable({
		"ajax":"<?=base_url($this->router->fetch_class() . '/data')?>"
	});
});

$(document).on("submit","#form-update",function(e){
e.preventDefault();
var form = $(this);
$.post(form.attr('action'),form.serialize(),function(msg){
		$("#modal-update").modal('hide');
		refresh();
})
});
$(document).on("submit","#form-tb-pegawai",function(e){
e.preventDefault();
var form = $(this);
$.post(form.attr('action'),form.serialize(),function(msg){
		$("#tb-pegawai").modal('hide');
		refresh();
})
});
$(document).on("click", ".del-pegawai", function (e) {
	e.preventDefault();
	var del = confirm('Apakah anda yakin ingin menghapus data ini ?');
	if (del) {
	var id = $(this).attr("data-id");
	$.get("<?=base_url('pegawai/hapus/"+id+"')?>",
	function (msg){
		refresh();
	});
	}
});
$(document).on("click", ".up-pegawai", function (e) {
	e.preventDefault();
	var id = $(this).attr("data-id");
	$.get("<?=base_url('pegawai/edit/"+id+"')?>",
	function (msg){
		$("#modal-update").html(msg);
		$("#modal-update").modal('show');
		refresh();
	});
});


/*Kota*/
var rKota;
function refreshKota(){
	rKota.ajax.reload(null,false);
}
$(document).ready(function(){
	rKota = $('#kota').DataTable({
		"ajax":"<?=base_url($this->router->fetch_class() . '/data')?>"
	});
});

$(document).on("submit","#form-edit-kota",function(e){
e.preventDefault();
var form = $(this);
$.post(form.attr('action'),form.serialize(),function(msg){
		$("#modal-update-kota").modal('hide');
		refreshKota();
})
});

$(document).on("submit","#form-tb-kota",function(e){
e.preventDefault();
var form = $(this);
$.post(form.attr('action'),form.serialize(),function(msg){
		$("#tb-kota").modal('hide');
		refreshKota();
})
});

$(document).on("click", ".del-kota", function (e) {
	e.preventDefault();
	var del = confirm('Apakah anda yakin ingin menghapus data ini ?');
	if (del) {
	var id = $(this).attr("data-id");
	$.get("<?=base_url('kota/hapus/"+id+"')?>",
	function (msg){
		refreshKota();
	});
	}
});

$(document).on("click", ".up-kota", function (e) {
	e.preventDefault();
	var id = $(this).attr("data-id");
	$.get("<?=base_url('kota/edit/"+id+"')?>",
	function (msg){
		$("#modal-update-kota").html(msg);
		$("#modal-update-kota").modal('show');
		refreshKota();
	});
});

/*posisi*/

var rPos;
function refreshPos(){
	rPos.ajax.reload(null,false);
}

$(document).on("submit","#form-edit-posisi",function(e){
e.preventDefault();
var form = $(this);
$.post(form.attr('action'),form.serialize(),function(msg){
		$("#modal-update-posisi").modal('hide');
		refreshPos();
})
});
$(document).on("submit","#form-tb-posisi",function(e){
e.preventDefault();
var form = $(this);
$.post(form.attr('action'),form.serialize(),function(msg){
		$("#tb-posisi").modal('hide');
		refreshPos();
})
});
$(document).on("click", ".del-posisi", function (e) {
	e.preventDefault();
	var del = confirm('Apakah anda yakin ingin menghapus data ini ?');
	if (del) {
	var id = $(this).attr("data-id");
	$.get("<?=base_url('posisi/hapus/"+id+"')?>",
	function (msg){
		refreshPos();
	});
	}
});
$(document).on("click", ".up-posisi", function (e) {
	e.preventDefault();
	var id = $(this).attr("data-id");
	$.get("<?=base_url('posisi/edit/"+id+"')?>",
	function (msg){
		$("#modal-update-posisi").html(msg);
		$("#modal-update-posisi").modal('show');
		refreshPos();
	});
});

$(document).ready(function(){
	r = $('#posisi').DataTable({
		"ajax":"<?=base_url($this->router->fetch_class() . '/data')?>"
	});
});