
//Update the feeds every 6 seconds
function updateFeedsInterval() {
    setInterval(function() {
      $.ajax({
        type: "GET",
        url: "/feeds",
        success:function(data) {
          $(".feeds").html(data);
        }
      });
    },6000);
  }

  // Updating feeds after creating a post
  function updateOnPost(){
    $.ajax({
        type: "GET",
        url: "/feeds",
        success:function(data) {
          $(".feeds").html(data);
        }
      });
  }


  // For creating Post
  $(document).ready(function() {
    $('#submitPost').on('submit', function(e) {
        e.preventDefault();
        var message = $('[name=content_msg]').val();
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/feeds",
            type: 'POST',
            data: {
                content_msg: message
            },
            success: function(response) {
                $('[name=content_msg]').val('');
                updateOnPost()
                console.log(response.successPost);
            }
        });
    });
});

updateFeedsInterval()
