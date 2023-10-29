
$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() == $(document).height()) {
        updateOnPost()
    }
  });

//Update the feeds every 6 seconds
function updateFeedsInterval() {
    setInterval(function() {
        updateUserStatus();
    },6000);
  }

  // Updating the active status

  function updateUserStatus(){
    $.ajax({
        url: '/updateUserStatus',
        success:function(data){
            $('#activeUsers').html(data)
            let total = $('#activeUsers').find('li').length
            $('#totalActiveUsers').text(`(${total} ${total > 1 ? 'users':'user'})`)
        }
    })
  }

  // Updating feeds after creating a post
  function updateOnPost(){
    $.ajax({
        type: "GET",
        url: "/feeds",
        success:function(data) {
          $(".feeds").html(data);
          initFlowbite();
        }
      });
  }

  // Live Search
  $(document).ready(function(){
    $('#searchbar').on('input',function(){
        $('#searchResult_container').css('display','block')
        let inputVal = $(this).val();
        if(inputVal == ""){
            $('#searchResult_container').css('display','none');
            $('#resultList').html('');
        }else{
            $.ajax({
            url: '/search_user',
            type: 'GET',
            data: {search:inputVal},
            success: function(response){
                $('#resultList').html(response);
            }
        })
        }
    })
})

// Like Feature
$(document).ready(function(){
    $('body').on('click','.likeBTN',function(){
        let getPostId = $(this).data('post_id');
        let button = $(this);
        $.ajax({
            url: '/like/'+ getPostId,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
            // Update the like count on the page.
            button.find('span').text(`${response.likeCounts} ${response.likeCounts > 1 ? 'Likes':'Like'}`);
            updateOnPost()
        }
        })
    })
})

// Dislike Feature
$(document).ready(function(){
    $('body').on('click','.dislikeBTN',function(){
        let getPostId = $(this).data('post_id');
        let button = $(this);
        $.ajax({
            url: '/dislike/'+ getPostId,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
            // Update the dislike count on the page.
            button.find('span').text(`${response.dislikeCounts} ${response.dislikeCounts > 1 ? "Dislikes":'Dislike'}`);
            updateOnPost();

        }
        })
    })
})


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
                updateOnPost();
                console.log(response.successPost);
            }
        });
    });
});

updateFeedsInterval()
updateUserStatus()
