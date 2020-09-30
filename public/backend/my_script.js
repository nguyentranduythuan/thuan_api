$('#delete').on('show.bs.modal',function(e){
	var button = $(e.relatedTarget)
	var color_id = button.data('colorid')
	console.log(color_id);
	var modal = $(this)

	modal.find('.modal-body #colorid').val(color_id);
});