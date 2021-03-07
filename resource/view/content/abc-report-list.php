
<!-- LIBRARY -->
<script src="assets/js/jquery-1.10.2.min.js"></script>

<!-- SCRIPT TO EDIT -->
<script>
    $(document).ready(function(){
        $('.editButton').click(function() {
            
			var id = $(this).data('id');
			
            if(id != "") {
                $.ajax({
                    url:"ajax.php",
                    data:{abc_report_edit:id},
                    type:'POST',
                    success:function(response) {
                        var resp = $.trim(response);
                        $("#modal_container").html(resp);

                        if(resp == "")
                            $("#modal_container").html("");
                    }
                });
            }
            else {
                $("#modal_container").html("");
            }
        })
    });
</script>

<!-- SCRIPT TO DELETE -->
<script>
$('.deleteButton').click(function(){
	var id=$(this).data('id');
	$('#modalDelete').attr('href','abc-report-list.php?did='+id);
})
</script>
