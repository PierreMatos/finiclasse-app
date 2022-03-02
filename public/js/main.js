//Firebase Push Notifications
var firebaseConfig = {
    apiKey: "{{ env('FIREBASE_ApiKey') }}",
    authDomain: "laravel-cronjob.firebaseapp.com",
    projectId: "laravel-cronjob",
    storageBucket: "laravel-cronjob.appspot.com",
    messagingSenderId: "810992723362",
    appId: "1:810992723362:web:a6ebea1ecba4ab245a3efb"
};
firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

function startFCM() {
    messaging
        .requestPermission()
        .then(function() {
            return messaging.getToken()
        })
        .then(function(response) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/store-token',
                type: 'POST',
                data: {
                    token: response
                },
                dataType: 'JSON',
                success: function(response) {
                    alert('Token Guardado.');
                },
                error: function(error) {
                    alert(error);
                },
            });
        }).catch(function(error) {
            alert(error);
        });
}
messaging.onMessage(function(payload) {
    const title = payload.notification.title;
    const options = {
        body: payload.notification.body,
        icon: payload.notification.icon,
    };
    new Notification(title, options);
});
//End