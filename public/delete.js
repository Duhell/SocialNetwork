$(document).ready(function() {
    $(document).on('click','.deleteBtn', function(e) {
        e.preventDefault();
        let post_id = $(this).siblings('.post_id').val();
        swal({
            text: "Are you sure you want to delete this?",
            buttons:{
                cancel: true,
                confirm: true
            }
        }).then(willDelete => {
            if(willDelete){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "/delete/" + post_id,
                    type: 'DELETE',
                    success: function(response) {
                        updateOnDelete()
                        console.log(response.status);
                    }
                });
            }
        })
    });
});

function updateOnDelete(){
    $.ajax({
        type: "GET",
        url: "/feeds",
        success:function(data) {
          $(".feeds").html(data);
          initFlowbite();
        }
    });
}
