## ProjectMes
Project voor school periode 7 + 8.

## Build status
Project is afgerond en becijferd met een Goed, geen toevoegingen meer nodig. 

## App
De database van dit project is bruikbaar met een app:
https://github.com/Appenzeill/Flutter-login

## Rest api
De volgende rest api kan worden gebruikt om data op te vragen uit de database samen met de app: 
https://github.com/Appenzeill/rest_api.

#### Wat zou ik anders doen?
Op het moment worden zo pagina's opgevraagd in de index.php:

if(isset($_GET['start_screen']))
{
	include_once("Includes/parts/dashboard.php");
}

Dit zou ik in het vervolg veel simpeler aanpakken door normale structuur te volgen met www.website.nl/dashboard en bijvoorbeeld www.website.nl/dashboard/permissions.

## License
MIT © 
