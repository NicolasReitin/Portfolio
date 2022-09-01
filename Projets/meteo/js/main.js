let WeatherData; // On crée un objet vide qui sera rempli par la requête
let APIKey = "c0c732dbfcf66ba4e7b118d6bd5da485"; // Clé API
let cf = document.getElementById("cf");
let button = document.getElementById('button');


button.addEventListener("click", () => { // On définit une fonction qui sera appelée lorsque l'utilisateur cliquera sur le bouton
    searchCity();// On appelle la fonction qui va faire la requête
});



function searchCity(){
    cf.innerHTML = "";
    let searchValue = document.getElementById('city').value;
    let URL = "https://api.openweathermap.org/data/2.5/weather?q="+searchValue+"&appid="+APIKey+"&units=metric&lang=fr"; // On crée l'URL de la requête
    let xhr = new XMLHttpRequest(); // Création d'un objet XMLHttpRequest
    xhr.open("GET", URL, true); // On ouvre une requête HTTP GET sur l'URL

    xhr.onload = function() { // On définit une fonction qui sera appelée lorsque la requête sera terminée
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status === 200) { // Si la requête a abouti
            WeatherData = JSON.parse(xhr.responseText); // on récupère le résultat de la requête dans l'objet indiqué, et on la convertit en objet JSON
            console.log(WeatherData);
            displayResult(); // On affiche la météo
        }
    }
    xhr.send();   // On envoie la requête
}
//-------------------------------------TEST api avec prévision------------------------------------------------------

// function searchCity2(){
//     cf.innerHTML = "";
//     let searchValue = document.getElementById('city').value;
//     let URL = "https://pro.openweathermap.org/data/2.5/forecast/hourly?q="+searchValue+"&appid="+APIKey+"&units=metric&lang=fr";; // On crée l'URL de la requête
//     let xhr = new XMLHttpRequest(); // Création d'un objet XMLHttpRequest
//     xhr.open("GET", URL, true); // On ouvre une requête HTTP GET sur l'URL

//     xhr.onload = function() { // On définit une fonction qui sera appelée lorsque la requête sera terminée
//         if (xhr.readyState == XMLHttpRequest.DONE && xhr.status === 200) { // Si la requête a abouti
//             WeatherData = JSON.parse(xhr.responseText); // on récupère le résultat de la requête dans l'objet indiqué, et on la convertit en objet JSON
//             console.log(WeatherData);
//             displayResult(); // On affiche la météo
//         }
//     }
//     xhr.send();   // On envoie la requête
// }


