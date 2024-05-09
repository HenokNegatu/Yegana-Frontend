function getWeather() {
    const cityInput = document.getElementById('city-input').value;

    // Replace 'YOUR_API_KEY' with your OpenWeatherMap API key
    const apiKey = '553805956a4c189846f1b50980a15517';
    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${cityInput}&appid=${apiKey}&units=metric`;

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            displayWeather(data);
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('Failed to fetch weather data. Please try again.');
        });
}

function displayWeather(data) {
    const weatherResult = document.getElementById('weather-result');
    weatherResult.innerHTML = '';

    const cityName = data.name;
    const temperature = data.main.temp;
    const description = data.weather[0].description;

    const weatherInfo = document.createElement('div');
    weatherInfo.innerHTML = `
        <h3>${cityName}</h3>
        <p>Temperature: ${temperature}°C</p>
        <p>Description: ${description}</p>
    `;

    weatherResult.appendChild(weatherInfo);
}

function getForecast() {
    const cityInput = document.getElementById('city-input').value;

    // Replace 'YOUR_API_KEY' with your OpenWeatherMap API key
    const apiKey = '553805956a4c189846f1b50980a15517';
    const apiUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${cityInput}&appid=${apiKey}&units=metric`;

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            displayForecast(data);
        })
        .catch(error => {
            console.error('Fetch error:', error);
            alert('Failed to fetch forecast data. Please try again.');
        });
}

function displayForecast(data) {
    const weatherResult = document.getElementById('weather-result');
    weatherResult.innerHTML = '';

    const cityName = data.city.name;
    const forecasts = data.list;

    const forecastInfo = document.createElement('div');
    forecastInfo.innerHTML = `<h3>Forecast for ${cityName}</h3>`;

    forecasts.forEach(forecast => {
        const date = new Date(forecast.dt * 1000); // Convert timestamp to date
        const dateString = date.toLocaleDateString('en-US', { weekday: 'short', month: 'short', day: 'numeric' });
        const timeString = date.toLocaleTimeString('en-US', { hour: 'numeric', minute: 'numeric' });

        const temperature = forecast.main.temp;
        const description = forecast.weather[0].description;

        const forecastItem = document.createElement('div');
        forecastItem.classList.add('forecast-item');
        forecastItem.innerHTML = `
            <p><strong>${dateString} ${timeString}</strong></p>
            <p>Temperature: ${temperature}°C</p>
            <p>Description: ${description}</p>
        `;

        forecastInfo.appendChild(forecastItem);
    });

    weatherResult.appendChild(forecastInfo);
}

