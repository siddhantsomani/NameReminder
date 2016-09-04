<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Name Reminder</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <!--<body style="background-image: url(img/bgimage.jpg);background-size: cover;">-->
  <body>
    <div class="form-style-8">
  <h2>SignUp for Reminders</h2>
  <form action = "saveNumber.php" method = "POST">
    <input type="text" name="Name" placeholder="Enter Your Name" required><br>
    <label for="countrycode">Enter country code and phone number: </label>
    <input type="text" name="countrycode" value="+" style="width:3em" required>
    <input type="text" name="PhoneNumber" placeholder="Phone Number" required ><br>
    <input type="submit" value="Submit" name="submit">
  </form>
</div>
    </form>
  </body>
</html>
