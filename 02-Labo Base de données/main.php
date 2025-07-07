
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Médiathèque</title>
	<link rel="stylesheet" href="styles/style.css">
</head>
<body>
	<div class="titre">
	<h1>Médiathèque</h1>
	</div>

	<div class="filtres">
		<h2>Filtres</h2>
	</div>

<div class="form">
	<form method="GET" action="">
    <label>Mot-clé (titre ou synopsis) :</label>
    <input type="text" name="keyword">

    <label>Acteur :</label>
    <select name="actor">
        <option value="">-- Tous --</option>
        <option value="1">Acteur 1</option>
        <option value="2">Acteur 2</option>
        <!-- Dynamique via PHP ensuite -->
    </select>

    <label>Genre :</label>
    <select name="genre">
        <option value="">-- Tous --</option>
        <option value="action">Action</option>
        <option value="drame">Drame</option>
        <!-- Dynamique via BDD -->
    </select>

    <label>Réalisateur :</label>
    <select name="director">
        <option value="">-- Tous --</option>
        <option value="1">Réalisateur 1</option>
    </select>

    <label>Année de sortie :</label>
    <select name="year">
        <option value="">-- Toutes --</option>
        <option value="2025">2025</option>
        <option value="2024">2024</option>
        <option value="2023">2023</option>
        <option value="2022">2022</option>
        <option value="2021">2021</option>
        <option value="2020">2020</option>
        <option value="2019">2019</option>
        <option value="2018">2018</option>
        <option value="2017">2017</option>
        <option value="2016">2016</option>
        <option value="2015">2015</option>

    </select>

    <label>Tri :</label>
    <select name="sort">
        <option value="title_asc">Titre A-Z</option>
        <option value="title_desc">Titre Z-A</option>
        <option value="year_asc">Date croissante</option>
        <option value="year_desc">Date décroissante</option>
    </select>

    <br><br>
    <input type="submit" value="Rechercher">
</form>
</div>


	<div class="résultats">
		<h2>Résultats</h2>
	</div>


	<div class="modification">
		<h2>Modification</h2>
	</div>

</body>
</html>