<!DOCTYPE html>
<html lang="en">

<head>
        
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime chat app</header>
            <form action="#">
                <div class="error-txt">This is an error message!</div>
                
                <div class="field input">
                    <label for="">Email Address</label>
                    <input type="text" placeholder="Enter your email ">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" placeholder="Enter a new password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="continue to chat">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup Now</a></div>

        </section>

    </div>
    <script src="javascript/passShowHide.js"></script>
</body>

</html>