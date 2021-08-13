<h1>Airport (CREATE) </h1>

<form method="post" action=<?php BASE_URL?> "/airport/store">
    <input type="text" name="name" placeholder="Pavadinimas">
    <input type="text" name="country" placeholder="Šalis">
    <input type="text" name="location" placeholder="Koordinates">

    <select multiple name="airlines[]" id="airlines">
        <option value="0">Rainair</option>
        <option value="1">Wizair</option>
        <option value="2">Kinai</option>
        <option value="3">Privatus</option>
    </select>

    <button type="submit">Kurti</button>
</form>