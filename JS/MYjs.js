const dict = {
    "main" : ["MAINPAGEHED"],
    "onas" : ["ONAS"], 
    "treningi" : ["TRENINGYHODINI", "RUZINOV", "MALINOVO"], 
    "RUZINOV": ["TRENINGYHODINI", "RUZINOV"],
    "MALINOVO": ["TRENINGYHODINI", "MALINOVO"],
    "kontakt" : ["KONTAKT", "MAPY"],   
}

const listOfNotValidTargets = ["onas","treningi"]
const navbarCOLAPS = document.getElementById('myNavbar')
const collapseElement = document.getElementsByClassName('dropdown-menu')


// NAVIGACIA
function openToThisLocation(targetLocation,scrollTo){
    if (window.matchMedia('(max-width: 768px)').matches ){
        navbarCOLAPS.classList.remove('show');
    }
    showHide(targetLocation)
    if (scrollTo) {
        if (scrollTo === 'TOPFIXSCROLL') {
            window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll directly to the top
        }else{
            document.getElementById(scrollTo).scrollIntoView({ behavior: 'smooth' });        

        }
    }
}

function showHide(targetLocation){
    hide();   
    dict[targetLocation].forEach(targrtL => {
        document.getElementById(targrtL).classList.remove("d-none")
    });
}

function hide(){
    for (const key in dict) {
        if (dict.hasOwnProperty(key)) {
            dict[key].forEach(targrtL => {
                document.getElementById(targrtL).classList.add("d-none")
            });
        }
    }  
}

// PONUKA
const zoomInPlusContiner = document.getElementById('FLUIDDIVFIXED')
const zoomInPlusAll = [...document.getElementsByClassName('modal-body')]

function openPonukaBig(sectionId){
    zoomInPlusAll.forEach(elem => {
        elem.classList.add("d-none")
    })
    zoomInPlusContiner.classList.remove("d-none")
    const sectionZoomInPlus = document.getElementById(sectionId);
    sectionZoomInPlus.classList.remove("d-none")
}


function closePonukaBig(){
    zoomInPlusContiner.classList.add("d-none")
    zoomInPlusAll.forEach(elem => elem.classList.add("d-none"))
}