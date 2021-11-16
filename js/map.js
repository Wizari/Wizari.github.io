// // Initialize and add the map
// function initMap() {
//     // The location of Uluru
//     // const uluru = { lat: -25.344, lng: 131.036 };
//     const uluru = { lat: 59.3694602, lng: 28.1244 };
//     // The map, centered at Uluru
//     const map = new google.maps.Map(document.getElementById("map"), {
//         zoom: 11,
//         center: uluru,
//     });
//     // The marker, positioned at Uluru
//     const marker = new google.maps.Marker({
//         position: uluru,
//         map: map,
//     });
// }

// Initialize and add the map
function initMap() {
    // The location of Uluru
    // const uluru = { lat: 59.3694602, lng: 28.1244 };
    const uluru = { lat: 59.3796213, lng: 28.1791181 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: { lat: 59.3694602, lng: 28.1244 },
        map: map,
    });
}

