function getRandomSize(min, max) {
  return Math.round(Math.random() * (max - min) + min);
}

var allImages = "";
for (var i = 0; i < 105; i++) {

    var width = getRandomSize(200, 400);
    var height =  getRandomSize(200, 400);
    allImages += '<img src="https://placekitten.com/'+width+'/'+height+'" alt="pretty kitty">';

}

$('#photos').append(allImages);

// $('.grid').packery({
//   // options
//   itemSelector: '.grid-item',
//   gutter: 10
// });