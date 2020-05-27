$(function() {


    var pusher = new Pusher('7c66e54adcd6eb6bb536', {
        cluster: 'us2'
      });
  
      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;
  
      var channel = pusher.subscribe('my-channel');
  
      channel.bind('my-event', function(data) {
          $(' #result ').append(data[0])
      });
  


    $(' #form ').submit(e => {
        e.preventDefault();

        let action = e.target.action

        let data = {
            user: $(' #send_message ').val()
        }

        
        $.ajax({
            url: action,
            data,
            type: "post",
            success: res => {

            }
        });

    })
})