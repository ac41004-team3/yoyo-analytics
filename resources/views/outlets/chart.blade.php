<!doctype html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"
			  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
			  crossorigin="anonymous"></script>
	<title></title>
</head>
<body>
	<h1>{{ $outlet->name }}</h1>
	@foreach ($outlet->transactions as $transaction)
		<p>{{$transaction->date}}</p>
	@endforeach
	<script>
			var labels = [
			@foreach ($outlet->transactions as $transaction)
			"{{$transaction->date}}", 
			@endforeach
			]
			labels = $.unique(labels); //Removes to only one date
			document.write(labels.length);
	</script>
</body>
</html>
