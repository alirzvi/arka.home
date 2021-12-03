(function ($) {

    var ajaxurl = ecommerce_prime_admin.ajax_url;
    var EcommercePrimeNonce = ecommerce_prime_admin.ajax_nonce;

    // Metabox Tab
    $('.metabox-navbar a').click(function (){
        var tabid = $(this).attr('id');
        $('.metabox-navbar a').removeClass('metabox-navbar-active');
        $(this).addClass('metabox-navbar-active');
        $('.theme-tab-content .metabox-content-wrap').hide();
        $('.theme-tab-content #'+tabid+'-content').show();
        $('.theme-tab-content .metabox-content-wrap').removeClass('metabox-content-wrap-active');
        $('.theme-tab-content #'+tabid+'-content').addClass('metabox-content-wrap-active');
    });

    // Dismiss notice
    $('.twp-custom-setup').click(function(){
        
        var data = {
            'action': 'ecommerce_prime_notice_dismiss',
            '_wpnonce': EcommercePrimeNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {

            $('.twp-ecommerce-prime-notice').hide();
            
        });

    });

    // Getting Start action
    $('.twp-install-active').click(function(){

        $(this).closest('.twp-ecommerce-prime-notice').addClass('theme-quick-installing');

        var data = {
            'action': 'ecommerce_prime_getting_started',
            '_wpnonce': EcommercePrimeNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {

            window.location.href = response+'&tab=getting-started';
            
        });

    });

    $('.required-plugin-details .twp-active-deactivate').click(function(){
        
        var id = $(this).closest('.ecommerce-prime-about-col').attr('id');

        $(this).addClass('twp-activating-plugin')
        var PluginName = $(this).closest('.required-plugin-details').find('h2').text();
        var PluginStatus = $(this).attr('plugin-status');
        var PluginFile = $(this).attr('plugin-file');
        var PluginFolder = $(this).attr('plugin-folder');
        var PluginSlug = $(this).attr('plugin-slug');
        var pluginClass = $(this).attr('plugin-class');

        var data = {
            'single': true,
            'PluginStatus': PluginStatus,
            'PluginFile': PluginFile,
            'PluginFolder': PluginFolder,
            'PluginSlug': PluginSlug,
            'PluginName': PluginName,
            'pluginClass': pluginClass,
            'action': 'ecommerce_prime_getting_started',
            '_wpnonce': EcommercePrimeNonce,
        };
 
        $.post(ajaxurl, data, function( response ) {

            var active = ecommerce_prime_admin.active
            var deactivate = ecommerce_prime_admin.deactivate
            $('#'+id+' .twp-active-deactivate').empty();

            if( response == 'Deactivated' ){
                
                $('#'+id+' .required-plugin-details').removeClass('required-plugin-active');
                $('#'+id+' .twp-active-deactivate').removeClass('twp-plugin-active');
                $('#'+id+' .twp-active-deactivate').addClass('twp-plugin-deactivate');
                $('#'+id+' .twp-active-deactivate').html(active);
                $('#'+id+' .twp-active-deactivate').attr('plugin-status','deactivate');

            }else if( response == 'Activated' ){
                
                $('#'+id+' .required-plugin-details').addClass('required-plugin-active');
                $('#'+id+' .twp-active-deactivate').removeClass('twp-plugin-deactivate');
                $('#'+id+' .twp-active-deactivate').addClass('twp-plugin-active');
                $('#'+id+' .twp-active-deactivate').html(deactivate);
                $('#'+id+' .twp-active-deactivate').attr('plugin-status','active');

            }else{
                
                $('#'+id+' .required-plugin-details').removeClass('required-plugin-active');
                $('#'+id+' .twp-active-deactivate').removeClass('twp-plugin-not-install');
                $('#'+id+' .twp-active-deactivate').addClass('twp-plugin-active');
                $('#'+id+' .twp-active-deactivate').html(active);
                $('#'+id+' .twp-active-deactivate').attr('plugin-status','deactivate');

            }

            $('.twp-active-deactivate').removeClass('twp-activating-plugin');
            $('#'+id+' .twp-installation-message').empty();
            $('#'+id+' .twp-installation-message').html(response);
            
        });
    });

}(jQuery));