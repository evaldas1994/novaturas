<h1>Airport (UPDATE) </h1>

<form method="post" action=<?php BASE_URL?> "/airport/update/<?= $data['airport']->getId()?>" >
    <input type="text" name="name" placeholder="Pavadinimas" value=<?= $data['airport']->getId()?> >
    <input type="text" name="country" placeholder="Šalis" value=<?= $data['airport']->getCountry()?> >
    <input type="text" name="location" placeholder="Koordinates" value=<?= $data['airport']->getLocation()?> >

    <select multiple name="airlines[]" id="airlines">
        <option value="0">Rainair</option>
        <option value="1">Wizair</option>
        <option value="2">Kinai</option>
        <option value="3">Privatus</option>
    </select>

    <button type="submit">Naujinti</button>
</form>