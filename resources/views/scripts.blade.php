@if(App::isLocale('ar'))
<script src="/web/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="/web/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/web/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/web/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="/web/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="/web/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="/web/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="/web/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="/web/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="/web/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="/web/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="/web/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="/web/plugins/tagcomplete/tagcomplete.js"></script><!-- TAGCOMPLETE -->
<script src="/web/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="/web/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="/web/js/dz.ajax.js"></script><!-- CONTACT JS  -->
@else
<script src="/web/en/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="/web/en/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/web/en/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="/web/en/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="/web/en/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="/web/en/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="/web/en/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="/web/en/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="/web/en/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="/web/en/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="/web/en/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="/web/en/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="/web/en/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="/web/en/js/dz.carousel.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="/web/en/js/dz.ajax.js"></script><!-- CONTACT JS  -->

@endif
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor-ck-en' );
    CKEDITOR.replace( 'editor-ck-ar' );
</script>
<script>
    $(function(){
        var data = [
            'css',
            'html',
            'php',
            'jquery'
        ];
    
        $(".tags_input").tagComplete({
            keylimit: 1,
            hide: false,
            autocomplete: {
                data: data
            }
        });
    });
    
    jQuery(document).ready(function(){
        jQuery('.nav-link').on('click',function(){
            jQuery('.nav-link').removeClass('active');
            jQuery(this).addClass('active');
        });
    
    });
    </script>
    @stack('scripts')