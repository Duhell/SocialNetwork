$(document).ready(function() {
    $(document).on('click','.deleteBtn', function(e) {
        e.preventDefault();
        Alertism({
            alertHeading: "Are you sure to delete this?",
            alertHTML: `<p class="font-bold text-xs"> hello there </p>`,
            enableIcon: true,

        })
        // let post_id = $(this).siblings('.post_id').val();
        // let confirmation = confirm('Are you sure to delete this?');

        // let currentPath = window.location.pathname;
        // let parts = currentPath.split('/');
        // let firstPart = parts[1];
        // if(confirmation){
        //     $.ajax({
        //         headers:{
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         },
        //         url: "/delete/" + post_id,
        //         type: 'DELETE',
        //         success: function(response) {
        //             if(firstPart == 'view'){
        //                 window.location.reload()
        //             }else{
        //                 updateOnDelete()
        //             }
        //             console.log(response.status);
        //         }
        //     });
        // }else{
        //     console.log('No changes')
        // }
    });
});

function updateOnDelete(){
    $.ajax({
        type: "GET",
        url: "/feeds",
        success:function(data) {
          $(".feeds").html(data);
        }
    });
}
