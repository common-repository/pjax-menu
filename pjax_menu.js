(function($){
  // TODO: adjust this selector based on the available menus
  var menuLinkSelector = '.menu a';

  $(document).ready(function() {
    $(document).pjax(menuLinkSelector, '#content');
  });
})(jQuery);
