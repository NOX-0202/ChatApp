$(function() {
    var pusher = new Pusher('7c66e54adcd6eb6bb536', {
        cluster: 'us2'
      });
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var channel = pusher.subscribe('my-channel');

      channel.bind('message', data =>  {
        $(' #message_loader ').append(`<div><b>${data['user']}: </b>${data['message']}</div>`)
      });

      channel.bind('update-user', data =>  {
        $(' #list_users ').append(`<li>${data['user']}</li>`)
      });

    let user = $(' #username ')[0].innerHTML

    $.post('http://localhost/Projects-php/Pusher/users' , { username: user }, res => {
       // data = JSON.parse(res)
        console.log(res)
    });

    $(' #form ').submit(e => {
        e.preventDefault();

        let action = e.target.action

        let data = {
            message: $(' #send_message ').val(), 
            user
        }
        
        $.post(action, data, res => {
            data = JSON.parse(res)
            if (!data.ok) alert('Não foi possivel enviar a mensagem');
        });

        $(' #send_message ').val('')
    })
})