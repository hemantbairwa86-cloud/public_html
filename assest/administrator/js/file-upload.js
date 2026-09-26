(function($) {
  'use strict';
  $(function() {
    // Trigger hidden file input click when browsing
    $(document).on('click', '.file-upload-browse', function() {
      var file = $(this).closest('.form-group, .row, div').find('.file-upload-default');
      if (!file.length) {
        file = $(this).closest('.row, .card-body, form').find('.file-upload-default');
      }
      file.trigger('click');
    });

    // Display filename and render live image preview for single & multi file uploads
    $(document).on('change', '.file-upload-default', function() {
      var $input = $(this);
      var files = this.files;
      if (!files || !files.length) return;

      var fileNames = [];
      for (var i = 0; i < files.length; i++) {
        fileNames.push(files[i].name);
      }
      var fileVal = fileNames.join(', ');
      $input.closest('.form-group, .row, div').find('.file-upload-info').val(fileVal);

      var $container = $input.closest('.form-group, .row, .card-body, form');
      
      // Look for multi-file preview container or create #new_file_previews
      if ($input.is('[multiple]')) {
        var $multiPreviewContainer = $('#new_file_previews, #selected_images_preview, .live-image-preview-wrapper');
        if (!$multiPreviewContainer.length) {
          if (!$('#new_file_previews').length) {
            $input.closest('.form-group').after('<div class="row mt-3 mb-3" id="new_file_previews"></div>');
          }
          $multiPreviewContainer = $('#new_file_previews');
        }

        $multiPreviewContainer.empty();
        $.each(files, function(index, file) {
          if (file.type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function(e) {
              var fileSize = (file.size / 1024).toFixed(1) + ' KB';
              var previewHtml = '<div class="col-6 col-sm-4 col-md-3 mb-3 new-preview-card">' +
                '<div class="preview-card-item text-center">' +
                  '<span class="preview-badge">Selected New</span>' +
                  '<div class="preview-img-wrapper">' +
                    '<a href="' + e.target.result + '" target="_blank" title="Click to view ' + file.name + '">' +
                      '<img src="' + e.target.result + '" alt="' + file.name + '" />' +
                    '</a>' +
                  '</div>' +
                  '<div class="preview-details">' +
                    '<div class="preview-filename" title="' + file.name + '">' + file.name + '</div>' +
                    '<div class="preview-filesize">' + fileSize + '</div>' +
                  '</div>' +
                '</div>' +
              '</div>';
              $multiPreviewContainer.append(previewHtml);
            };
            reader.readAsDataURL(file);
          }
        });
      } else if (files[0] && files[0].type.match('image.*')) {
        // Single File Upload Preview
        var $previewImg = $container.find('#previewbanner1, .image-preview-target, #previewbanner_link img');
        var $previewLink = $container.find('#previewbanner_link, .image-preview-link');
        var singleReader = new FileReader();
        singleReader.onload = function(e) {
          if ($previewImg.length) {
            $previewImg.attr('src', e.target.result);
          }
          if ($previewLink.length) {
            $previewLink.attr('href', e.target.result);
          }
          var $singleBox = $input.closest('.form-group, .row').find('.upload-preview-box img');
          if ($singleBox.length) {
            $singleBox.attr('src', e.target.result);
          }
        };
        singleReader.readAsDataURL(files[0]);
      }
    });
  });
})(jQuery);