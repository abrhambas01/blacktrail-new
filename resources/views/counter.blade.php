<html>
<head>
	<title>Pusher Test</title>
	<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
	<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true; 

    var pusher = new Pusher('f856adb6d380064a83dd', {
    	cluster: 'ap1',
    	forceTLS: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
    	alert(JSON.stringify(data));
    });
</script>
</head>
<body>
	<h1>Pusher Test</h1>
	<p>
		Try publishing an event to channel <code>my-channel</code>
		with event name <code>my-event</code>.
	</p>
</body>
</html>