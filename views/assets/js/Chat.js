$(async function () {

    let user = $(' #username ')[0].innerHTML


    var pusher = await new Pusher('7c66e54adcd6eb6bb536', {
        cluster: 'us2'
      });
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var channel = pusher.subscribe('my-channel');

      channel.bind('message', data =>  {
        $(' #message_loader ').append(`<div><span class="font-weight-bold">${data['user']}: </span>${data['message']}</div>`)
      });

      channel.bind('update-user', data =>  {
        $(' #list_users ').append(data['users'])
      }) ;

    await $.post('http://localhost/Projects-php/Pusher/users' , { username: user });

    await $.post('http://localhost/Projects-php/Pusher/adduser' , { id: pusher.connection["socket_id"] }, res => {
      console.log(res)
    });

    pusher.connection.bind('disconnected', () => {
      $.post('http://localhost/Projects-php/Pusher/deluser' , {}, res => {
        console.log(res)
      });
    })

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