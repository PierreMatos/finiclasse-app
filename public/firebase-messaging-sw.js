// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js");
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyAajBHYzX-TOLw1qIzrF8JqW-m6KjX_kIw",
    authDomain: "laravel-cronjob.firebaseapp.com",
    projectId: "laravel-cronjob",
    storageBucket: "laravel-cronjob.appspot.com",
    messagingSenderId: "810992723362",
    appId: "1:810992723362:web:a6ebea1ecba4ab245a3efb",
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notification message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(title, options);
});
