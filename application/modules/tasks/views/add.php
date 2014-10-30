<!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
							<div class="panel panel-primary">
								<div class="panel-heading">Create Task</div>
								<div class="panel-body">
								
								<div class="error">
								<?php
									echo validation_errors();
								?>					
								</div>		
								 
								<?php
										$attributes = array(
											'id' => 'autor_form',
											'name' => 'autor_form',
											'class' => 'simple_form form-horizontal'
										);
										
										if(isset($result['id'])) {
											echo form_open_multipart(base_url().'tasks/add/'.$result['id'],$attributes);
										}
										else {
											echo form_open_multipart(base_url().'tasks/add',$attributes);
										}
								?>
										<div class="form-group">
											<label class="col-sm-3 control-label" for="tasks_name"><abbr title="required">*</abbr>Task Name</label>
											<div class="col-sm-9">
												<input class="string form-control" id="tasks_name" name="tasks_name"  type="text" value="<?= isset($result['id']) ? $result['task'] : $result['tasks_name']  ?>">
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-sm-3 control-label" for="task_priority"><abbr title="required">*</abbr>Priority</label>
											<div class="col-sm-9">
												<input class="string form-control" id="task_priority" name="task_priority"  type="number" value="<?= isset($result['id']) ? $result['priority'] : $result['task_priority']  ?>" >
											</div>
										</div>
										
										<input class="btn btn-default" name="commit" type="submit" value="Create Task">
									</form>
								</div>
							</div>
					</div>
                </div>
            </div>
        </div>
<!-- /#page-content-wrapper -->
