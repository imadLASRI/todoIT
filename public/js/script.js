
// rdy
$(function () {

    // custom scroll plugin
    // $(document).on("load",function(){
    //     $(".scrollContainer").mCustomScrollbar();
    // });

    // global modal var
    var modal = $('.modal');

    // hide all details 
    $('.taskDetails').hide();

    $('.taskLabel').click(function () {
        $(this).closest('.task').find("ul.taskDetails").toggle('slow');
    });

    // Done button
    $('.checkDone').click(function () {
        var id = $(this).attr("data-id");
        var check = $(this).find('img');
        var label = $(this).next('.taskLabel');

        if (check.attr('src') == 'img/checkbox.png') {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '/done',
                data:{
                    '_token': $('meta[name="csrf-token"]').attr("content"),
                    'id': id
                },

                success: function (data) {
                    $("#status" + id).hide();
                    $("#status" + id).text(data);
                    $("#status" + id).fadeToggle('slow');

                    check.attr('src', 'img/checkbox-ok.png');
                    label.css('text-decoration', 'line-through');
                }
            });
        } else if (check.attr('src') == 'img/checkbox-ok.png') {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '/done',
                data:{
                    '_token': $('meta[name="csrf-token"]').attr("content"),
                    'id': id
                },

                success: function (data) {
                    $("#status" + id).hide();
                    $("#status" + id).text(data);
                    $("#status" + id).fadeToggle('slow');

                    check.attr('src', 'img/checkbox.png');
                    label.css('text-decoration', 'none');
                }
            });
        }
    });

    // call done on new elements

    function dynamiCheck(element) {

        var span = $(element).find('span.checkDone');

        // console.log(span);

        var id = $(span).attr("data-id");
        var check = $(span).find('img');
        var label = $(span).next('.taskLabel');

        if (check.attr('src') == 'img/checkbox.png') {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '/done',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr("content"),
                    'id': id
                },

                success: function (data) {
                    $("#status" + id).hide();
                    $("#status" + id).text(data);
                    $("#status" + id).fadeToggle('slow');

                    check.attr('src', 'img/checkbox-ok.png');
                    label.css('text-decoration', 'line-through');
                }
            });
        } else if (check.attr('src') == 'img/checkbox-ok.png') {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: '/done',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr("content"),
                    'id': id
                },

                success: function (data) {
                    $("#status" + id).hide();
                    $("#status" + id).text(data);
                    $("#status" + id).fadeToggle('slow');

                    check.attr('src', 'img/checkbox.png');
                    label.css('text-decoration', 'none');
                }
            });
        }
    }

    // delete button
    $('.delete').click(function (event) {
        event.preventDefault();
        var task = $(this).closest('.task');

        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'deleteTask/' + $(this).attr("data-id"),

            success: function (data) {
                task.fadeOut().remove('slow');
            }
        });
    });

    // edit task button
    $('.edit').click(function (event) {
        event.preventDefault();
        event.stopPropagation();

        modal = $('#editModal.modal');

        $.ajax({
            type: 'GET',
            dataType: 'JSON',
            url: 'editTask/' + $(this).attr("data-id"),

            success: function (data) {
                $('#id').val(data.id);
                $('#name').val(data.name);
                $("#cat").val(data.category_id);
                $("#state").val(data.status);
                $("#start").val(data.start);
                $("#deadline").val(data.deadline);
                $("#desc").val(data.description);

                // show edit modal
                $('.modalON').attr('style', 'display: inline-block;');
                modal.attr('style', 'display: inline-block;');
            },
        });
    });

    // add task quick menu button
    $('#add').click(function (event) {
        event.preventDefault();
        event.stopPropagation();

        modal = $('#addModal.modal');

        // show add task modal
        $('.modalON').attr('style', 'display: inline-block;');
        modal.attr('style', 'display: inline-block;');
    });

    //FIX THIS
    $('#addTaskbtn').click(function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/storeTask',
            dataType: 'JSON',
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'name': $('#addModal #newTaskName').val(),
                'description': $('#addModal #newTaskName').val(),
                'category_id': $('#addModal #newTaskCat option:selected').val(),
                'start': $('#addModal #newTaskStart').val(),
                'deadline': $('#addModal #newTaskDead').val(),
            },

            success: function (data) {
                var theNewTask = `<div class="task">
                                    <div class="showTask">
                                        <div class="taskName">
                                            <span class="checkDone" data-id="`+ data['task'].id + `">
                                            <img src="img/checkbox.png" width="20" alt=""></span>
                                            <label class="taskLabel" style="text-decoration: none;">`+ data['task'].name + `</label>
                                        </div>
                                        <div class="taskControls">
                                            <div class="category"><p>` + data['itsCategory'] + `</p></div>
                                            <div>
                                                <p>`+ data['task'].start + `</p>
                                            </div>
                                            <div>
                                                <a href="" class="taskButton edit" data-id="`+ data['task'].id + `">Edit</a>
                                                <a href="" class="taskButton delete" data-id="`+ data['task'].id + `">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="taskDetails" style="display: none;">
                                        <li><span class="highlight" id="status`+ data['task'].id + `">Ongoing</span></li>
                                        <li> <span class="highlight deadLine">date('j M Y', strtotime(`+ data['task'].deadline + `))</span></li><br>
                                        <li>`+ data['task'].description + `</li>
                                    </ul>
                                </div>`

                $('.scrollContainer').append(theNewTask);
                // theNewTask.last('span.checkDone').onclick = dynamiCheck(theNewTask);
            }
        });

        // hide modal
        $('.modalON').fadeOut('slow');
        $('.modal').fadeOut('slow');

    });
    


    // modals display off
    $(document).click(function (e) {
        e.stopPropagation();

        if ($('.modalON').css('display') != 'none') {
            $('.modalON').fadeOut('slow');
            $('.modal').fadeOut('slow');
            // $('.modalON').attr('style', 'display: none;');
            // $('.modal').attr('style', 'display: none;');
        }
    });

    modal.click(function (e) {
        e.stopPropagation();
    });
});

$(document).change(function(){
    // WHen a new element is added

    
});