(function($) {
  'use strict';
  $(function() {
    // Trigger hidden file input click when browsing
    $(document).on('click', '.file-upload-browse', function() {
      var file = $(this).closest('.form-group, .row, div').find('.file-upload-default');
      if (!file.length) {
        file = $(this).parent().parent().parent().find('.file-upload-default');
      }
      file.trigger('click');
    });

    // Display filename and render live image preview
    $(document).on('change', '.file-upload-default', function() {
      var $input = $(this);
      var files = this.files;
      var fileVal = $input.val().replace(/C:\\fakepath\\/i, '');
      
      $input.closest('.form-group, .row, div').find('.file-upload-info').val(fileVal);

      if (files && files[0] && files[0].type.match('image.*')) {
        var reader = new FileReader();
        var $container = $input.closest('.form-group, .row, .card-body, form');
        var $previewImg = $container.find('#previewbanner1, .image-preview-target, .upload-preview-box img, #previewbanner_link img');
        var $previewLink = $container.find('#previewbanner_link, .image-preview-link');

        reader.onload = function(e) {
          if ($previewImg.length) {
            $previewImg.attr('src', e.target.result);
          }
          if ($previewLink.length) {
            $previewLink.attr('href', e.target.result);
          }
        };
        reader.readAsDataURL(files[0]);
      }
    });
  });
})(jQuery);