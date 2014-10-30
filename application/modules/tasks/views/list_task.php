<div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>All My Task</h1>
						<?php echo form_open_multipart(base_url().'tasks/delete'); ?>
						<table class="table">
							<tr>
								<th>
									<input type="checkbox" name="selecctall" id="selectall" /> Delete All
								</th>
								<th>
									Task
								</th>
								<th>
									Priority
								</th>
								<td>
									Action
								</td>
							</tr>
							<?php 
								foreach($task_lists as $task) :
							?>
								<tr>
									<td>
									<input type="checkbox" class="checkbox1" name="task_delete[]" id="task_delete[]" value="<?= $task['id'] ?>" />	
									</td>
									<td>
										<?= $task['task']; ?>
									</td>
									<td>
										<?= $task['priority']; ?>
									</td>
									<td>
										<a href="<?= base_url() ?>tasks/add/<?= $task['id'] ?>" >Edit</a>
									</td>
								</tr>
							<?php 
								endforeach;
							?>
						</table>
						<input type="submit" name="delete" id="delete" value="Delete" />
						</form>
					</div>
				</div>
				<ul class="pagination">
					<?php
						if(isset($pagination_data)) {
							echo $pagination_data;
						}
					?>
				</ul>
			</div>
</div>