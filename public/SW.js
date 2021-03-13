;
//asignar un nombre y versión al cache
const CACHE_NAME = 'v1_cache_conoce_bochil',
  urlsToCache = [
    './',
    './assets/css/styles.css',
    './assets/js/script.css',
    './pwa.js',
   './assets/img/icon-atras.svg',
   './assets/img/icon-home.svg',
    './img/box.png',
    './img/cargando.png',
    './img/cargando.svg',
    './img/whatsapp.svg',
    './img/phone.svg',
    './img/favicon.png',
    './img/icon/icon_16.png',
    './img/icon/icon_32.png',
    './img/icon/icon_64.png',
    './img/icon/icon_96.png',
    './img/icon/icon_128.png',
    './img/icon/icon_192.png',
    './img/icon/icon_256.png',
    './img/icon/icon_384.png',
    './img/icon/icon_512.png',
    './img/icon/icon_1024.png',
    './img/icon/icon.png'   
  ]

//durante la fase de instalación, generalmente se almacena en caché los activos estáticos
self.addEventListener('install', e => {
  e.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache)
          .then(() => self.skipWaiting())
      })
      .catch(err => console.log('Falló registro de cache', err))
  )
})

//una vez que se instala el SW, se activa y busca los recursos para hacer que funcione sin conexión
self.addEventListener('activate', e => {
  const cacheWhitelist = [CACHE_NAME]

  e.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            //Eliminamos lo que ya no se necesita en cache
            if (cacheWhitelist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName)
            }
          })
        )
      })
      // Le indica al SW activar el cache actual
      .then(() => self.clients.claim())
  )
})

//cuando el navegador recupera una url
self.addEventListener('fetch', e => {
  //Responder ya sea con el objeto en caché o continuar y buscar la url real
  e.respondWith(
    caches.match(e.request)
      .then(res => {
        if (res) {
          //recuperar del cache
          return res
        }
        //recuperar de la petición a la url
        return fetch(e.request)
      })
  )
})