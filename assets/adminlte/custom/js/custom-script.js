
$(document).ready(function(){

  // ----------CORE--------------

  // AUTOFOCUS INPUT
  // $('body').on('focus','input',function(){
  //  $(this).select()
  // })

  // -----------MOBILE------------
  // var sidebar;
  // $.mobile.loading().hide();
  // $(".wrapper").on("swiperight",':not(.content)',function(){
  //   $(".sidebar-toggle").click();
  //   sidebar=true;
  // });   
  
  // $(".wrapper").on("swipeleft",':not(.content)',function(){
  //   if (sidebar==true) {
  //     $(".sidebar-toggle").click();
  //   }
  // });  

  ////////////////////////////////////////////

  // first load
  var linkfirst=$('a.sidebar-link').first().find('input').val()
  $(".content-wrapper").load(linkfirst)
  $(".loader").hide();

  // sidebar
  $('a.sidebar-link').click(function(event){
    $('.sidebar-menu').children('li').removeClass('active')
    $(this).parent('li').addClass('active')
    event.preventDefault()
    var link=$(this).find('input').val()
    $(".content-wrapper").load(link)
  })

  $(document)
    .ajaxStart(function () {
      $('.loader').show()
    })
    .ajaxStop(function () {
      $('.loader').hide()
      $('.number-format').number(true,0,',','.')
      $('.number-format2').number(true,0,',','.')
      $('[data-toggle="popover"]').popover({placement:"top",trigger:"hover"});   
    })

   
    $('.number-format3').number(true,0,',','.')

})
function offevent(modal){
  $(modal).on('hide.bs.modal',function(){
    $(modal+' button').off();
  })
}
function showAlert(data){
  $('.alert-infor span').html(data);
  $('.alert-infor').show('slide', {direction: 'right'},400);
  setTimeout(function(){     
    $('.alert-infor').hide('slide', {direction: 'right'},300); 
  }, 3500);
}