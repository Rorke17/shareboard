<div><br/>
	<?php if (isset($_SESSION['is_logged_in'])): ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>shares/add">Share Something</a>
<?php else: ?>
	<a class="btn btn-success btn-share" href="<?php echo ROOT_PATH; ?>users/login">Share Something</a>
<?php endif; ?>
	<?php foreach($viewModel as $item) : ?>
		<div class="card">
			<div class="card-header">
				<h3><?php echo $item['title']; ?></h3>
				<small><?php echo $item['create_date']; ?></small>
			</div>
			<div class="card-body">
			<p><?php echo $item['body']; ?></p>
			<br />
			<a class="btn btn-primary" href="<?php echo $item['link']; ?>" target="_blank">Go To Website</a>
		</div>
		<!-- edit this!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->
		<div class="card-footer">
		<?php if(isset($_SESSION['is_logged_in']) && ($_SESSION['user_data']['id'] == 1 || $item['user_id'] == $_SESSION['user_data']['id'])) : ?>
				<form method="post" action="<?php echo ROOT_PATH; ?>shares/edit"><br />
					<input type="hidden" name='shared_id' value="<?php echo $item['id']; ?>" />
					<input class="btn btn-primary" name="edit" type="submit" value="Edit" />
<!-- ///////////////////////////////////////////////////////////////////////////////////// -->
					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
					  Delete this post
					</button>
					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">Delete post</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        After deleting this post, restoring will be unavailable
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<input class="btn btn-danger" name="edit" type="submit" value="Delete" data-toggle="modal" data-target="#exampleModalCenter"/>
					      </div>
					    </div>
					  </div>
					</div>
				</form>
		<?php endif; ?>
	</div>
	</div><br/>
	<?php endforeach; ?>
</div>
