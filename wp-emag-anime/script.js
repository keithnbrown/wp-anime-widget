var image_field;
jQuery(function($){
  $(document).on('click', 'input.select-img1', function(evt){
    image_field = $(this).siblings('.img');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });
  $(document).on('click', 'input.select-img2', function(evt){
    image_field = $(this).siblings('.img');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });

  $('#rand1').on('change', function() {
    var isChecked = $(this).prop('checked'); // this will equate to either 'true' or 'false'...
    $('.ani1').attr('disabled', isChecked); // ...meaning that we can use its value to set the 'disabled' attribute 
  });

  window.send_to_editor = function(html) {
    imgurl = $('img', html).attr('src');
    image_field.val(imgurl);
    tb_remove();
  }
});
