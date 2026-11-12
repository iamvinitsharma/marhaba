/* Brand Details meta box: media pickers and the product-group repeater. */
(function ($) {
  var $box = $('#marhaba-brand');

  // Media picker
  $box.on('click', '.mb-image__pick', function (e) {
    e.preventDefault();
    var $wrap = $(this).closest('.mb-image');
    var frame = wp.media({ title: 'Choose image', library: { type: 'image' }, multiple: false });
    frame.on('select', function () {
      var url = frame.state().get('selection').first().toJSON().url;
      $wrap.find('.mb-image__url').val(url).trigger('change');
    });
    frame.open();
  });
  $box.on('click', '.mb-image__clear', function (e) {
    e.preventDefault();
    $(this).closest('.mb-image').find('.mb-image__url').val('').trigger('change');
  });
  $box.on('change input', '.mb-image__url', function () {
    var url = $(this).val();
    $(this).siblings('.mb-image__preview').html(url ? '<img src="' + $('<div>').text(url).html() + '" alt="">' : '');
  });

  // PDF picker
  $box.on('click', '.mb-file__pick', function (e) {
    e.preventDefault();
    var $wrap = $(this).closest('.mb-file');
    var frame = wp.media({ title: 'Choose PDF', library: { type: 'application/pdf' }, multiple: false, button: { text: 'Use this PDF' } });
    frame.on('select', function () {
      var url = frame.state().get('selection').first().toJSON().url;
      $wrap.find('.mb-file__url').val(url).trigger('change');
    });
    frame.open();
  });
  $box.on('click', '.mb-file__clear', function (e) {
    e.preventDefault();
    $(this).closest('.mb-file').find('.mb-file__url').val('').trigger('change');
  });
  $box.on('change input', '.mb-file__url', function () {
    var url = $(this).val();
    $(this).siblings('.mb-file__view').attr('href', url).prop('hidden', !url);
  });

  // Repeater
  var $groups = $box.find('.mb-groups');
  $box.on('click', '.mb-groups__add', function (e) {
    e.preventDefault();
    var next = parseInt($groups.attr('data-next'), 10) || 0;
    $groups.append($('#tmpl-mb-group').html().replace(/__i__/g, next));
    $groups.attr('data-next', next + 1);
  });
  $box.on('click', '.mb-group__remove', function (e) {
    e.preventDefault();
    $(this).closest('.mb-group').remove();
  });
  if ($.fn.sortable) {
    $groups.sortable({ handle: '.mb-group__handle', axis: 'y' });
  }
})(jQuery);
