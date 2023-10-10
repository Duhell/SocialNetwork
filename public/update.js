function updateFeeds() {
    setInterval(function() {
      $.ajax({
        type: "GET",
        url: "/feeds",
        success:function(data) {
          $(".feeds").html(data);
        }
      });
    },3000);
  }

  updateFeeds()
