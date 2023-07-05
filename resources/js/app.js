import './bootstrap';

$('#monthSelector').click(function(event) {
    event.preventDefault();

    console.log('><>>>', event.target.text);
    // $.ajax({
    //     type:'POST',
    //     url:'<?php echo url("/getms"); ?>',
    //     data:'_token = <?php echo csrf_token() ?>',
    //     success:function(data){
    //         $("#msg").html(data.msg);
    //     },
    //     complete: function(){
    //         alert('complete');
    //     },
    //     error: function(result) {
    //         alert('error');
    //     }
    // });
});
