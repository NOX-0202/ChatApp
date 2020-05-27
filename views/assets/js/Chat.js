$(function() {


    var pusher = new Pusher('7c66e54adcd6eb6bb536', {
        cluster: 'us2'
      });
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var channel = pusher.subscribe('my-channel');

      channel.bind('my-event', data =>  {
        $(' #message_loader ').append(`<div><b>${data['user']}: </b>${data['message']}</div>`)
    });

    $(' #form ').submit(e => {
        e.preventDefault();

        let action = e.target.action

        let data = {
            message: $(' #send_message ').val(), 
            user: $(' #username ')[0].innerHTML
        }
        
        $.post(action, data, res => {
            data = JSON.parse(res)
            if (!data.ok) alert('Não foi possivel enviar a mensagem');
        });

        $(' #send_message ').val('')
    })
})