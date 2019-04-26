<?php

include 'help.php';

?>

<script>
$(document).ready(finction(){
    function make_chat_dialog_box(to_user_id,to_user_name){
    var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'"></div>';
    modal_content += '<div style="height:400px;border:1px solid #ccc:overflow-y: scroll;margin-bottom:24px;padding:16px;"class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'"
    >'</div>';
}

});

</script>