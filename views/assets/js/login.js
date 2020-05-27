$(function() {

    $(' #form ').submit(e => {
        e.preventDefault();

        let action = e.target.action

        let data = {
            user: $(' #username_user ').val()
        }

        
        $.ajax({
            url: action,
            data,
            type: "post",
            success: res => {
                let data = JSON.parse(res)
                window.location.href = data.url
            }
        });

    })
})