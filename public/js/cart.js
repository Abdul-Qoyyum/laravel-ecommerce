$(document).ready(function () {
    //handle ajax request
    $('.quantity').change(function () {
        let item = $(this);
        const patch = {quantity:item.val(),"_token": $('#token').val()};
        let id = item.attr('id');
        $.ajax({
            type: 'PATCH',
            url: `cart/${id}`,
            data: JSON.stringify(patch),
            processData: false,
            contentType: 'application/json-patch+json',
            success : function (data) {
                $('.subtotal').text(data.subtotal);
                $('.total').text(data.total);
            }
        });
    });
});
