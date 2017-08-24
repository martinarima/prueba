var lightbox = 0;

$('.well img').click(function(){
  if (lightbox==0) {
      lightbox+=1;
      $(this).attr('id', 'imgactive');
      $('.lightbox').show();
      }
});

$('.lightbox').click(function(){
  if (lightbox==1) {
      lightbox-=1;
      $('.well img').removeAttr('id', 'imgactive');
      $('.lightbox').fadeOut();
      } 
});
