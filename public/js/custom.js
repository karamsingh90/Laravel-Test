$(document).ready(function() {
 $("#search").keyup(function(){
    $('.pagination').hide();
    var search = $(this).val();

        $.ajax({
            url: APP_URL + '/backend/search',
            type: 'GET',
            data:{'search':search},
            success: function (data) {
                 $('#tbody').empty();
                 $('#tbody').append(data);

            }
        });
    });
});
