$(document).ready(function(){
    let postID = null;
    $(document).on('click','[data-modal-target="commentModal"]',function(){
        let post_id = $(this).data('post_id');
        postID = post_id
        $('#commentsContainer ul').empty()
        $('#commentsContainer ul').append(`<li> Loading... </li>`)
        requestComments(post_id)
    })

    $(document).on('submit','#commentModal form',function(e){
        e.preventDefault();
        let commentContent = $(this).find('input[name="comment"]').val();
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/comments',
            type: 'POST',
            data: {
                post_id : postID,
                content: commentContent
            },
            success:function(){
                requestComments(postID)
                $('#commentModal form input[name="comment"]').val('');
            }
        })
    })
})

function requestComments(id){

    $.ajax({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: `/comments/${id}`,
        type: `GET`,
        success: function(comments){

            if(comments.length == 0){
                $('#commentsContainer ul').empty()
                $('#commentsContainer ul').append('<li> No comments </li>')
            }else{
                $('#commentsContainer ul').empty()
                $.each(comments,function(i,comment){
                    $('#commentsContainer ul').append(data(`${comment.user.firstname} ${comment.user.lastname}`,comment.comment,comment.user.id, moment(comment.created_at).fromNow()))
                })
            }

        }
    })
}


function data(owner,msg,id,time){
    return `<li class="mb-3 border-b-2 py-2">
    <div class="flex justify-between space-x-4 ">
        <div class=" text-sm">
            <a href="/view/id=${id} " class="font-medium"> ${owner} </a>
            <div class="text-xs text-gray-500">${msg}</div>
        </div>
        <span style="font-size:11px;" class="italic font-normal">${time}</span>
    </div>

</li>`
}
