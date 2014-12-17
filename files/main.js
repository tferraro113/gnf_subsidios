jQuery(document).ready(function($) {
    $('a[rel="tooltip"]').tooltip();

    // slide Home
    if ($('.flexslider').length){
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: false,
                pauseOnAction: false,
                itemMargin: 0
            });
        });
    }

    // checkout.topcart
    $('#block-cart-header').superfish({
        autoArrows: false,
        animation: {opacity: 'show', height: 'show'},
        speed: 'fast',
        delay: 500
    });

    // product_view tabs
    if ($('#tabs-products').length){
        $('#tabs-products a').click(function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    }
    
    // fancybox
    if ($(".fancybox").length){
        $(".fancybox").fancybox({
            tpl: {
                closeBtn : '<a title="Cerrar" class="fancybox-item fancybox-close" href="javascript:;"></a>'
            }
        });
    }

        $('#region_id').change(function() {

                $region = $('#region_id').val();

                var select = document.getElementById('city_id');
                select.options.length = 0; // clear out existing items

                $route = 'localidades.php?id='+ $region;

                $.get( $route , function( data ) {
                  $( "#city_id" ).html( data );
            
                });


               


        });


});

