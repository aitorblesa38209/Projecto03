// $("#login-button").click(function(event){
	event.preventDefault();	 
	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
	 setTimeout(function() {
        $(".wrapper").fadeOut(1000,function(){
            $("form").submit()
           
        });
    },500);

});
