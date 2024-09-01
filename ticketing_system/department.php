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
<script src="js/department.js"></script>
<script src="js/sla.js"></script>
<link rel="stylesheet" href="css/style.css" />
<?php include('inc/container.php');?>
<div class="container">	
	<div class="row home-sections">
	<h2>Ticketing</h2>	
	<?php include('menus.php'); ?>		
	</div> 
	<!-- for Priority Table (add button)-->
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">
				<h3 class="panel-title"></h3>
			</div>
			<div class="col-md-2" align="right">
				<button type="button" name="add" id="addDepartment" class="btn btn-success btn-xs">Add New</button>
			</div>
		</div>
	</div>
	<!-- for Priority Table -->
	<table id="listDepartment" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Priority</th>				
				<th>Status</th>
				<th></th>
				<th></th>									
			</tr>
		</thead>
	</table>

	<!-- for Severity Table (add button) Losh -->
	<div class="panel-heading">
		<div class="row">
			<div class="col-md-10">
				<h3 class="panel-title"></h3>
			</div>
			<div class="col-md-2" align="right">
			<button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#severityModal">Add New</button>
			</div>	
		</div>
	</div>
	<!-- for Severity Table -->
		<table id="listSla" class="table table-bordered table-striped"> 
		<thead>
			<tr>
				<th>#</th>
				<th>Severity</th>					
				<th>Respond Within</th>
				<th>Resolved Within</th>
				<th>Operational Hours</th>
				<th>Escalation Severity</th>									
			</tr>
		</thead>
	<!-- functionality of add button (Priority) Losh -->
	<<div id="departmentModal" class="modal fade">
		<div class="modal-dialog">
			<form method="post" id="departmentForm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Priority</h4>
					</div>
					<div class="modal-body">
						<div class="form-group"
							<label for="department" class="control-label">Priority</label>
							<input type="text" class="form-control" id="department" name="department" placeholder="priority" required>			
						</div>
						<div class="form-group">
							<label for="status" class="control-label">Status</label>				
							<select id="status" name="status" class="form-control">
							<option value="1">Enable</option>				
							<option value="0">Disable</option>	
							</select>						
						</div>						
						
					</div>
					<div class="modal-footer">
						<input type="hidden" name="departmentId" id="departmentId" />
						<input type="hidden" name="action" id="action" value="" />
						<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- for Severity Losh -->
	<div id="severityModal" class="modal fade"> 
		<div class="modal-dialog">
			<form method="post" id="severityForm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Add Severity</h4>
					</div>
					<div class="modal-body">
						<!-- Your form fields here Losh -->
						<div class="form-group">
							<label for="sla" class="control-label">Severity</label>
							<input type="text" class="form-control" id="sla" name="sla" placeholder="Severity" required>
						</div>
						<div class="form-group">
							<label for="sla" class="control-label">Respond Within</label>
							<input type="text" class="form-control" id="sla" name="sla" placeholder="Respond Within" required>
						</div>
						<div class="form-group">
							<label for="sla" class="control-label">Resolve Within</label>
							<input type="text" class="form-control" id="sla" name="sla" placeholder="Resolve Within" required>
						</div>
						<div class="form-group">
							<label for="sla" class="control-label">Operational Hours</label>
							<input type="text" class="form-control" id="sla" name="sla" placeholder="Operational Hours" required>
						</div>
						<div class="form-group">
                    <label for="severityStatus" class="control-label">Escalation Severity</label>
                    <select id="severityStatus" name="status" class="form-control selectpicker" data-live-search="true">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
						<option value="3">High</option>
                    </select>
                </div>
					</div>
					<div class="modal-footer">
						<input type="hidden" name="departmentId" id="departmentId" />
						<input type="hidden" name="action" id="action" value="" />
						<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>		
					</div>
				</div>
			</form>
		</div>
	</div>
</div>	
<?php include('inc/footer.php');?>