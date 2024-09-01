<?php 
include 'init.php'; 
if(!$users->isLoggedIn()) {
	header("Location: login.php");	
}
include('inc/header.php');
$user = $users->getUserInfo();
?>
<title>Ticketing</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/general.js"></script>
<script src="js/tickets.js"></script>
<link rel="stylesheet" href="css/style.css" />
<?php include('inc/container.php');?>
<div class="container">	
	<div class="row home-sections">
	<h2>Ticketing</h2>	
	<?php include('menus.php'); ?>		
	</div> 
	<div class="">   		

		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" name="add" id="createTicket" class="btn btn-success btn-xs">Create Ticket</button>
				</div>
			</div>
		</div>
		<table id="listTickets" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Ticket ID</th>
					<th>Subject</th>
					<th>Priority</th>
					<th>Severity</th>
					<th>User's Name</th>
					<th>Ticket Created By</th>			
					<th>Date Created</th>	
					<th>Ticket Age</th>
					<th>Assigned to</th>
					<th>Assigned Group</th>	
					<th>Status</th>	
					<th></th>
					<th></th>
					<th></th>	
					
					<!-- <th><th>
					<th><th> -->
				</tr>
			</thead>
		</table>
	</div>
	<?php include('add_ticket_model.php'); ?>
</div>	
<?php include('inc/footer.php');?>