<html>

<head>

<title></title>

</head>

<body>

<form method="POST" action="/" >
  @csrf
  <div>
    <label for="url_old" >Input Link : </label>
    <input type="text" id="url_old" name="url_old"/>
  </div>
  <div>
    <label for="url_new" >Link Yang diinginkan : </label>
    <span>http://localhost:8000/</span>
    <input type="text" id="url_new" name="url_new"/>
  </div>
  <button type="submit" >Generate</button>
</form>
</body>

</html>
