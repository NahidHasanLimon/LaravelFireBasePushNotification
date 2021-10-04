// Add Firebase products that you want to use
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

// Firebase SDK
firebase.initializeApp({
    // apiKey: 'api-key',
    // authDomain: 'project-id.firebaseapp.com',
    // databaseURL: 'https://project-id.firebaseio.com',
    databaseURL: 'https://notification-using-laravel.firebaseio.com',
    // projectId: 'project-id',
    // storageBucket: 'project-id.appspot.com',
    // messagingSenderId: 'sender-id',
    // appId: 'app-id',
    apiKey:'AIzaSyDkVT2aX8ZH8bMcav35RA1zAMTkkeTJXU0',
    authDomain:'notification-using-laravel.firebaseapp.com',
    projectId:'notification-using-laravel',
    storageBucket:'notification-using-laravel.appspot.com',
    messagingSenderId:'308255597380',
    appId:'1:308255597380:web:00c1f048ce784468a56d11',
    measurementId:'G-QEQ383EEL1'
});

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message has received : ", payload);
    const title = "First, solve the problem.";
    const options = {
        body: "Push notificaiton!",
        icon: "/icon.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});