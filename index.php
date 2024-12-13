<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <div class="box">
        <span class="boxLine"></span>
        <form action="DatabaseConnect.php" method="POST" enctype="multipart/form-data">
        <h2>Parrainage ESP</h2>
            <div class="inputBox">
                <input type="text" id="name" name="name" required>
                <span>Nom Complet:</span>
                <i></i>
            </div>

            <div class="rBtn">
                <label class="lbl">Option: </label>
                <div class="radio-wrapper">
                    <input type="radio" name="options" id="option1" value="1" required class="unchecked"/>
                    <label for="option1">INF-INF</label>
                </div>
                <div class="radio-wrapper">
                    <input type="radio" name="options" id="option2" value="2" class="unchecked" />
                    <label for="option2">INF-TR</label>
                </div>
            </div>


            <div class="inputBox">
                <input type="tel" id="phone" name="phone" required>
                <span>Numéro de téléphone</span>
                <i></i>
            </div>

        <div class="rBtn">
            <label class="lbl">Année:</label>
            <div class="radio-wrapper">
                <input type="radio" class="unchecked" id="parrain" name="year" value="2" required />
                <label for="parrain">Parrain</label>
            </div>
            <div class="radio-wrapper">
                <input type="radio" class="unchecked" id="filleul" name="year" value="1" required />
                <label for="filleul">Filleul</label>
            </div>
        </div>

            <div class="photo">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>
            
            <button type="submit">Submit</button>
        </form>

    </div>

    <footer class="copy">
        <p>&copy; - Système parrainage ESP 2024/2025 💙</p>
        <p>Code source: <a href="https://github.com/mamour-dx/parrainage" target="_blank">Github</a></p>
    <footer/>
</body>
<script>
    window.onload = function() {

        const radios = document.querySelectorAll('.unchecked');

        // Loop through all selected radio buttons and deselect them
        radios.forEach(function(radio) {
            radio.checked = false;
        });
    };
</script>

</html>
