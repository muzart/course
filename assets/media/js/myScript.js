/* Author: Abdullaev F. */

$(document).ready(function(){
     $('#myTab a').click(function (e) {
         e.preventDefault()
         $(this).tab('show')
     });
    $(function () {
        $('#myTab a:first').tab('show')
    })
	
});
