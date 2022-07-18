var recording=false;
var AUDIO_PATH = "res/audio/"
var starttime;
const record=new Map();
const keys=[['192','C2.mp3'],['49','C2s.mp3'],['50','D2.mp3'],['51','D2s.mp3'],['52','E2.mp3'],['53','F2.mp3'],
			['54','F2s.mp3'],['55','G2.mp3'],['56','G2s.mp3'],['57','A2.mp3'],['48','A2s.mp3'],['106','B2.mp3'],
			['81','C3.mp3'],['87','C3s.mp3'],['69','D3.mp3'],['82','D3s.mp3'],['84','E3.mp3'],['89','F3.mp3'],
			['85','F3s.mp3'],['73','G3.mp3'],['79','G3s.mp3'],['80','A3.mp3'],['219','A3s.mp3'],['221','B3.mp3'],
			['20','C4.mp3'],['65','C4s.mp3'],['83','D4.mp3'],['68','D4s.mp3'],['70','E4.mp3'],['71','F4.mp3'],
			['72','F4s.mp3'],['74','G4.mp3'],['75','G4s.mp3'],['76','A4.mp3'],['13','A4s.mp3'],['220','B4.mp3'],
			['17','C5.mp3'],['16','C5s.mp3'],['90','D5.mp3'],['88','D5s.mp3'],['67','E5.mp3'],['86','F5.mp3'],
			['66','F5s.mp3'],['78','G5.mp3'],['77','G5s.mp3'],['188','A5.mp3'],['190','A5s.mp3'],['32','B5.mp3']];

const myMap = new Map(keys);

document.addEventListener('keydown',(event)=>{
if(event.repeat) return;
for(const [keycode,note] of myMap.entries())
{
	if(event.which==keycode)
	{
		Click(note);
		break;
	}
}
});


function Click(note) {
	if(document.getElementById("pianobody").style.display != "none")
	{
		var notePath = AUDIO_PATH + note ;
		var bleep=new Audio(notePath);
		bleep.currenttime=0;
		bleep.play();

		let pressedNote=note.replace('.mp3','');
		let ky=document.getElementById(pressedNote);
		ky.classList.add('active');
		setTimeout(()=>ky.classList.remove('active'),200);
		// bleep.addEventListener('ended',()=> ky.classList.remove('active'));

		if(recording)
		{
			let nexttime=(new Date()).getTime();
			let currenttime=nexttime-starttime;
			NewRecord(currenttime,pressedNote);
		}
	}
}

function NewRecord(attime,note){
	record.set(attime,note);
}

function StartRecord() {
 removeElements();
 
 var saveRecordEl = document.getElementById("SaveRecord");
 if(saveRecordEl.style.display == "inline"){
	 var consent = confirm("Are you sure? Your previous recording will be discarded!");
	 if(!consent){
		 return;
	 }
 }
 SaveRecordHide();
//  PlayRecordHide();
 HelpDocHide();
 ShowPianoBody();
	let RecordButton=document.getElementById('Record/Stop');
	if(RecordButton.textContent==="RECORD")
	{
	 RecordButton.textContent="STOP";
	 recording=true;
	 RecordButton.classList.add('active');
	 let d=new Date();
	 starttime=d.getTime();
	}
	else
	{
	 RecordButton.textContent="RECORD";
	 RecordButton.classList.remove('active');
	 recording=false;
	 SetRecordCookie();
	 SaveRecordDisplay();
	 record.clear();
	}
}

function Home(){
removeElements();
HelpDocHide();
ShowPianoBody();
}

function SetRecordCookie(){
	let obj = {};

	record.forEach(function(value, key){
			obj[key] = value
	});

	let cookie_value=JSON.stringify(obj);
	document.cookie="record="+cookie_value;
}

function PlaySetUp(name,obj){
	let value=JSON.stringify(obj);
	let form=document.getElementById("DropDownPlay");
	let submit=document.createElement('button');
	form.appendChild(submit);
	submit.innerHTML=name;
	submit.setAttribute("name","recordBtn");
	submit.setAttribute("value",value);
	submit.setAttribute("type","submit");
	submit.setAttribute("id",name);
	submit.setAttribute("class","Content");
}


// document.getElementsByClassName("Content").addEventListener("click",)

function Play(val){
	removeElements();
	HelpDocHide();
	let obj=JSON.parse(val);

	let mp = new Map()
		 for(let k of Object.keys(obj)) {
						 mp.set(k, obj[k]);
		 }

		 ShowPianoBody();
		 for(const [time,v] of mp.entries()){
		 	setTimeout(()=>	Click(v +".mp3"),parseInt(time));
		 }
}

function Help(){
document.getElementById("HelpDoc").style.display="block";
}

/*remove all created elements in box*/

function removeElements(){
	let elements=document.getElementsByClassName("box");
	let parent=document.getElementById("restbody");
  for(let i = 0; i < elements.length; i++){
      parent.removeChild(elements[i]);
   }
}

function ShowPianoBody(){
	document.getElementById("pianobody").style.display="grid";
}

function removePianoBody(){
	let pianobody=document.getElementById("pianobody");
	pianobody.style.display="none";
}

function SaveRecordHide()
{
	document.getElementById("SaveRecord").style.display="none";
}

function SaveRecordDisplay()
{
	document.getElementById("SaveRecord").style.display="inline";
}

function PlayRecordHide()
{
	document.getElementById("DropDownPlay").style.display="none";
}

function PlayRecordDisplay()
{
	document.getElementById("DropDownPlay").style.display="block";
}

function HelpDocHide(){
	document.getElementById("HelpDoc").style.display="none";
	// document.getElementById("restbody").style.padding="110px 0px";
	// ShowPianoBody();
}

window.matchMedia("(min-width: 955px)").addListener(()=>{		//remove inline styles made by clicking icon in small window or calling changeIcon()
	document.getElementById("restbody").removeAttribute("style");
	document.getElementById("options").removeAttribute("style");
});


function changeIcon(){
	let icon=document.getElementById("icon").innerHTML;
	if(icon == "✖"){
		document.getElementById("icon").innerHTML="&#9776;";

		document.getElementById("options").style.height="0%";
		document.getElementById("options").style.opacity="0";
		document.getElementById("options").style.pointerEvents="none";

		document.getElementById("restbody").style.position="static";
		document.getElementById("restbody").style.zIndex="0";
	}
	else{
		document.getElementById("icon").innerHTML="&#10006";

		document.getElementById("options").style.height="100%";
		document.getElementById("options").style.opacity="1";
		document.getElementById("options").style.pointerEvents="all";

		document.getElementById("restbody").style.position="relative";
		document.getElementById("restbody").style.zIndex="-1";
		document.getElementById("DropDownPlay").style.display="none";
	}
}

// // // Get the modal
// // var modal = document.getElementById("myModal");

// // // Get the button that opens the modal
// // var btn = document.getElementById("myBtn");

// // // Get the <span> element that closes the modal
// // var span = document.getElementsByClassName("close")[0];

// // When the user clicks on the button, open the modal
// function modalShow(){
// 	console.log("Clicked");
// 	var modal = document.getElementById("myModal");
// 	modal.style.display = "block";
// }

// // // When the user clicks on <span> (x), close the modal
// // span.onclick = function() {
// //   modal.style.display = "none";
// // }

// function modalClose(){
// 	var modal = document.getElementById("myModal");
	
// 	let check=confirm("Are you sure you don't want to save record.");

// 	if(check){
// 		document.cookie='record=;expires=Thu,01 Jan 1970 00:00:00 UTC;';
// 		modal.style.display = "none";
// 	}
// 	return;
// }