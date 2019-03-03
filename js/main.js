var isProfileShow=0;
jQuery(document).ready(function($) {

  // Header fixed and Back to top button

  $(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
      $('.back-to-top').fadeIn('slow');
      $('#header').addClass('header-fixed');
    } else {
      if(isProfileShow==0){
        $('.back-to-top').fadeOut('slow');
        $('#header').removeClass('header-fixed');
      }
    }
  });

  if ($(this).scrollTop() > 100) {
    $('.back-to-top').fadeIn('slow');
    $('#header').addClass('header-fixed');
  }

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500, 'easeInOutExpo');
    return false;
  });

  // Initiate the wowjs animation library
  new WOW().init();

  // Initiate superfish on nav menu
  $('.nav-menu').superfish({
    animation: {
      opacity: 'show'
    },
    speed: 400
  });

  // Mobile Navigation
  if ($('#nav-menu-container').length) {
    var $mobile_nav = $('#nav-menu-container').clone().prop({
      id: 'mobile-nav'
    });
    $mobile_nav.find('> ul').attr({
      'class': '',
      'id': ''
    });
    $('body').append($mobile_nav);
    $('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
    $('body').append('<div id="mobile-body-overly"></div>');
    $('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

    $(document).on('click', '.menu-has-children i', function(e) {
      $(this).next().toggleClass('menu-item-active');
      $(this).nextAll('ul').eq(0).slideToggle();
      $(this).toggleClass("fa-chevron-up fa-chevron-down");
    });

    $(document).on('click', '#mobile-nav-toggle', function(e) {
      $('body').toggleClass('mobile-nav-active');
      $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
      $('#mobile-body-overly').toggle();
    });

    $(document).click(function(e) {
      var container = $("#mobile-nav, #mobile-nav-toggle");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
      }
    });
  } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
    $("#mobile-nav, #mobile-nav-toggle").hide();
  }

  // Smoth scroll on page hash links
  $('.nav-menu a, #mobile-nav a, .scrollto, .btn-get-started').on('click', function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        var top_space = 0;

        if ($('#header').length) {
          top_space = $('#header').outerHeight();

          if( ! $('#header').hasClass('header-fixed') ) {
            top_space = top_space - 20;
          }
        }

        $('html, body').animate({
          scrollTop: target.offset().top - top_space
        }, 1500, 'easeInOutExpo');

        if ($(this).parents('.nav-menu').length) {
          $('.nav-menu .menu-active').removeClass('menu-active');
          $(this).closest('li').addClass('menu-active');
        }

        if ($('body').hasClass('mobile-nav-active')) {
          $('body').removeClass('mobile-nav-active');
          $('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
          $('#mobile-body-overly').fadeOut();
        }
        return false;
      }
    }
  });

  // Gallery - uses the magnific popup jQuery plugin
  $('.gallery-popup').magnificPopup({
    type: 'image',
    removalDelay: 300,
    mainClass: 'mfp-fade',
    gallery: {
      enabled: true
    },
    zoom: {
      enabled: true,
      duration: 300,
      easing: 'ease-in-out',
      opener: function(openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
      }
    }
  });

  // custom code

  //ajax untuk menampilkan mobil
  
  tampilPageMobil();

  // tampil search mobil available
  $("#input_search").keyup(function(){
    var searchText = $(this).val();
    $.ajax({
      type    :"post",
      url     :"konten/tampil_database.php",
      dataType:'json',
      data    :{
        act:"search_mobil_available",
        search_text:searchText
      }
    }).done(function(response){
      var add_mobil_text="";
    
      var result = response;
      
      if (result.length>0){
        for(var i=0;i<result.length;i++){
          add_mobil_text+="<div class='card card-mobil col'>";
          add_mobil_text+="<img class='card-img-top' src='"+result[i][6]+"' alt='Card image cap'>";
          add_mobil_text+="<div class='card-body'>";
          add_mobil_text+="<h5 class='card-title'>"+capitalizeTxt(result[i][1])+" "+capitalizeTxt(result[i][8])+"</h5>";
          add_mobil_text+="<h6 class='card-title'>"+capitalizeTxt(result[i][2])+"</h6>";
          add_mobil_text+="<p class='card-text'>Rp. "+result[i][5]+"</p>";
          add_mobil_text+="<button class='btn btn-primary' onclick='showDetail("+result[i][0]+")'>Details</button>";
          add_mobil_text+="</div></div>";
        }
      }else{
        add_mobil_text+="<h2 style='margin:10px auto;font-weight:500;'>Not found !</h2>";
      }
      $("#card-mobil-db").html(add_mobil_text);
    });
  });

  $("#logo").click(function(){
    isProfileShow=0;
    tampilPageMobil();
  });

  $("#btn_page").click(function(){
    isProfileShow=0;
    tampilPageMobil();
    $('html, body').animate({
      scrollTop: 378
    }, 0);
    return false;
  });

  $("#btn_myprofile").click(function(){
    isProfileShow=1;
    tampilMyProfile();
  });

  $("#btn_mybooking").click(function(){
    isProfileShow=1;
    tampilMyBooking(idUserSession);
  });

});



