$(document).ready(function(){
    var count = 1;

    addQuestion(count);
    addAnswer(count);

    function addQuestion(count)
    {
        var id = randomString(8, '#');
        var clone = $(createQuestionForm( id, count ));
        
        $('.answerContainer').append(clone);
    }

    function createQuestionForm(id, count)
    {
        question = '<tr>';
        question += '<td><label for="'+id+'">Question</label><input type="text" name="question[]" data-id="'+id+'" id="'+id+'" class="form-control" placeholder="Put your question"/></td>';

        if(count > 1)
        {
            question += '<td><button type="button" name="removeQuestion" id="removeQuestion" class="btn btn-rounded btn-danger remove">Remove</button></td></tr>';
            $('.answerContainer').append(question);
        }
        else
        {   
            question += '<td><button type="button" name="addQuestion" id="addQuestion" class="btn btn-rounded btn-success">Add</button></td></tr>';
            $('.answerContainer').append(question);
        }

        addAnswer(1, id);
    }

    function addAnswer(number, parent_id)
    {
        html = '<tr>';
        html += '<td><input type="text" name="choice['+parent_id+'][]" class="form-control" placeholder="Put your answer"/></td>';
        
        if(number > 1)
        {
            html += '<td><button type="button" name="remove" id="remove" class="btn btn-rounded btn-danger remove">Remove</button></td></tr>';
            $('.answerContainer').append(html);
        }
        else
        {   
            html += '<td><button type="button" name="add" id="add" class="btn btn-rounded btn-success">Add</button></td></tr>';
            $('.answerContainer').append(html);
        }
    }

    $(document).on('click', '#add', function(){
        count++;
        
        var tr = $('#user_table tr input:first').filter(function () {
            return this.name === 'question[]' || $(this).attr('name') === 'question[]';
        }).closest('tr');

        console.log(tr);

        addAnswer(count);
    });

    $(document).on('click', '#remove', function(){
        count--;
        $(this).closest("tr").remove();
    });

    $(document).on('click', '#addQuestion', function(){
        count++;
        addQuestion(count);
    });

    $(document).on('click', '#removeQuestion', function(){
        count--;
        $(this).closest("tr").remove();
    });

    $('#dynamic_form').on('submit', function(event){
       event.preventDefault();
       $.ajax({
           url:'create',
           method:'post',
           data:$(this).serialize(),
           dataType:'json',
           beforeSend:function(){
               $('#save').attr('disabled','disabled');
           },
           success:function(data)
           {
               if(data.error)
               {
                   var error_html = '';
                   for(var count = 0; count < data.error.length; count++)
                   {
                       error_html += '<p>'+data.error[count]+'</p>';
                   }
                   $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
               }
               else
               {
                   addAnswer(1);
                   $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
               }
               $('#save').attr('disabled', false);
           }
       })
    });

    function randomString(length, chars) {
        var mask = '';
        if (chars.indexOf('a') > -1) mask += 'abcdefghijklmnopqrstuvwxyz';
        if (chars.indexOf('A') > -1) mask += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        if (chars.indexOf('#') > -1) mask += '123456789';
        if (chars.indexOf('!') > -1) mask += '~`!@#$%^&*()_+-={}[]:";\'<>?,./|\\';
        var result = '';
        for (var i = length; i > 0; --i) result += mask[Math.round(Math.random() * (mask.length - 1))];
        return result;
    }

});