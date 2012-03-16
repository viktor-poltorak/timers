$(function() {
    $('#query').click(function() {
        var method = $('#method').val();
        var type = $('#type').val();
        var func = $('#function').val();
        var params = $('#params').val();
        
        if(method == 'put'){
            var url = func + '.' + type + '?' + params;
        }
        
       
        $.ajax({
            type: method,
            url: url,
            data: params
        }).done(function( msg ) {
            $('#response_html').html(msg);
            $('#response').val(msg);
        });
        
    })
})