//fungsi untuk menampilkan detail mobil dengan modal
function showDetail(id){
  var result;
  $.ajax({
    type    :"post",
    url     :"konten/tampil_database.php",
    data    :{
      act:"tampil_detail_mobil",
      id:id
    },
    dataType:'json'
  }).done(function(response){
    var add_detail_text="";
    var add_title_text="";

    result = response;
    
    add_title_text+=capitalizeTxt(result[0][1])+" "+capitalizeTxt(result[0][8]);

    // add_detail_text+="<tr><td>Merk</td><td>"+capitalizeTxt(result[0][1])+"</td></tr>";
    // add_detail_text+="<tr><td>Jenis</td><td>"+capitalizeTxt(result[0][2])+"</td></tr>";
    add_detail_text+="<tr><td>Type</td><td>"+capitalizeTxt(result[0][2])+"</td></tr>";
    add_detail_text+="<tr><td>Transmission</td><td>"+capitalizeTxt(result[0][3])+"</td></tr>";
    add_detail_text+="<tr><td>Year</td><td>"+result[0][4]+"</td></tr>";
    add_detail_text+="<tr><td>Rent Price / Day</td><td>Rp. "+result[0][5]+"</td></tr>";

    $("#modal_detail_mobil .modal-title").html(add_title_text);
    $("#modal_detail_mobil .modal-body img").attr("src",result[0][6]);
    $("#modal_detail_mobil .modal-body tbody").html(add_detail_text);
    $("#modal_detail_mobil .modal-footer .btn-rent-car").attr("onclick","rentcar("+result[0][0]+","+idUserSession+")");
    $('#modal_detail_mobil').modal('show');
  });

}

function showDetailMyBook(id_mobil,id_user){
  var result;
  $.ajax({
    type    :"post",
    url     :"konten/tampil_database.php",
    data    :{
      act:"tampil_detail_peminjaman",
      id_mobil:id_mobil,
      id_user:id_user
    },
    dataType:'json',
    error:function(response){
      alert("Error");
    }
  }).done(function(response){
    var add_detail_text="";
    var add_title_text="";
    var payStatus;

    result = response;
    
    add_title_text+=capitalizeTxt(result[0][2])+" "+capitalizeTxt(result[0][3]);

    add_detail_text+="<tr><td>Type</td><td>"+capitalizeTxt(result[0][4])+"</td></tr>";
    add_detail_text+="<tr><td>Transmission</td><td>"+capitalizeTxt(result[0][5])+"</td></tr>";
    add_detail_text+="<tr><td>Year</td><td>"+result[0][6]+"</td></tr>";
    add_detail_text+="<tr><td>Rent Price / Day</td><td>Rp. "+result[0][7]+"</td></tr>";
    add_detail_text+="<tr><td>Date of Rent</td><td>"+result[0][12]+"</td></tr>";
    add_detail_text+="<tr><td>End Date</td><td>"+result[0][13]+"</td></tr>";
    if(result[0][14]=="belum"){
      payStatus="Not yet paid";
    }else{
      payStatus="Paid off";
    }
    add_detail_text+="<tr><td>Pay Status</td><td>"+payStatus+"</td></tr>";

    $("#modal_detail_mobil_mybooking .modal-title").html(add_title_text);
    $("#modal_detail_mobil_mybooking .modal-body img").attr("src",result[0][8]);
    $("#modal_detail_mobil_mybooking .modal-body tbody").html(add_detail_text);
    $('#modal_detail_mobil_mybooking').modal('show');
  });
}

