	<div id="contactus" class="modal fade" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Contact us</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="public/contact_us_form.php" method="POST">
				        <div class="form-group">
				          	<label>Name</label>
				          	<input class="form-control" type="text" name="name" placeholder="name" required />
				         	<label>Email</label>
				          	<input class="form-control" type="email" name="email" placeholder="email" required />
				          	<label>Subject</label>
				          	<select id="inputStream" class="form-control" name="subject" required>
				             	<option value="">Choose Subjects...</option>
				              	<option value="Profile">Profile</option>
				              	<option value="Accessability">Accessability</option>
				              	<option value="Others">Others</option>
				          	</select>
				          	<label>Description</label>
				          	<textarea class="form-control" type="text" name="message" placeholder="Discribe your issue" rows="8" required></textarea>
				          	<br>
				          	<button class="btn btn-dark" type="submit">Submit</button>
				        </div>    
				    </form>
				</div>
			</div>
		</div>
	</div>