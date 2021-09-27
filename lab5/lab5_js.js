var video = document.querySelector('.video');
var juice = document.querySelector('.orange-juice');
var juicevol = document.querySelector('.white-juice');
var btn = document.getElementById('play-pause');
var mut = document.getElementById('mute');
var bar = document.querySelector('.orange-bar');
var volup = document.getElementById('volup');
var voldown = document.getElementById('voldown');
var fullscr = document.getElementById('fullscreen');
var barvol = document.querySelector('.white-bar');
var vid1 = document.getElementById('video1');
var vid2 = document.getElementById('video2');
var vid3 = document.getElementById('video3');

function togglePlayPause() {
    if (video.paused) {
        btn.className = 'pause';
        video.play();
    } else {
        btn.className = 'play';
        video.pause();
    }
}

function volumeUp() {
    if (video.volume < 1.0) {
        video.volume += 0.1;
        var zeta = video.volume;
        juicevol.style.width = zeta * 100 + "%";
    } else {
        var x = 69;
    }
}

volup.onclick = function(params) {
    volumeUp();
}

function volumeDown() {
    if (video.volume > 0.0) {
        video.volume -= 0.1;
        var zeta = video.volume;
        juicevol.style.width = zeta * 100 + "%";
    } else {
        var x = 69;
    }
}

voldown.onclick = function(params) {
    volumeDown();
}

function toggleMuteUnmute() {
    if (video.paused) {
        mut.className = 'mute';
        video.muted = !video.muted;
    } else {
        mut.className = 'unmute'; //tego nie używam
        video.muted = !video.muted;
    }
}

function closeFullscreen() {
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) { /* Firefox */
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE/Edge */
        document.msExitFullscreen();
    }
}

function openFullscreen() {
    if (video.requestFullscreen) {
        video.requestFullscreen();
    } else if (video.mozRequestFullScreen) { /* Firefox */
        video.mozRequestFullScreen();
    } else if (video.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
        video.webkitRequestFullscreen();
    } else if (video.msRequestFullscreen) { /* IE/Edge */
        video.msRequestFullscreen();
    }
}
fullscr.onclick = function(params) {
    openFullscreen();
}

bar.addEventListener('click', function(e) {
    var x = e.pageX - 8;
    //var juicePos = video.currentTime / video.duration;
    var zeta = x / 1065 * 100
    juice.style.width = zeta + "%";
    video.currentTime = zeta / 100 * video.duration;
});

barvol.addEventListener('click', function(e) {
    var x = e.pageX - 205;
    //var juicePos = video.currentTime / video.duration;
    var zeta = x;
    juicevol.style.width = zeta + "%";
    video.volume = zeta / 100;
});

btn.onclick = function(params) {
    //video.fastSeek(570); // 9:30
    // video.currentTime = 570; //test
    togglePlayPause();
}

mut.onclick = function(params) {
    //video.fastSeek(570); // 9:30
    // video.currentTime = 570; //test
    toggleMuteUnmute();
}

video.addEventListener('timeupdate', function() {
    var juicePos = video.currentTime / video.duration;
    juice.style.width = juicePos * 100 + "%";
    if (video.ended) {
        btn.className = "play";
        // At the end of the movie, reset the position to the start and pause the playback.
        video.currentTime = 0;
        togglePlayPause();
    }
});

//video.addEventListener('click', function(e) {
//video.muted = !video.muted;
//});

video.addEventListener('click', function(e) {
    if (video.paused || video.ended) video.play();
    else video.pause();
});

video.addEventListener('dblclick', function(e) {

    if (!window.screenTop && !window.screenY) {
        closeFullscreen();
    } else {
        openFullscreen();
    }
});

function changeVideo1() {

    video.src = 'media/video1.mp4'
}

vid1.onclick = function(params) {
    changeVideo1()
}

function changeVideo2() {

    video.src = 'media/video2.mp4'
}

vid2.onclick = function(params) {
    changeVideo2()
}

function changeVideo3() {

    video.src = 'media/video3.mp4'
}

vid3.onclick = function(params) {
    changeVideo3()
}