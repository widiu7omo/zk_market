// jquery ready start
$(document).ready(function() {
	// jQuery code

///// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });


    $("[data-trigger]").on("click", function(e){
        e.preventDefault();
        e.stopPropagation();
        var offcanvas_id =  $(this).attr('data-trigger');
        $(offcanvas_id).toggleClass("show");
        $(".screen-overlay").toggleClass("show");
        $('body').toggleClass("offcanvas-active");
    }); 
    
    $(".btn-close, .screen-overlay").click(function(e){
      e.preventDefault();
        $(".offcanvas").removeClass("show");
        $(".screen-overlay").removeClass("show");
        $("body").removeClass("offcanvas-active");
    }); 


    $('.box-selection input').change(function () {
        item = $(this).closest('.box-selection');
        if ($(this).is(':checked')) {
            item.siblings().removeClass('active');
            item.addClass('active');
          // item.find('.radio').find('span').text('Add');
        } else {
            item.removeClass('active');
            // item.find('.radio').find('span').text('Unselect');
        }
    });


}); 
// jquery end

