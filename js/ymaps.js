ymaps.ready(init);

function init() {
    var myMap = new ymaps.Map("map", {
            center: [59.3796213, 28.1791181],
            zoom: 11.5
        }, {
            searchControlProvider: 'yandex#search'
        }),
        yellowCollection = new ymaps.GeoObjectCollection(null, {
            preset: 'islands#yellowIcon'
        }),
        blueCollection = new ymaps.GeoObjectCollection(null, {
            preset: 'islands#blueIcon'
        }),
        blueCoords = [[59.369401, 28.126559]];

    for (var i = 0, l = blueCoords.length; i < l; i++) {
        blueCollection.add(new ymaps.Placemark(blueCoords[i]));
    }

    myMap.geoObjects.add(yellowCollection).add(blueCollection);

    // Через коллекции можно подписываться на события дочерних элементов.
    yellowCollection.events.add('click', function () { alert('Кликнули по желтой метке') });
    blueCollection.events.add('click', function () { alert('Кликнули по синей метке') });

    // Через коллекции можно задавать опции дочерним элементам.
    blueCollection.options.set('preset', 'islands#blueDotIcon');
}
