$(document).ready(function () {
    $('body').on('click', '#submit_btn', function () {
        $.ajax({
            url: 'addSite.php',
            type: 'POST',
            dataType: 'html',
            data: $("#register_form").serialize(),
            success: function (response) {
                response = JSON.parse(response)
                if (response.massage.length > 0) {
                    alert(response.massage);
                }
                if (response.success) {
                    document.location.reload();
                } else if (!response.success && response.massage.length == 0) {
                    alert('Something is wrong');
                } else {

                }
            },
            error: function (response) {
                console.log(response)
            }
        })
    })
})