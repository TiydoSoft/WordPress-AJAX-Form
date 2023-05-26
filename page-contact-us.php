<form id="ts_ajax_form">
    <input type="text" name="name" required/>
    <input type="email" name="email" required/>
    <input type="submit" id="submit" name="submit"/>
    <div id="result_msg" style="display: none;"></div>
</form>

<script>
jQuery('#ts_ajax_form').submit(function(event){
    event.preventDefault();
    jQuery('#result_msg').html('');
    jQuery('#result_msg').hide();
    var link="<?php echo admin_url('admin-ajax.php')?>";
    var form=jQuery('#ts_ajax_form').serialize();
    var formData=new FormData;
    formData.append('action','ts_ajax_form_process');
    formData.append('ts_ajax_form',form);
    jQuery('#submit').attr('disabled',true);
    jQuery.ajax({
        url:link,
        data:formData,
        processData:false,
        contentType:false,
        type:'post',
        dataType: 'json',
        success:function(response){
            jQuery('#submit').attr('disabled',false);
            if(response.success==true){
                jQuery('#ts_ajax_form')[0].reset();
                var name = response.data.name;
                var email = response.data.email;
                var message = 'Your name is ' + name + ' and your email is ' + email;
                jQuery('#result_msg').html(message);
                jQuery('#result_msg').show();
            }
        }
    });
});
</script>