$(function() {
    function registerJsLibrary() {
        $(".card").flip({
            axis: 'y',
            trigger: 'hover',
        });

        $('#datepicker').datepicker( {
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd',
        });
    }
  
    registerJsLibrary();
  
    $(document).on('click','#date-btn', function(e) {
        $.ajax({
            url: "ajax.php",    
            type: "post",    
            data: $("#search").serialize(),
            success:function(result){
                $( ".list-section" ).html(result);
                registerJsLibrary();
            }
        });

        e.preventDefault();
    });
});