$(document)
.on("submit", "form.js-login", function(event) {
    event.preventDefault();
    
    var _form = $(this);
    var _error = $(".js-error", _form);
     
    var dataObj= {
        email: $("input[type='email']", _form).val(),
        password: $("input[type='password']", _form).val()
    };
    
    if(dataObj.email.length < 6) {
        _error
            .text("Please enter a valid email")
            .show();
        return false;
    }else if (dataObj.password.length < 8) {
        _error
            .text("Password must be 8 or more characters")
            .show();
        return false;
    }
     console.log(dataObj+' dataObj');
    _error.hide();
    
    $.ajax({
        type: 'POST',
        url: '/faultline/ajax/login.php',
        data: dataObj,
        dataType: 'text',        
        async: true,
        
        success: function( data, textStatus, jQxhr ){
            console.log("In there");            
        },
        error: function( jqXhr, textStatus, errorThrown ){
            
          console.log(errorThrown);
       }
    })
    
    .done(function ajaxDone(data) {
        console.log(data);
        if(data.redirect !== undefined){
            window.location = data.redirect;
            console.log('Redirecting');
        }else if(data.error !== undefined) {
            _error
                .text(data.error)
                .show();
            console.log('Failing Redirect');
        }
        alert(data.name);
    })
    .fail(function ajaxFailed(e){
        console.log(e);
    })
    .always(function ajaxAlwaysDoThis(data){
        console.log('Always');
    })
    
    alert('form submitted');
    
    return false;
});