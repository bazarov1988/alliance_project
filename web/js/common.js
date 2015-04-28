$(function() {
    $('.nav-tabs-top a[data-toggle="tab"]').on('click', function(){
        $('.nav-tabs-bottom li.active').removeClass('active');
        $('.nav-tabs-bottom a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
    })

    $('.nav-tabs-bottom a[data-toggle="tab"]').on('click', function(){
        $('.nav-tabs-top li.active').removeClass('active');
        $('.nav-tabs-top a[href="'+$(this).attr('href')+'"]').parent().addClass('active');
    });


    // choosing SF-3 under the Cause of Loss-Building
    $('#optionalpropertycoverages-cause_of_loss_building').on('change', function(e) {
        if($(this).val() == 3) {
            bootbox.dialog({
                title: 'Flat roof or rubber roof',
                message: '<p>If it is a flat roof, a rubber roof must be installed within 15 years-subject to: inspection verification, no prior rubber roof or related water damage claims. Please check here <input type="checkbox" id="flat_rubber_roof" value="1"> if they meet the above requirements.</p>',
                buttons: {
                    success: {
                        label: "Ok",
                        className: "btn-primary",
                        callback: function () {
                            var val = $('#flat_rubber_roof').prop('checked') * 1;

                            $('#optionalpropertycoverages-cause_of_loss_building_roof').val(val);
                        }
                    }
                }
            });
        }
    });

    // occupancy: choosing the cooking classes
    $('#quotes-occupied').on('change', function() {
        var occupancy = $(this).val() * 1;

        if( $.inArray(occupancy, [9, 11, 31, 42, 78, 97]) != -1 ) {
            bootbox.confirm('Do they have a wet UL300 Fire Suppression system over all cooking equipment included deep fat fryers?', function(result) {
                if(!result) {
                    // cancel quote
                    window.location.href = '/quotes/cancel'
                }
            });
        }
    });
});