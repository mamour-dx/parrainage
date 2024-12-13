<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Form</title>
    <link rel="stylesheet" href="style.css">


</head>
<body>
    <div class="container">
        <h1>Parrainage ESP</h1>
        <form action="DatabaseConnect.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom Complet:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="options">Option:</label>
                <select id="option" name="options" required>
                <option value="" disabled selected>Select your option</option>
                <option value="1">Inf-Inf</option>
                <option value="2">Inf-Tr</option></select>
            </div>

            <div class="form-group">
                <label for="phone">Numéro Téléphone:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="year">Année:</label>
                <select id="year" name="year" required>
                    <option value="" disabled selected>Select your year</option>
                    <option value="1">1ère année (Filleul)</option>
                    <option value="2">2ème année (Parrain)</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Upload Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <footer class="copy">
        <p>&copy; - Système parrainage ESP 2024/2025 💙</p>
        <p>Code source: <a href="https://github.com/mamour-dx/parrainage" target="_blank">Github</a></p>
    </footer>

</body>
</html>
