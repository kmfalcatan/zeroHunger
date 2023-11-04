const monitor = document.querySelector('.loginContainer3');
const popup1 = document.querySelectorAll('.td1');
const closeMonitor = document.querySelector('.closeIcon3');

monitor.style.display = 'none';

popup1.forEach(function(element) {
    element.addEventListener('click', function() {
        monitor.style.display = 'block';
    });
});

closeMonitor.addEventListener('click', function() {
    monitor.style.display = 'none';
});
