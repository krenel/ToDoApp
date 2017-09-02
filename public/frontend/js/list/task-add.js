$("#add_task_button").click(function(){
    var taskDescription = $('#add_task_text').val();
    var taskDeadline = $('#datepicker').val();
    var taskListId = $('#taskListId').val();

    var data = new FormData();
    data.append('taskDescription', taskDescription);
    data.append('taskDeadline', taskDeadline);
    data.append('taskListId', taskListId);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?c=lists&m=addTask', true);
    xhr.onload = function () {
        // do something to response
        alert('Task created!');
        location.reload();
        //console.log(this.responseText);
    };
    xhr.send(data);

});

$(".task_status").click(function(){

    var taskId = $(this).val();

    //console.log(taskId);

    var data = new FormData();
    data.append('taskId', taskId);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'index.php?c=lists&m=changeStatus', true);
    xhr.onload = function () {
        // do something to response
        alert('Status changed!');
        location.reload();
        //console.log(this.responseText);
    };
    xhr.send(data);
});

