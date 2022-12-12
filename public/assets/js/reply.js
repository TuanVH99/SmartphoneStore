$(document).ready(function(){
        

    $(".post-container").delegate(".reply","click",function(){

        var well = $(this).parent().parent();
        var cid = $(this).attr("cid");
        var name = $(this).attr('name_a');
        var token = $(this).attr('token');
        var form = '<form method="POST" action="/replies"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+name+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Nhập câu trả lời" required></textarea></div><div class="form-group"><input class="btn btn-danger" value="Phản hồi" type="submit"></div></form>';
        well.find(".reply-form").html(form);



    });

    $(".post-container").delegate(".reply-to-reply","click",function(){
        var well = $(this).parent().parent();
        var cid = $(this).attr("rid");
        var rname = $(this).attr("rname");
        var token = $(this).attr("token")
        var form = '<form method="Post" action="/replies"><input type="hidden" name="_token" value="'+token+'"><input type="hidden" name="comment_id" value="'+ cid +'"><input type="hidden" name="name" value="'+rname+'"><div class="form-group"><textarea class="form-control" name="reply" placeholder="Nhập câu trả lời" > </textarea> </div> <div class="form-group"> <input class="btn btn-danger" value="Phản hồi" type="submit"></div></form>';
        well.find(".reply-to-reply-form").html(form);
    });

}); 