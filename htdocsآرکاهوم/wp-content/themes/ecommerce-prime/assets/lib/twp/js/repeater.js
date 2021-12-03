jQuery(document).ready(function($) {

    // Show Title Sections While Loadiong.
    $('.ecommerce-prime-repeater-field-control').each(function(){

    	var title = $(this).find('.home-section-type option:selected').text();
    	$(this).find('.ecommerce-prime-repeater-field-title').text(title);
        var title_key = $(this).find('.home-section-type option:selected').val();

        if( title_key == 'latest-post' || title_key == 'subscribe' ){

            $(this).find('.ecommerce-prime-repeater-field-remove').text('');
            $(this).find('.home-section-type select option[value="slide-banner"]').remove();
            $(this).find('.home-section-type select option[value="product-category"]').remove();
            $(this).find('.home-section-type select option[value="tab-block-1"]').remove();
            $(this).find('.home-section-type select option[value="carousel"]').remove();
            $(this).find('.home-section-type select option[value="tab-block-2"]').remove();
            $(this).find('.home-section-type select option[value="cta"]').remove();
            $(this).find('.home-section-type select option[value="best-deal-slide"]').remove();
            $(this).find('.home-section-type select option[value="latest-news"]').remove();
            $(this).find('.home-section-type select option[value="testimonial"]').remove();
            $(this).find('.home-section-type select option[value="client"]').remove();
            $(this).find('.home-section-type select option[value="advertise-area"]').remove();

        }else{
            $(this).find('.home-section-type select option[value="subscribe"]').remove();
            $(this).find('.home-section-type select option[value="latest-post"]').remove();

        }

        if( title_key == 'latest-post' ){
            $(this).find('.home-section-type select option[value="subscribe"]').remove();
        }

        if( title_key == 'subscribe' ){
            $(this).find('.home-section-type select option[value="latest-post"]').remove();
        }


        $(this).find('.home-repeater-fields-hs').hide();
        $(this).find('.'+title_key+'-fields').show();



        if( title_key == 'slide-banner' ){

            var title1 = $(this).find('.home-ac-banner-type option:selected').val();

            if( title1 == 'page' ){

                $(this).find('.prdct-1-ac').hide();
                $(this).find('.prdct-2-ac').hide();
                $(this).find('.prdct-3-ac').hide();
                $(this).find('.post-category-ac').hide();

            }else if( title1 == 'product' ){

                $(this).find('.post-category-ac').hide();
                $(this).find('.banner-lide-page-1-ac').hide();
                $(this).find('.banner-lide-page-2-ac').hide();
                $(this).find('.banner-lide-page-3-ac').hide();
                $(this).find('.banner-slide-link-1-ac').hide();
                $(this).find('.banner-slide-link-2-ac').hide();
                $(this).find('.banner-slide-link-3-ac').hide();

            }else{

                $(this).find('.post-category-ac').show();
                $(this).find('.banner-lide-page-1-ac').hide();
                $(this).find('.banner-lide-page-2-ac').hide();
                $(this).find('.banner-lide-page-3-ac').hide();
                $(this).find('.prdct-1-ac').hide();
                $(this).find('.prdct-2-ac').hide();
                $(this).find('.prdct-3-ac').hide();

            }

        }

        if( title_key == 'cta' ){

            var title2 = $(this).find('.cta-type-ac option:selected').val();

            if( title2 == 'custom' ){

                $(this).find('.banner-lide-page-1-ac').hide();
                $(this).find('.banner-lide-page-2-ac').hide();
                $(this).find('.banner-lide-page-3-ac').hide();

            }else{

                $(this).find('.cta-title-ac').hide();
                $(this).find('.cta-sub-title-ac').hide();
                $(this).find('.cta-bg-ac').hide();

            }

        }

        if( title_key == 'testimonial' ){

            var title3 = $(this).find('.testimonial-content-type-ac option:selected').val();

            if( title3 == 'post-cat' ){

                $(this).find('.banner-lide-page-1-ac').hide();
                $(this).find('.banner-lide-page-2-ac').hide();
                $(this).find('.banner-lide-page-3-ac').hide();
                $(this).find('.banner-lide-page-4-ac').hide();

            }else if( title3 == 'page'){

                $(this).find('.post-category-ac').hide();

            }else{
                $(this).find('.banner-lide-page-1-ac').hide();
                $(this).find('.banner-lide-page-2-ac').hide();
                $(this).find('.banner-lide-page-3-ac').hide();
                $(this).find('.banner-lide-page-4-ac').hide();
                $(this).find('.post-category-ac').hide();
            }

        }

        if( title_key == 'client' ){

            var title4 = $(this).find('.slider-client-type-ac option:selected').val();

            if( title4 == 'page' ){

                $(this).find('.post-category-ac').hide();

            }else{
                $(this).find('.banner-lide-page-1-ac').hide();
                $(this).find('.banner-lide-page-2-ac').hide();
                $(this).find('.banner-lide-page-3-ac').hide();
                $(this).find('.banner-lide-page-4-ac').hide();
                $(this).find('.banner-lide-page-5-ac').hide();
                $(this).find('.banner-lide-page-6-ac').hide();
                $(this).find('.banner-lide-page-7-ac').hide();
                $(this).find('.banner-lide-page-8-ac').hide();
                $(this).find('.banner-lide-page-9-ac').hide();
                $(this).find('.banner-lide-page-10-ac').hide();
            }

        }

        if( title_key == 'featured-posts' ){

            var title4 = $(this).find('.featured-posts-type-ac option:selected').val();

            if( title4 == 'product' ||  title4 == '' ){

                $(this).find('.featured-posts-category-ac').hide();
                $(this).find('.featured-posts-product-ac').show();

            }else{
                $(this).find('.featured-posts-product-ac').hide();
                $(this).find('.featured-posts-category-ac').show();
            }

        }

        if( title_key == 'lead-image-area' ){

            var lead_type = $(this).find('.lead-image-area-ac option:selected').val();

            if( lead_type == 'page' ||  lead_type == '' ){

                $(this).find('.lead-image-area-ac-custom').hide();
                $(this).find('.lead-image-area-ac-page').show();

            }else{
                
                $(this).find('.lead-image-area-ac-custom').show();
                $(this).find('.lead-image-area-ac-page').hide();

            }

        }
       
    });

    // Show Title After Secect Section Type.
    $('.home-section-type select').change(function(){

    	var optionSelected = $("option:selected", this);
     	var textSelected   = optionSelected.text();
        var title_key = optionSelected.val();

        $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-repeater-fields-hs').hide();
        $(this).closest('.ecommerce-prime-repeater-field-control').find('.'+title_key+'-fields').show();

    	$(this).closest('.ecommerce-prime-repeater-field-control').find('.ecommerce-prime-repeater-field-title').text( textSelected );

        if( title_key == 'slide-banner' ){

            var title1 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-ac-banner-type option:selected').val();

            if( title1 == 'page' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

            }else if( title1 == 'product' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').hide();

            }else{

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-3-ac').hide();


            }

        }

        if( title_key == 'cta' ){

            var title2 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-type-ac option:selected').val();

            if( title2 == 'custom' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();

            }else{

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-title-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-sub-title-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-bg-ac').hide();

            }

        }

        if( title_key == 'testimonial' ){

            var title3 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.testimonial-content-type-ac option:selected').val();

            if( title3 == 'post-cat' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();

            }else if( title3 == 'page'){

                $(this).find('.post-category-ac').hide();

            }else{
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
            }

        }

        if( title_key == 'client' ){

            var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.slider-client-type-ac option:selected').val();

            if( title4 == 'page' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

            }else{
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-5-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-6-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-7-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-8-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-9-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-10-ac').hide();
            }

        }

        if( title_key == 'featured-posts' ){

            var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-type-ac option:selected').val();

            if( title4 == 'product' ||  title4 == '' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-category-acc').hide();

            }else{
             
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-product-ac').hide();

            }

        }

        if( title_key == 'lead-image-area' ){

            var lead_type = $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac option:selected').val();

            if( lead_type == 'page' ||  lead_type == '' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').show();

            }else{
             
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').hide();

            }

        }

    });

    // Show Title After Secect Section Type.
    $('.home-ac-banner-type select, .cta-type-ac select, .testimonial-content-type-ac select, .slider-client-type-ac select, .featured-posts-type-ac select, .lead-image-area-ac select').change(function(){

        var title_key = $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-section-type select option:selected').val();

        if( title_key == 'slide-banner' ){

            var title1 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-ac-banner-type option:selected').val();

            if( title1 == 'page' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-3-ac').show();

            }else if( title1 == 'product' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-3-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').show();

            }else{
                
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();

            }

        }

        if( title_key == 'cta' ){

            var title2 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-type-ac option:selected').val();

            if( title2 == 'custom' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-title-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-sub-title-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-label-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-link-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-bg-ac').show();

            }else{

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-title-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-sub-title-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-bg-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-label-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-link-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();
            }

        }

        if( title_key == 'testimonial' ){

            var title3 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.testimonial-content-type-ac option:selected').val();

            if( title3 == 'post-cat' ){
                
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();

            }else if( title3 == 'page'){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').show();

            }else{
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
            }

        }

        if( title_key == 'client' ){

            var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.slider-client-type-ac option:selected').val();

            if( title4 == 'page' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-5-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-6-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-7-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-8-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-9-ac').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-10-ac').show();

            }else{
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-5-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-6-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-7-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-8-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-9-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-10-ac').hide();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();
            }

        }

        if( title_key == 'featured-posts' ){

            var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-type-ac option:selected').val();

            if(  title4 == 'product' ||  title4 == '' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-category-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-product-ac').show();

            }else{
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-product-ac').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-category-ac').show();
            }

        }

        if( title_key == 'lead-image-area' ){

            var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac option:selected').val();

            if(  title4 == 'page' ||  title4 == '' ){

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').show();

            }else{
                
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').show();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').hide();

            }

        }
        
    });

    // Save Value.
    function ecommerce_prime_refresh_repeater_values(){

        $(".ecommerce-prime-repeater-field-control-wrap").each(function(){
            
            var values = []; 
            var $this = $(this);
            
            $this.find(".ecommerce-prime-repeater-field-control").each(function(){
            var valueToPush = {};

            $(this).find('[data-name]').each(function(){
                var dataName = $(this).attr('data-name');
                var dataValue = $(this).val();
                valueToPush[dataName] = dataValue;
            });

            values.push(valueToPush);
            });

            $this.next('.ecommerce-prime-repeater-collector').val( JSON.stringify( values ) ).trigger('change');
        });

    }
    var appenditem = $(".ecommerce-prime-repeater-field-control:first").html();

    /*jshint -W065 */
    $('.twp-select-customizer select').each(function(){
        $(this).selectize();
    });

    $("body").on("click",'.ecommerce-prime-add-control-field', function(){

        var $this = $(this).parent();
        if(typeof $this != 'undefined') {

            var field = $('.ecommerce-prime-repeater-field-control-wrap').append('<li class="ecommerce-prime-repeater-field-control ui-sortable-handle twp-sortable-active extended">'+appenditem+'</li>');

            if(typeof field != 'undefined'){

                ecommerce_prime_refresh_repeater_values();
            }

            // Show Title After Secect Section Type.
            $('.home-section-type select').change(function(){
                var optionSelected = $("option:selected", this);
                var textSelected   = optionSelected.text();
                var title_key = optionSelected.val();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-repeater-fields-hs').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.'+title_key+'-fields').show();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.ecommerce-prime-repeater-field-title').text(textSelected);

            });

            $('.ecommerce-prime-repeater-field-control-wrap li:last-child').find('.home-repeater-fields-hs').hide();
            $('.ecommerce-prime-repeater-field-control-wrap li:last-child').find('.slide-banner-fields').show();

            $('.ecommerce-prime-repeater-field-control-wrap li').removeClass('twp-sortable-active');
            $('.ecommerce-prime-repeater-field-control-wrap li:last-child').addClass('twp-sortable-active');
            $('.ecommerce-prime-repeater-field-control-wrap li:last-child .ecommerce-prime-repeater-fields').addClass('twp-sortable-active extended');
            $('.ecommerce-prime-repeater-field-control-wrap li:last-child .ecommerce-prime-repeater-fields').show();

            $('.ecommerce-prime-repeater-field-control.twp-sortable-active .title-rep-wrap').click(function(){
                $(this).next('.ecommerce-prime-repeater-fields').slideToggle();
            }); 

            $('.ecommerce-prime-repeater-field-control-wrap li:last-child .ecommerce-prime-repeater-field-title').text(ecommerce_prime_repeater.new_section);
            $this.find(".ecommerce-prime-repeater-field-control:last .home-section-type select").empty().append( ecommerce_prime_repeater.optionns);

            /*jshint -W065 */
            $('.twp-sortable-active .twp-select-customizer select').each(function(){
                $(this).selectize();
            });

            var bannertype = $('.twp-sortable-active').find('.home-ac-banner-type option:selected').val();

            if( bannertype == 'category' ){

                $('.twp-sortable-active .prdct-1-ac').hide();
                $('.twp-sortable-active .prdct-2-ac').hide();
                $('.twp-sortable-active .prdct-3-ac').hide();
                $('.twp-sortable-active .banner-lide-page-1-ac').hide();
                $('.twp-sortable-active .banner-lide-page-2-ac').hide();
                $('.twp-sortable-active .banner-lide-page-3-ac').hide();

            }else if( bannertype == 'product' ){

                $('.twp-sortable-active .post-category-ac').hide();
                $('.twp-sortable-active .banner-slide-link-1-ac').hide();
                $('.twp-sortable-active .banner-slide-link-2-ac').hide();
                $('.twp-sortable-active .banner-slide-link-3-ac').hide();
                $('.twp-sortable-active .banner-lide-page-1-ac').hide();
                $('.twp-sortable-active .banner-lide-page-2-ac').hide();
                $('.twp-sortable-active .banner-lide-page-3-ac').hide();

            }else{

                $('.twp-sortable-active .post-category-ac').hide();
                $('.twp-sortable-active .banner-lide-page-1-ac').show();
                $('.twp-sortable-active .banner-lide-page-2-ac').show();
                $('.twp-sortable-active .banner-lide-page-3-ac').show();
                $('.twp-sortable-active .prdct-1-ac').hide();
                $('.twp-sortable-active .prdct-2-ac').hide();
                $('.twp-sortable-active .prdct-3-ac').hide();

            }

            $('.home-ac-banner-type select, .cta-type-ac select, .testimonial-content-type-ac select, .slider-client-type-ac select, .featured-posts-type-ac select, .lead-image-area-ac select').change(function(){
                
                var title_key = $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-section-type select option:selected').val();

                if( title_key == 'slide-banner' ){

                    var title1 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-ac-banner-type option:selected').val();

                    if( title1 == 'page' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-3-ac').show();

                    }else if( title1 == 'product' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-3-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').show();

                    }else{
                        
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();

                    }

                }

                if( title_key == 'cta' ){

                    var title2 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-type-ac option:selected').val();

                    if( title2 == 'custom' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-title-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-sub-title-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-label-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-link-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-bg-ac').show();

                    }else{

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-title-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-sub-title-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-bg-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-label-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-button-link-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();

                    }

                }

                if( title_key == 'testimonial' ){

                    var title3 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.testimonial-content-type-ac option:selected').val();

                    if( title3 == 'post-cat' ){
                        
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();

                    }else if( title3 == 'page'){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').show('.banner-lide-page-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').show('.banner-lide-page-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').show('.banner-lide-page-3-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').show('.banner-lide-page-4-ac').show();

                    }else{
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
                    }

                }

                if( title_key == 'client' ){

                    var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.slider-client-type-ac option:selected').val();

                    if( title4 == 'page' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-5-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-6-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-7-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-8-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-9-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-10-ac').show();

                    }else{
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-5-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-6-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-7-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-8-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-9-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-10-ac').hide();

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();
                    }

                }

                if( title_key == 'featured-posts' ){

                    var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-type-ac option:selected').val();

                    if( title4 == 'product' ||  title4 == '' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-category-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-product-ac').show();


                    }else{

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-product-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-category-ac').show();

                    }

                }

                if( title_key == 'lead-image-area' ){

                    var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac option:selected').val();

                    if( title4 == 'page' ||  title4 == '' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').show();


                    }else{

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').show();

                    }

                }
                
            });

            // Show Title After Secect Section Type.
            $('.home-section-type select').change(function(){

                var optionSelected = $("option:selected", this);
                var textSelected   = optionSelected.text();
                var title_key = optionSelected.val();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-repeater-fields-hs').hide();
                $(this).closest('.ecommerce-prime-repeater-field-control').find('.'+title_key+'-fields').show();

                $(this).closest('.ecommerce-prime-repeater-field-control').find('.ecommerce-prime-repeater-field-title').text( textSelected );

                if( title_key == 'slide-banner' ){

                    var title1 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.home-ac-banner-type option:selected').val();

                    if( title1 == 'page' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                    }else if( title1 == 'product' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').hide();
                    }else{

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.prdct-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-slide-link-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.btn-lbl-3-ac').hide();


                    }

                }

                if( title_key == 'cta' ){

                    var title2 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-type-ac option:selected').val();

                    if( title2 == 'custom' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();

                    }else{

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-title-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-sub-title-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.cta-bg-ac').hide();

                    }

                }

                if( title_key == 'testimonial' ){

                    var title3 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.testimonial-content-type-ac option:selected').val();

                    if( title3 == 'post-cat' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();

                    }else if( title3 == 'page'){

                        $(this).find('.post-category-ac').hide();

                    }else{
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();
                    }

                }

                if( title_key == 'client' ){

                    var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.slider-client-type-ac option:selected').val();

                    if( title4 == 'page' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.post-category-ac').hide();

                    }else{
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-1-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-2-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-3-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-4-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-5-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-6-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-7-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-8-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-9-ac').hide();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.banner-lide-page-10-ac').hide();
                    }

                }

                if( title_key == 'featured-posts' ){

                    var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-type-ac option:selected').val();

                    if( title4 == 'product' ||  title4 == '' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-category-ac').hide();

                    }else{
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.featured-posts-product-ac').hide();
                    }

                }

                if( title_key == 'lead-image-area' ){

                    var title4 = $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac option:selected').val();

                    if( title4 == 'page' ||  title4 == '' ){

                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').hide();

                    }else{
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-custom').show();
                        $(this).closest('.ecommerce-prime-repeater-field-control').find('.lead-image-area-ac-page').hide();
                    }

                }

            });

        }
        return false;
    });
    
    $('.ecommerce-prime-repeater-field-control .title-rep-wrap').click(function(){
        $(this).next('.ecommerce-prime-repeater-fields').slideToggle().toggleClass('extended');
    });

    //MultiCheck box Control JS
    $( 'body' ).on( 'change', '.ecommerce-prime-type-multicategory input[type="checkbox"]' , function() {
        var checkbox_values = $( this ).parents( '.ecommerce-prime-type-multicategory' ).find( 'input[type="checkbox"]:checked' ).map(function(){
            return $( this ).val();
        }).get().join( ',' );
        $( this ).parents( '.ecommerce-prime-type-multicategory' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        ecommerce_prime_refresh_repeater_values();
    });

    //Checkbox Multiple Control
    $( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on( 'change', function() {
        checkbox_values = $( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
            function() {
                return this.value;
            }
        ).get().join( ',' );

        $( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
    });

    // ADD IMAGE LINK
    $('.customize-control-repeater').on( 'click', '.twp-img-upload-button', function( event ){
        event.preventDefault();

        var imgContainer = $(this).closest('.twp-img-fields-wrap').find( '.thumbnail-image'),
        placeholder = $(this).closest('.twp-img-fields-wrap').find( '.placeholder'),
        imgIdInput = $(this).siblings('.upload-id');

        // Create a new media frame
        frame = wp.media({
            title: ecommerce_prime_repeater.upload_image,
            button: {
            text: ecommerce_prime_repeater.use_imahe
            },
            multiple: false  // Set to true to allow multiple files to be selected
        });

        // When an image is selected in the media frame...
        frame.on( 'select', function() {

        // Get media attachment details from the frame state
        var attachment = frame.state().get('selection').first().toJSON();

        // Send the attachment URL to our custom image input field.
        imgContainer.html( '<img src="'+attachment.url+'" style="max-width:100%;"/>' );
        placeholder.addClass('hidden');

        // Send the attachment id to our hidden input
        imgIdInput.val( attachment.url ).trigger('change');

        });

        // Finally, open the modal on click
        frame.open();
    });
    // DELETE IMAGE LINK
    $('.customize-control-repeater').on( 'click', '.twp-img-delete-button', function( event ){

        event.preventDefault();
        var imgContainer = $(this).closest('.twp-img-fields-wrap').find( '.thumbnail-image'),
        placeholder = $(this).closest('.twp-img-fields-wrap').find( '.placeholder'),
        imgIdInput = $(this).siblings('.upload-id');

        // Clear out the preview image
        imgContainer.find('img').remove();
        placeholder.removeClass('hidden');

        // Delete the image id from the hidden input
        imgIdInput.val( '' ).trigger('change');

    });

    $("#customize-theme-controls").on("click", ".ecommerce-prime-repeater-field-remove",function(){
        if( typeof  $(this).parent() != 'undefined'){
            $(this).closest('.ecommerce-prime-repeater-field-control').slideUp('normal', function(){
                $(this).remove();
                ecommerce_prime_refresh_repeater_values();
            });
            
        }
        return false;
    });

    $('#customize-theme-controls').on('click', '.ecommerce-prime-repeater-field-close', function(){
        $(this).closest('.ecommerce-prime-repeater-fields').slideUp();
        $(this).closest('.ecommerce-prime-repeater-field-control').toggleClass('expanded');
    });

    /*Drag and drop to change order*/
    $(".ecommerce-prime-repeater-field-control-wrap").sortable({
        axis: 'y',
        orientation: "vertical",
        update: function( event, ui ) {
            ecommerce_prime_refresh_repeater_values();
        }
    });

    $("#customize-theme-controls").on('keyup change', '[data-name]',function(){
         ecommerce_prime_refresh_repeater_values();
         return false;
    });

    $("#customize-theme-controls").on('change', 'input[type="checkbox"][data-name]',function(){
        if($(this).is(":checked")){
            $(this).val('yes');
        }else{
            $(this).val('no');
        }
        ecommerce_prime_refresh_repeater_values();
        return false;
    });

});

