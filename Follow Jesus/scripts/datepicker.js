$(document).ready(function()
{   
    setTimeout(function()
    {
        $('#p-date').fadeOut(function()
        {
            $('#p-date').html("Click on the calendar below to start.<br/><br/>");
            $('#p-date').append('<input type="text" id="button-picker" style="width:140px">').fadeIn();
            init_datepicker();
            $('#p-date').append('<br/><br/><button type="button" id="find-devo">Find Devotion</button>');
            init_devo();
        });
    }, 2000);

});

function init_datepicker()
{
    $('#button-picker').datepick({showOnFocus: false, showTrigger: '<button type="button" class="trigger"><img src="../images/datepicker-icon.gif" alt="Popup" style="width:15px;height:16px;"></button>'});
}

function init_devo()
{
    $('#find-devo').click(function()
    {
        var date = $('#button-picker').datepick('getDate');

        // If a date was selected
        if (date.length)
        {
            var month = (date[0].getMonth() + 1);
            var day = date[0].getDate();

            if (month < 10)
                month = "0" + month;

            if (day < 10)
                day = "0" + day;

            console.log("The month is: " + month + "\nThe day is: " + day);

            // Reset error div
            $('#error').css("display", "none");

            // Go to daily devotion page
            window.location.assign("../daily/" + month + day + ".html");
        }
        // If a date was not selected
        else
        {   
            // Show an error
            $('#error').css("display", "block");
            $('#error').html('Please select a date first!');
        }
    });
}