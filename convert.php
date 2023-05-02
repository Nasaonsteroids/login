<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pyscript.net/latest/pyscript.css" />
    <script defer src="https://pyscript.net/latest/pyscript.js"></script>
    <title>Time converter</title>
</head>
<body>

  
      <py-script>      
        def time_converter(seconds):
        minutes, sec = divmod(seconds, 60)
        hours, min = divmod(minutes, 60)
        days, hour = divmod(hours, 24)
        return f"{days} days, {hour} hours, {min} minutes, and {sec} seconds"
    
    seconds = int(input("Enter the number of seconds: "))
    print(time_converter(seconds))
    
      </py-script>
</body>
</html>