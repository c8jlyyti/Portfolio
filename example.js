$(document).ready( function() {
  // We dynamically add some nav buttons
  //var prevNext = '<div id="album-nav"><button class="prev">&laquo; Edellinen</button>' +
  //               ' <button class="next">Seuraava &raquo;</button></div>';

  var prevNext = '<div id="album-nav"><button class="prev">&laquo;</button>' +
  '<span> Selaa albumeja </span><button class="next">&raquo;</button></div>';

  var prev = '<div id="album-nav"><button class="prev">&laquo;</button>';
  var next = '<button class="next">&raquo;</button></div>';
  
  //$(prev).insertBefore("#albumname");
  //$(next).insertAfter("#albumname");
  $(prevNext).insertAfter("#hgal");
  //$(prevNext).insertAfter('.album:last');
  // Add cycling between albums
  $('.album').wrapAll('<div id="photo-albums"></div>');
  $('#photo-albums').cycle({ 
    fx:     'turnDown', 
    speed:  800, 
    timeout: 0, 
    next:   '.next', 
    prev:   '.prev' 
  });
  $('.prev,.next').click(function () {
    $('#intro:visible').slideToggle();
  });
  // Add lightbox to images
  $('.album a').lightBox();
}); 