/**
 * Created by Gurwinder on 2/2/2016.
 */

$(document).ready(function() {
    var ajaxloading  = false;
    $(document).on('click', ".a_r", function () {
        var id = $(this).attr('data-id');
        var current = $(this);
        var btn_text = current.html();
        if(ajaxloading==false){

            ajaxloading = true;
            current.html('<img src="'+baseurl+'/images/ajax-loader.gif">');
            $.post(admin_url+"/slider-images/update-slider-status",{'id':id}, function(data){
                if(data.result==1){
                    if(data.action=="Add"){
                        current.removeClass('btn-danger').addClass('btn-success');
                    } else {
                        current.removeClass('btn-success').addClass('btn-danger');
                    }
                    current.html(data.action);
                } else {
                    current.html(btn_text);
                }
            }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?

                alert(thrownError); //alert with HTTP error


            });
            ajaxloading = false;
        }
    });
	$(document).on('change', "#attributes-entity_id", function () {

        if($(this).val()==3){
          $('#lower_slider').removeClass('hidden').addClass('form-group');
          $('#upper_slider').removeClass('hidden').addClass('form-group');
        } else {
            $('#lower_slider').removeClass('form-group').addClass('hidden');
            $('#upper_slider').removeClass('form-group').addClass('hidden');
        }
    });
    $(document).on('click', ".status", function () {
        var id = $(this).attr('data-id');
        var current = $(this);
        var btn_text = current.html();
        if (typeof status_change_url !== 'undefined') {
            var status_url = status_change_url;
            // the variable is defined
        } else {
            var status_url = current_url;
        }
        if(ajaxloading==false){

            ajaxloading = true;
            current.html('<img src="'+baseurl+'/images/ajax-loader.gif">');
            $.post(status_url,{'id':id, 'status_token':1}, function(data){
                if(data.result==1){
                    if(data.action=="Active"){
                        current.removeClass('btn-danger').addClass('btn-success');
                    } else {
                        current.removeClass('btn-success').addClass('btn-danger');
                    }
                    current.html(data.action);
                } else {
                    current.html(btn_text);
                }
            }).fail(function(xhr, ajaxOptions, thrownError) { //any errors?

                alert(thrownError); //alert with HTTP error


            });
            ajaxloading = false;
        }
    });
});
