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
            console.log("Invalid email");
        return false;
    }else if (dataObj.password.length < 8) {
        _error
            .text("Password must be 8 or more characters")
            .show();
            console.log("Invalid Password");
        return false;
    }
     console.log(dataObj+' dataObj');
    _error.hide();
    
    $.ajax({
        type: 'POST',
        url: '/faultline/ajax/login.php',
        data: dataObj,
        dataType: 'html',        
        async: true,
        //statusCode: {
            //403:function() {
              //  alert('Not alliwed');
            //}
        //}
    })
    
    .done(function ajaxDone(data) {
        var json = JSON.parse(data);
        data = json;
        //console.log('Begin Ajax done'+data);
        if(data.redirect !== undefined){
            window.location = data.redirect;
            console.log('Redirecting');
        }else if(data.error !== undefined) {
            _error
            //console.log(data.error);
                .html(data.error);
                .show();
            console.log('Failing Redirect');
        }
        err = data.error;
        red = data.redirect;
        console.log('What happened? '+err+' '+red);
        //alert(data.name);
    })
    .fail(function ajaxFailed(e){
        console.log('Ajax failed '+e);
    })
    .always(function ajaxAlwaysDoThis(data){
        console.log('Always');
    })
    
    alert('form submitted');
    
    return false;
});