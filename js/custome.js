$(function () {
    $('a.persoName').on('mouseover',function(){
        
        $.ajax({
            
            url: 'http://127.0.2.3/exercices/jquery/',
            method: 'post',
            data: {
                name: $('#nom').val(),
                animaux: $('#animaux').val()
            },

            
                success: function( result, status, xhr ) {
                
                    $('#result').html('<p>' + result + '</p>')
                }
                // complete: function( result ) {
        //     // console.log( result )
               // },

               // error: function( err ) {
                    
                // }
        })
        
        console.log( $(this) )
        $("tr th td td a.persoName" ).parent(".tbperso").css( "background-color", "yellow" );
    })

    
})