// $('.owl-carousel').owlCarousel({
//     loop:true,
//     margin:10,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             nav:true
//         },
//         600:{
//             items:3,
//             nav:false
//         },
//         1000:{
//             items:5,
//             nav:true,
//             loop:false
//         }
//     }
// })




    $(document).ready(function() {

      var owl = $("#owl-baru-diterbitkan");
      var owl2 = $("#owl-buku-terpopuler");

      owl.owlCarousel({
          items : 3, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0
          itemsMobile : false,
           // itemsMobile disabled - inherit from itemsTablet option
      });

      // Custom Navigation Events
      $(".next").click(function(){
        owl.trigger('owl.next');
      })
      $(".prev").click(function(){
        owl.trigger('owl.prev');
      })
      $(".play").click(function(){
        owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
      })
      $(".stop").click(function(){
        owl.trigger('owl.stop');
      })


      owl2.owlCarousel({
          items : 3, //10 items above 1000px browser width
          itemsDesktop : [1000,5], //5 items between 1000px and 901px
          itemsDesktopSmall : [900,3], // betweem 900px and 601px
          itemsTablet: [600,2], //2 items between 600 and 0
          itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
      });

      // Custom Navigation Events
      $(".next2").click(function(){
        owl2.trigger('owl2.next2');
      })
      $(".prev2").click(function(){
        owl2.trigger('owl2.prev2');
      })
      $(".play2").click(function(){
        owl2.trigger('owl2.play2',1000); //owl2.play event accept autoPlay speed as second parameter
      })
      $(".stop2").click(function(){
        owl2.trigger('owl2.stop2');
      })

    });


    $(function() {
    	var mobileScreenTreshold = 1024;
    	$(".hvrbox").click(function(e) {
    		if($(window).width() <= mobileScreenTreshold) {
    			if($(this).hasClass("active")) {
    				$(this).removeClass("active");
    			} else {
    				e.preventDefault();
    				$(this).addClass("active");
    			}
    		} else {
    			$(this).removeClass("active");
    		}
    	});
    });

// fungsi untuk menampilkan form ketika mengganti status pengajuan
    $(function() {
  $('#status-pengajuan').change(function(){
    $('.form-publish').show();
    $('#simpan-penyuntingan').hide();
    $('#' + $(this).val()).hide();
  });

});
