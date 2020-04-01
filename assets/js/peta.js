var map, id;
var posisi = {lat: -0.1668546225575293, lng: 100.59425354003908};
var zoom = 11;
/*
 * kegunaan variabel global diatas:
 * map : untuk menampung instance dari google maps
 * id : menampung instance geolocation realtime (mirip seperti cara menampung setInterval pada variabel), agar nanti proses realtime bisa dihentikan
 * markerLokasi : variabel yang akan menampung marker posisi user sekarang. Setiap posisi user berubah, maka marker ini akan diubah posisinya.
 * posisi: posisi awal peta
 * zoom: tingkat zoom peta
 */
 
// daftar key untuk masing-masing penyedia peta kecuali OSM
var mapbox = {
    key: 'pk.eyJ1IjoiZWdvZGFzYSIsImEiOiJjamd4NWkyMmwwNms2MnhsamJvaWQ3NGZmIn0.6ok1IiPZ0sPNXmiIe-iEWA',
    id: ['mapbox.streets','mapbox.satellite']
}
var bingMaps = {
    BingMapsKey: 'Amblsqmvthuv21W0xJTYBSk_Vpd8i4w_yovkDX6K8mVb-UlgkypA5uCGXiHel0rd',
    imagerySet: ['Road','AerialWithLabels'],
    culture: 'id'
}
var OpenStreetMap = L.tileLayer.provider('OpenStreetMap');

// semua provider peta diatas akan dimasukkan ke leaflet sebagai layer baru
// variabel untuk penampung layer per penyedia peta
var penyediaPeta = {
    "OpenStreetMap": OpenStreetMap,
    "Mapbox Streets": L.tileLayer.provider('MapBox', {id: mapbox.id[0], accessToken: mapbox.key}),
    //~ "Mapbox Satelite": L.tileLayer.provider('MapBox', {id: mapbox.id[1], accessToken: mapbox.key}),
    //~ "Bing Streets": L.tileLayer.bing({BingMapsKey: bingMaps.BingMapsKey, imagerySet: bingMaps.imagerySet[0], culture: bingMaps.culture}),
    //~ "Bing Satelite": L.tileLayer.bing({BingMapsKey: bingMaps.BingMapsKey, imagerySet: bingMaps.imagerySet[1], culture: bingMaps.culture})
}


