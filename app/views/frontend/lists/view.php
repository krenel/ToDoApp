<?php include '/../include/header.php'; ?>
<?php include '/../include/menu.php'; ?>
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <h1><?php echo $userList->getListTitle(); ?></h1>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-6">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Title</label>
                        <input id="add_task_text" type="text" class="form-control" placeholder="Add task" name="list_title" required="" data-validation-required-message="Please enter your phone number.">
                        <input id="datepicker" type="date" placeholder="Choose date">
                        <input id="taskListId" type="hidden" value="<?php echo $_GET['id'] ?>" >
                        <p id="add_task_error" class="help-block text-danger"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group col-xs-12">
                    <button id="add_task_button"  type="submit" name="list_create" class="btn btn-default">Create</button>
                </div>
            </div>
        </div>
        <div class="row">
                <table border="1">
                    <thead>
                    <tr>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <?php foreach($tasks as $task) { ?>
                            <tr>
                                <?php if ($task->getTaskStatus() == false) {?>
                                    <td><button value="<?php echo $task->getTaskId()?>" class="btn btn-warning task_status">In progres</button></td>
                                <?php } else { ?>
                                    <td><button value="<?php echo $task->getTaskId()?>" class="btn btn-success task_status">Done</button></td>
                                <?php } ?>
                                <td><?php echo $task->getTaskDescription() ?></td>
                                <td><?php echo $task->getTaskDeadline(); ?></td>
                                <td><a href="index.php?c=lists&m=deleteTask&id=<?php echo $task->getTaskId()?>" class="btn btn-danger task_status">Delete</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<?php include '/../include/footer.php'; ?>
