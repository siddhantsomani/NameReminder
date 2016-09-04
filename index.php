<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Name Reminder</title>
  </head>
  <body>
    <form action = "saveNumber.php" method = "POST">
      <label for="Name">Enter your name: </label>
      <input type="text" name="Name" placeholder="Enter Your Name"><br>
      <label for="countrycode">Enter country code and phone number: </label>
      <input type="text" name="countrycode" value="+" style="width:3em">
      <input type="text" name="PhoneNumber" placeholder="Phone Number"><br>
      <input type="submit" value="Submit" name="submit">
    </form>
  </body>
</html>
