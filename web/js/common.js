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
    var occupancyCookingClasses = [9, 11, 31, 42, 78, 97];
    $('#quotes-occupied').on('change', function() {
        var occupancy = $(this).val() * 1;

        if( $.inArray(occupancy, occupancyCookingClasses) != -1 ) {
            bootbox.dialog({
                message: 'Do they have a wet UL300 Fire Suppression system over all cooking equipment included deep fat fryers?',
                buttons: {
                    no: {
                        label: "No",
                        className: "btn-default",
                        callback : function() {
                            // cancel quote
                            window.location.href = '/quotes/cancel';
                        }
                    },
                    yes: {
                        label: "Yes",
                            className: "btn-primary"
                    }
                }
            });

            lockLeadExecution();
        } else {
            unlockLeadExecution();
        }
    });

    // lock/unlock Lead Exclusion according to Occupancy (cooking classes)
    if( $.inArray($('#quotes-occupied').val()*1, occupancyCookingClasses) != -1) {
        lockLeadExecution();
    } else {
        unlockLeadExecution();
    }

    function lockLeadExecution() {
        $('#quotes-does_lead_exclusion_apply').val(1);
        $('#quotes-does_lead_exclusion_apply option:not(:selected)').attr('disabled', true);
    }

    function unlockLeadExecution() {
        $('#quotes-does_lead_exclusion_apply option').attr('disabled', false);
    }
});