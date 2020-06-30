const musicContainer = document.getElementById("music-container");
const playBtn = document.getElementById("play");
const prevBtn = document.getElementById("prev");
const nextBtn = document.getElementById("next");

const audio = document.getElementById("audio");
const progress = document.getElementById("progress");
const progressContainer = document.getElementById("progress-container");
const title = document.getElementById("title");
const cover = document.getElementById("cover");
const vol = document.getElementById("vol");
const songs = document.querySelectorAll(".song");
const totalSongs = document.querySelector(".totalSongs");

// Keep track of song
let songIndex;
let songIdsJS;

getSongs();

// Update song details
function loadSong(song, banner) {
  // set to default before play new song
  audio.currentTime = 0;
  title.innerText = song;
  audio.src = `uploads/${song}.mp3`;
  cover.src = `images/${banner}`;
}

// Play song
function playSong() {
  musicContainer.classList.add("play");
  playBtn.querySelector("i.fas").classList.remove("fa-play");
  playBtn.querySelector("i.fas").classList.add("fa-pause");

  audio.play();
}

// Pause song
function pauseSong() {
  musicContainer.classList.remove("play");
  playBtn.querySelector("i.fas").classList.add("fa-play");
  playBtn.querySelector("i.fas").classList.remove("fa-pause");

  audio.pause();
}

// Update progress bar
function updateProgress(e) {
  const { duration, currentTime } = e.srcElement;
  const progressPercent = (currentTime / duration) * 100;
  progress.style.width = `${progressPercent}%`;
}

// Set progress bar
function setProgress(e) {
  const width = this.clientWidth;
  const clickX = e.offsetX;
  const duration = audio.duration;

  audio.currentTime = (clickX / width) * duration;
}

// Event listeners
playBtn.addEventListener("click", () => {
  const isPlaying = musicContainer.classList.contains("play");
  if (isPlaying) {
    pauseSong();
  } else {
    playSong();
  }
});

// Change song

// Time/song update
audio.addEventListener("timeupdate", updateProgress);

// Click on progress bar
progressContainer.addEventListener("click", setProgress);

// Song ends
audio.addEventListener("ended", nextSong);

vol.addEventListener("change", (e) => {
  audio.volume = parseInt(e.target.value) / 100;
});

prevBtn.addEventListener("click", prevSong);
nextBtn.addEventListener("click", nextSong);

let value = parseInt(totalSongs.getAttribute("data-total"));

function nextSong() {
  // check the position of current song inside songIds
  let index = songIdsJS.indexOf(songIndex);
  if (index === songIdsJS.length - 1) {
    return;
  } else {
    let nextSongId = songIdsJS[index + 1];
    songIndex = nextSongId;
    loadDoc();
  }
}

function prevSong() {
  // check the position of current song inside songIds
  let index = songIdsJS.indexOf(songIndex);
  // stop if it is a first song no matter the id
  if (index == 0) {
    return;
  } else {
    let prevSongId = songIdsJS[index - 1];
    songIndex = prevSongId;
    loadDoc();
  }
}

function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText !== "0 results") {
        let arr = this.responseText.split("&&");
        loadSong(arr[0], arr[1]);
      } else {
        return;
      }
    }
  };
  xhttp.open("POST", "returnsong.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(`songid=${songIndex}`);
}

songs.forEach((song) => {
  song.addEventListener("click", (e) => {
    let clickId = e.target.getAttribute("data-id");
    songIndex = clickId;
    loadDoc();
  });
});

const deleteBtns = document.querySelectorAll(".delete");
const favoriteBtns = document.querySelectorAll(".favorite");

deleteBtns.forEach((deleteBtn) => {
  deleteBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    let id = e.target.getAttribute("data-id");
    var r = confirm(`Are you sure to delete this song ?`);
    if (r == true) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          window.location.href = "http://localhost/musicweb/song.php";
        }
      };
      xhttp.open("POST", "deletesong.php", true);
      xhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );

      xhttp.send(`songid=${id}`);
    } else {
      console.log("NO");
    }
  });
});

function getSongs(){
  fetch("getsong.php", {method: "GET"})
  .then(res=>res.text())
  .then(data=> {
    let songIds = data.split("||").slice(0, data.split("||").length - 1);
    songIdsJS = songIds;
    // set cho songIndex luc bat dau id dau tien trong nhom ids
    songIndex = songIds[0];
    loadDoc();
  });
}
