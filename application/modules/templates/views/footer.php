</div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?= base_url() ?>js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>js/jquery.validate.js"></script>
    <script src="<?= base_url() ?>js/bootstrap-datetimepicker.js"></script>
    <script src="<?= base_url() ?>js/moment.js"></script>

	<style>
		.error{
			color:red;
			display:inline-block;
		}
	</style>
    <!-- Menu Toggle Script -->
    <script>
	
	$(document).ready(function() { 
		$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
		});
		
		
		$('#selectall').click(function(event) { 
			if(this.checked) { 
				$('.checkbox1').each(function() { 
					this.checked = true;  
				});
			}else{
				$('.checkbox1').each(function() { 
					this.checked = false;                        
				});         
			}
		});

    });
    </script>

</body>

</html>
