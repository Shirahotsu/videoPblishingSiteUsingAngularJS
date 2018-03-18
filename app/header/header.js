$('#profileBtn').on('click', function () {
  $('.dropdown-content').toggleClass('show').focus();
});

$('.dropdown-content').on('focusout', function () {
  $(this).removeClass('.show');
});