// affichage de la météo dans le container cf 
function displayResult() {
    //bloc logo + température + name
    let bloc1 = document.createElement('div'); // On crée un élément div qui va regrouper le ciel + la ville + la température
    bloc1.classList.add('bloc1'); // On lui donne la classe bloc1
    cf.appendChild(bloc1); // On l'ajoute au container cf
        //afficher ciel1
        let cielImg = document.createElement('img'); // On crée un élément img qui va contenir l'image du ciel
        bloc1.appendChild(cielImg); // On l'ajoute au bloc1
        cielImg.classList.add('cielImg');
        if (WeatherData.weather[0].main == "Clouds") {
            cielImg.src = "img/cloudy.svg"
        }
        if (WeatherData.weather[0].main == "Clear") {
            cielImg.src = "img/clear-day.svg"
        }
        if (WeatherData.weather[0].main == "Mist") {
            cielImg.src = "img/mist.svg"
        }
        if (WeatherData.weather[0].main == "Snow") {
            cielImg.src = "img/snow.svg";
        }
        if (WeatherData.weather[0].main == "Rain"){
            cielImg.src = "img/drizzle.svg";
        }
        if (WeatherData.weather[0].main == "Fog"){
            cielImg.src = "img/fog.svg";
        }
        //Bloc ville + température + ressenti
        let bloc2 = document.createElement('div'); // On crée un élément div qui va regrouper la ville + la température + le ressenti
        bloc2.classList.add('bloc2');// On lui donne la classe bloc2
        bloc1.appendChild(bloc2);// On l'ajoute au bloc1
        //afficher nom de ville
        let cityName = document.createElement('h1');
        cityName.classList.add('nomVille');
        bloc2.appendChild(cityName);
        cityName.textContent = WeatherData.name;
        //afficher température
        let cityTemp = document.createElement('h1');
        cityTemp.classList.add('Temp');
        bloc2.appendChild(cityTemp);
        cityTemp.textContent =  Math.round(WeatherData.main.temp) + "°C";
        //afficher Ressenti
        let cityFeels = document.createElement('h6');
        cityFeels.classList.add('Rain');
        bloc2.appendChild(cityFeels);
        cityFeels.textContent = "Ressenti " +  Math.round(WeatherData.main.feels_like) + "°C";

    //second bloc
    let bloc3 = document.createElement('div'); // On crée un élément div qui va regrouper la ville + la température + le ressenti
    bloc3.classList.add('bloc3');// On lui donne la classe bloc3
    cf.appendChild(bloc3);// On l'ajoute au container cf
        //tempMax et Min
        let tempMax = document.createElement('h4');
        bloc3.appendChild(tempMax);
        tempMax.innerHTML = "Temp. max. : " + Math.round(WeatherData.main.temp_max) + "°";
        let tempMin = document.createElement('h4');
        bloc3.appendChild(tempMin);
        tempMin.innerHTML = "Temp. min. : " + Math.round(WeatherData.main.temp_min) + "°";

        let hr = document.createElement('hr');
        bloc3.appendChild(hr);

        //afficher Vent
        let cityWind = document.createElement('h4');
        cityWind.classList.add('Wind');
        bloc3.appendChild(cityWind);
        cityWind.textContent = "Vent = " + Math.round(WeatherData.wind.speed * 3.6) + "km/h";

        //afficher humidité
        let cityHum = document.createElement('h4');
        cityHum.classList.add('Humidity');
        bloc3.appendChild(cityHum);
        cityHum.textContent = "Taux d'humidité = " + WeatherData.main.humidity + "%";

        //afficher Heure levé et couché du soleil
        let dateSunrise = new Date(WeatherData.sys.sunrise * 1000);
        let dateSunset = new Date(WeatherData.sys.sunset  * 1000);
        
        let currentHours = dateSunrise.getHours(); // On récupère l'heure de lever du soleil
        if (currentHours < 10)  currentHours = '0'+currentHours; // On ajoute un 0 devant si l'heure est inférieure à 10
        let currentMinutes = dateSunrise.getMinutes(); // On récupère les minutes de lever du soleil
        if (currentMinutes < 10)  currentMinutes = '0'+currentMinutes; // On ajoute un 0 devant si les minutes sont inférieures à 10

        let currentHours2 = dateSunset.getHours(); // On récupère l'heure de couché du soleil
        if (currentHours2 < 10)  currentHours2 = '0'+currentHours2; // On ajoute un 0 devant si l'heure est inférieure à 10
        let currentMinutes2 = dateSunset.getMinutes(); // On récupère les minutes de couché du soleil
        if (currentMinutes2 < 10)  currentMinutes2 = '0'+currentMinutes2; // On ajoute un 0 devant si les minutes sont inférieures à 10


        let citySunrise = document.createElement('h4');
        citySunrise.classList.add('lat_lon');
        bloc3.appendChild(citySunrise);
        citySunrise.textContent = "Le soleil se lève à " + currentHours + "h" + currentMinutes;

        let citySunset = document.createElement('h4');
        citySunset.classList.add('lat_lon');
        bloc3.appendChild(citySunset);
        citySunset.textContent = "Le soleil se couche à " + currentHours2 + "h" + currentMinutes2;

        //afficher Latitude
        // let cityLat = document.createElement('p');
        // cityLat.classList.add('lat_lon');
        // cf.appendChild(cityLat);
        // cityLat.textContent = "Latitude = " + WeatherData.coord.lat;
        
        // //afficher Longitude
        // let cityLon = document.createElement('p');
        // cityLon.classList.add('lat_lon');
        // cf.appendChild(cityLon);
        // cityLon.textContent = "Longitude = " + WeatherData.coord.lon;
}


