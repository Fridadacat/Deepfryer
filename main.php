<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bilderfritteuse</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Benutzerdefiniertes CSS, um den Button rot zu färben und zu zentrieren */
        .center-button {
            text-align: center;
        }

        .red-button {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <br>
                <h1 class="text-center">Bilderfritteuse</h1>
                <br>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Hochladen</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Wähle ein Bild aus, dass du fritieren willst!</label>
                    </div>
                </div>
                <div class="mt-3 center-button">
                    <a href="fry.php" class="btn red-button"><b>Frittieren!</b></a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>