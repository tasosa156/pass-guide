const CACHE_NAME = "passguide-cache-v1";
const FILES_TO_CACHE = [
  "index.html",
  "PassGuide_Karte_Cluster.html",
  "PassGuide_Karte_OhneCluster.html",
  "DeinPassGuide.pdf",
  "Kurvenfuehrer_Interaktives_Inhaltsverzeichnis.html",
  "icon-192.png",
  "icon-512.png"
];

self.addEventListener("install", (evt) => {
  evt.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(FILES_TO_CACHE))
  );
  self.skipWaiting();
});

self.addEventListener("activate", (evt) => {
  evt.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(
        keyList.map((key) => {
          if (key !== CACHE_NAME) return caches.delete(key);
        })
      );
    })
  );
  self.clients.claim();
});

self.addEventListener("fetch", (evt) => {
  evt.respondWith(
    caches.match(evt.request).then((response) => {
      return response || fetch(evt.request);
    })
  );
});
