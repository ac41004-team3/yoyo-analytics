<!doctype html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
	@foreach ($customers as $customer)
		<li>
			{{ $customer->customer_id }}
		</li>
	@endforeach
	</ul>
</body>
</html>