function tampilPageMobil(){
  $('#header').removeClass('header-fixed');
  $("section#intro").show();
  $(".main-konten").hide();
  $.ajax({
    type  :"post",
    url     :"konten/tampil_database.php",
    data    :{act:"tampil_mobil_available"},
    dataType:'json'
  }).done(function(response){
    var add_mobil_text="";
    
    var result = response;
    
    for(var i=0;i<result.length;i++){
      add_mobil_text+="<div class='card card-mobil col'>";
      add_mobil_text+="<img class='card-img-top' src='"+result[i][6]+"' alt='Card image cap'>";
      add_mobil_text+="<div class='card-body'>";
      add_mobil_text+="<h5 class='card-title'>"+capitalizeTxt(result[i][1])+" "+capitalizeTxt(result[i][8])+"</h5>";
      add_mobil_text+="<h6 class='card-title'>"+capitalizeTxt(result[i][2])+"</h6>";
      add_mobil_text+="<p class='card-text'>"+/*capitalizeTxt(result[i][3])+*/"Rp. "+result[i][5]+"</p>";
      add_mobil_text+="</div><div class='card-footer'><button class='btn btn-primary' onclick='showDetail("+result[i][0]+")'>Details</button>";
      add_mobil_text+="</div></div>";
    }
    $("#card-mobil-db").html(add_mobil_text);
  });
  $(".main-konten-page").show();
}

function tampilMyProfile(){
  $('#header').addClass('header-fixed');
  $("section#intro").hide();
  $(".main-konten").hide();
  $(".main-konten-myprofile").show();
}

function tampilMyBooking(id_user){
  $('#header').addClass('header-fixed');
  $("section#intro").hide();
  $(".main-konten").hide();
  $.ajax({
    type  :"POST",
    url   :"konten/tampil_database.php",
    dataType:"JSON",
    data  :{
      act:"tampil_user_peminjaman",
      id:id_user
    },
    error:function(e){
      alert(e);
    }
  }).done(function(response){
    var add_mobil_text="";
    
    var result = response;
    
    if(result.length>0){
      for(var i=0;i<result.length;i++){
        add_mobil_text+="<div class='card card-mobil col'>";
        add_mobil_text+="<img class='card-img-top' src='"+result[i][8]+"' alt='Card image cap'>";
        add_mobil_text+="<div class='card-body'>";
        add_mobil_text+="<h5 class='card-title'>"+capitalizeTxt(result[i][2])+" "+capitalizeTxt(result[i][3])+"</h5>";
        add_mobil_text+="<h6 class='card-title'>"+capitalizeTxt(result[i][4])+"</h6>";
        add_mobil_text+="<p class='card-text'>"+/*capitalizeTxt(result[i][3])+*/"Rp. "+result[i][7]+"</p>";
        add_mobil_text+="</div><div class='card-footer'><button class='btn btn-primary' onclick='showDetailMyBook("+result[i][1]+","+result[i][9]+")'>Details</button>";
        add_mobil_text+="</div></div>";
      }
    }else{
      add_mobil_text+="<h2>You did'nt have any booking car</h2>";
    }
    $("#mybooking_car").html(add_mobil_text);
  });
  $(".main-konten-mybooking").show();
}

function rentcar(id_mobil,idUserSession){
  $.ajax({
    type      :"POST",
    url       :"konten/tampil_database.php",
    data      :{
      act:"sewa_mobil",
      id_mobil:id_mobil,
      id_user:idUserSession
    }
  }).done(function(){
    $('#modal_detail_mobil').modal("hide");
    isProfileShow=1;
    tampilMyBooking(idUserSession);
  });
}

function capitalizeTxt(txt) {
  return txt.charAt(0).toUpperCase() + txt.slice(1);
}

function goTopWindow() {
    window.scrollTo(0, 200);
}