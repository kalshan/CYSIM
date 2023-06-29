jQuery(document).ready(function($) {
    $('.choose-your-sim-box').click(function() {
        // Remove 'selected' class from all boxes
        $('.choose-your-sim-box').removeClass('selected');
        
        // Add 'selected' class to the clicked box
        $(this).addClass('selected');
        
        // Update the order summary below with the selected option
        var option = $(this).hasClass('esim') ? 'eSIM' : 'Physical SIM';
        $('.order-summary').text('Selected SIM: ' + option);
        
        // Update the payment gateway with the selected option
        var cost = $(this).hasClass('esim') ? 0 : 5;
        $('.payment-gateway').text('Total Cost: $' + cost);
    });
});
