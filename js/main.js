
$( document ).ready(function() {
    console.log( "ready!" );

$("#signindrop" ).hide();
$("#btn-open" ).hide();
$(".videoHeader" ).hide();


});

$( ".logotext" ).click(function() {
  $( ".videoHeader" ).fadeIn( 5000, function() {
    // Animation complete.
    $(".dragon" ).fadeOut();
  });
});


$( "#sign-in" ).click(function() {
  $( "#signindrop" ).toggle( "slow", function() {
    // Animation complete.
  });
});

$( "#sign-Up" ).click(function() {
  $( "#btn-open" ).toggle( "slow", function() {
    // Animation complete.
  });
});