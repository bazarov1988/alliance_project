$('.nav-tabs-top a[data-toggle="tab"]').on('click', function(){
    $('.nav-tabs-bottom li.active').removeClass('active')
    $('.nav-tabs-bottom a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
})

$('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function(){
    $('.nav-tabs-top li.active').removeClass('active')
    $('.nav-tabs-top a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
})