$( document ).ready(function(){
    $(".button-collapse").sideNav();
    $('.dropdown-button').dropdown({
          inDuration: 300,
          outDuration: 225,
          constrainWidth: true, // Does not change width of dropDown to that of the activator
          hover: true, // Activate on hover
          gutter: 0, // Spacing from edge
          belowOrigin: true, // Displays dropDown below the button
          alignment: 'left', // Displays dropDown with edge aligned to the left of button
          stopPropagation: false // Stops event propagation
        }
    );
    $('.parallax').parallax();
    $('.target').pushpin({
      top: 0,
      offset: 0
    });
    
	/* Initializing the Masonry plugin */
	let container = document.querySelector('.container');
	let masonry = new Masonry(container, {
	columnWidth: 50,
	itemSelector: '.item'
	});
	
	 $('.materialboxed').materialbox();
});


$(function () {
  $(document).scroll(function () {
    let $nav = $(".nav-wrapper");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
    let $navbar=$(".target");
    $navbar.toggleClass('scroll',$(this).scrollTop() > $navbar.height());
    if($(this).scrollTop() > $nav.height()){
        $(".nav-wrapper .brand-logo img").attr('src','images/logo-light.png');
    }
    if($(this).scrollTop() < $nav.height()){
        $(".nav-wrapper .brand-logo img").attr('src','images/logo_dark_old.png');
    }
});
});


document.onreadystatechange = function () {
    let state = document.readyState;
    if (state == 'interactive') {
        document.getElementById('contents').style.visibility="hidden";
    } else if (state == 'complete') {
        setTimeout(function(){
            document.getElementById('interactive');
            document.getElementById('load').style.visibility="hidden";
            document.getElementById('contents').style.visibility="visible";
        },1000);
    }
};
