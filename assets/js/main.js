console.log('Loaded main.js data: dataObj,ok');

$(document)
.on("submit", "form.js-register", function(event) {
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
        url: '/faultline/ajax/register.php',
        data: dataObj,
        dataType: 'json',        
        async: true,
        
        success: function( data, textStatus, jQxhr ){
            console.log("In there");            
        },
        error: function( jqXhr, textStatus, errorThrown ){
            
          console.log(errorThrown);
       }
    })
    
    .done(function ajaxDone(data) {
        //console.log(data);
        var json = JSON.parse(data);
        data = json;
        if(data.redirect !== undefined){
            window.location = data.redirect;
            console.log('Redirecting');
        }else if(data.error !== undefined) {
            _error
                .html(data.error)
                .show();
            console.log('Failing Redirect');
        }
        alert(data.redirect);
        console.log("Ajax is done?"+data.redirect+data.error);
    })
    .fail(function ajaxFailed(e){
        console.log(e+" ajaxFailed");
    })
    .always(function ajaxAlwaysDoThis(data){
        console.log('Always'+data);
    })
    
    alert('form submitted');
    
    return false;
});