<h1>Airline (UPDATE) </h1>

<form method="post" action=<?php BASE_URL?> "/airline/update/<?= $data['airline']->getId()?>" >
    <input type="text" name="name" placeholder="Pavadinimas" value=<?= $data['airline']->getName()?> >
    <input type="text" name="country" placeholder="Šalis" value=<?= $data['airline']->getCountry()?> >

    <button type="submit">Naujinti</button>
</form>