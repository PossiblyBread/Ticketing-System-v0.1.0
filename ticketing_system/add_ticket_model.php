<div id="ticketModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="ticketForm" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Add Ticket</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="subject" class="control-label">Subject</label>
						<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>			
					</div>
					
					<div class="form-group">
						<label for="Username" class="control-label">User's Name</label>
						<input type="text" class="form-control" id="Username" name="Username" placeholder="Enter User's Name" required>			
					</div>

					<!-- Priority Dropbox -->
					<div class="form-group">
						<label for="department" class="control-label">Priority</label>							
						<select id="department" name="department" class="form-control" placeholder="Department...">					
							<?php $tickets->getDepartments(); ?>
						</select>						
					</div>
					<div class="form-group">
							<label for="status" class="control-label">Assigned Group</label>				
							<select id="role" name="role" class="form-control">		
							<option value="L-1">L-1</option>
							<option value="L-2">L-2</option>
							<option value="L-3">L-3</option>
							</select>						
					</div>

					<div class="form-group">
						<label for="message" class="control-label">Message</label>							
						<textarea class="form-control" rows="5" id="message" name="message"></textarea>							
					</div>
				
					<div class="form-group">
						<label for="status" class="control-label">Status</label>							
						<label class="radio-inline">
							<input type="radio" name="status" id="pending" value="0" checked required>Pending
						</label>
							
						<label class="radio-inline">
							<input type="radio" name="status" id="assigned" value="1" checked required>Assigned
						</label>
						
						<label class="radio-inline">
							<input type="radio" name="status" id="escalated" value="2" checked required>Escalated
						</label>
							
						<label class="radio-inline">
							<input type="radio" name="status" id="resolved" value="3" checked required>Resolve
						</label>

						<?php if(isset($_SESSION["admin"])) { ?>
							<label class="radio-inline">
								<input type="radio" name="status" id="close" value="4" required>Close
							</label>
						<?php } ?>	
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="ticketId" id="ticketId" />
					<input type="hidden" name="action" id="action" value="" />
					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>
