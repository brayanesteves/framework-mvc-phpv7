const country   = document.getElementById("country");
const cities    = document.getElementById("cities");
const addCities = document.getElementById("addCities");
const btnAdd    = document.getElementById("btn-add");
const getCities = (reference) => {
    let optionList = [];
    let data    = new URLSearchParams(`country=${reference}`);
    fetch('http://localhost/mvc-phpv7/ajax/getCities', {
        method: 'POST',
        body: data
    }).then(function(response) {
        if (response.ok) {          
            return response.json();
        } else {
            throw "Error request AJAX";
        }  
    }).then(function(texto) {
        for (let i = 0; i < texto.length; i++) {
            optionList.push(`<option value=${texto[i].Rfrnc}>${texto[i].Nm}</option>`);            
        }
        cities.innerHTML = optionList.join("");
    }).catch(function(err) {
        console.log(err);
    });
}

country.addEventListener('change', function (e) {
    getCities(e.target.value);
});

btnAdd.addEventListener('click', function (e) {
    let data    = new URLSearchParams(`country=${country.value}&cities=${addCities.value}`);
    fetch('http://localhost/mvc-phpv7/ajax/addCities', {
        method: 'POST',
        body: data
    }).then(function(response) {
        if (response.ok) {          
            return response;
        } else {
            throw "Error request AJAX";
        }  
    }).then(function() {
        addCities.innerText = '';
        getCities(country.value);
    }).catch(function(err) {
        console.log(err);
    });
});