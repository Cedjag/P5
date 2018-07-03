$('.rating').on('click', 'i', function(){
  var id = $('.single').attr('data-id');
  var value = ($(this).parent().find('i').length) - $(this).index();

  if (Cookies.get('rated_'+id) == undefined) {
    $.ajax({
      url: "index.php?p=rating&id=" + id + "&value=" + value,
      type: "post",
      success: function (response) {               
        Cookies.set('rated_'+id, value);
        $(".rating").notify(
          "Thank you for your rating.", 
          "success",
          { position: "right" }
        );
      },
      error: function(jqXHR, textStatus, errorThrown) {
         console.log(textStatus, errorThrown);
      }
    });
  }
})