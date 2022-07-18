var AUDIO_PATH = "res/audio/"
const keys=[['192','C2.mp3'],['49','C2s.mp3'],['50','D2.mp3'],['51','D2s.mp3'],['52','E2.mp3'],['53','F2.mp3'],
			['54','F2s.mp3'],['55','G2.mp3'],['56','G2s.mp3'],['57','A2.mp3'],['48','A2s.mp3'],['106','B2.mp3'],
			['81','C3.mp3'],['87','C3s.mp3'],['69','D3.mp3'],['82','D3s.mp3'],['84','E3.mp3'],['89','F3.mp3'],
			['85','F3s.mp3'],['73','G3.mp3'],['79','G3s.mp3'],['80','A3.mp3'],['219','A3s.mp3'],['221','B3.mp3'],
			['20','C4.mp3'],['65','C4s.mp3'],['83','D4.mp3'],['68','D4s.mp3'],['70','E4.mp3'],['71','F4.mp3'],
			['72','F4s.mp3'],['74','G4.mp3'],['75','G4s.mp3'],['76','A4.mp3'],['13','A4s.mp3'],['220','B4.mp3'],
			['17','C5.mp3'],['16','C5s.mp3'],['90','D5.mp3'],['88','D5s.mp3'],['67','E5.mp3'],['86','F5.mp3'],
			['66','F5s.mp3'],['78','G5.mp3'],['77','G5s.mp3'],['188','A5.mp3'],['190','A5s.mp3'],['32','B5.mp3']];


function Click(note) {
   
        var notePath = AUDIO_PATH + note ;
        var bleep=new Audio(notePath);
        bleep.currenttime=0;
        bleep.play();

        // let pressedNote=note.replace('.mp3','');
        // let ky=document.getElementById(pressedNote);
        // ky.classList.add('active');
        // setTimeout(()=>ky.classList.remove('active'),200);
        // bleep.addEventListener('ended',()=> ky.classList.remove('active'));

        // if(recording)
        // {
        //     let nexttime=(new Date()).getTime();
        //     let currenttime=nexttime-starttime;
        //     NewRecord(currenttime,pressedNote);
        // }
}
function Play(val){
    // removeElements();
    // HelpDocHide();
    let obj=JSON.parse(val);

    let mp = new Map()
            for(let k of Object.keys(obj)) {
                            mp.set(k, obj[k]);
            }

            // ShowPianoBody();
            for(const [time,v] of mp.entries()){
                setTimeout(()=>	Click(v +".mp3"),parseInt(time));
            }
}

function fetchAndPlaySong(username, songName){
    var xhttp = new XMLHttpRequest();
    var res = "{}";
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(xhttp.responseText);
            if(xhttp.responseText != "{}")
                Play(xhttp.responseText);
        }
    }
    url = "SongFetcher.php?username=" + username + "&songName=" + songName;
    xhttp.open("GET", url, true);
    xhttp.send();
}


