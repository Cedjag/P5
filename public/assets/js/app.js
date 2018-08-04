jQuery(document).ready(function($){


  $('.return').click(function(e){

    e.preventDefault();
    var $form = $('#form-comment');
    var $comment = $('#comment-');
    var $commentaires = $('#comments');


    $form.find('h4').text('Publier un commentaire');
    $('#parent_id').val(0);
    $commentaires.after($form);
    $form.find('span').text('');

  })

  $('.showComments').click(function(e){

    e.preventDefault();
    var $bad = $('#badComments');
    var $gestion = $('.gestionPanel');
    var $lien = $('.showComments');
    var $navPost = $('#navPost');
    var $navComments = $('#navComments');


    $bad.removeClass("noDisplay").addClass("display");
    $navPost.removeClass("active");
    $navComments.addClass("active");
    $gestion.addClass("noDisplay");

  })

  $('.showPost').click(function(e){

    e.preventDefault();
    var $bad = $('#badComments');
    var $gestion = $('.gestionPanel');
    var $lien = $('.showComments');
    var $navPost = $('#navItem');


    $gestion.removeClass("noDisplay").addClass("display");
    $navComments.removeClass("active");
    $navPost.addClass("active");
    $bad.removeClass("display").addClass("noDisplay");

  })

});
