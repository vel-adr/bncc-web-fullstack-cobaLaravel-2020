<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
</head>

<body>
    <h1>Buat Account Baru!</h1>

    <h2>Sign Up Form</h2>
    <form method="POST" action="/welcome">
        @csrf
        <label for="fname">First name:</label><br>
        <input type="text" name="fname" id="fname"><br>

        <label for="lname">Last name:</label><br>
        <input type="text" name="lname" id="lname"><br><br>

        <label for="gender">Gender: </label><br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" name="gender" value="other">
        <label for="other">Other</label><br><br>

        <label for="nation">Nationality: </label>
        <select name="nation" id="nation">
            <option value="Indonesian">Indonesian</option>
        </select><br><br>

        <label for="language">Language spoken: </label><br>
        <input type="checkbox" name="language" value="bahasa_indonesia">
        <label for="bahasa_indonesia">Bahasa Indonesia</label><br>
        <input type="checkbox" name="language" id="english">
        <label for="english">English</label><br>
        <input type="checkbox" name="language" id="other">
        <label for="other">Other</label><br><br>

        <label for="bio">Bio:</label><br><br>
        <textarea name="bio" id="bio" cols="20" rows="5"></textarea><br>

        <input type="submit" value="Sign Up">
    </form>
</body>

</html>