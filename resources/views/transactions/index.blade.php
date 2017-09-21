<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
	@foreach ($transactions as $transaction)
		<li>
			{{ $transaction->customer_id }}
		</li>
	@endforeach
	</ul>
</body>
</html>
