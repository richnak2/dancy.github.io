
//TOTO JE CAST PRE ZOBRAZENIE PODCSATY
// document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
            
//     everyitem.addEventListener('mouseover', function(e){

//         let el_link = this.querySelector('a[data-bs-toggle]');

//         if(el_link != null){
//             let nextEl = el_link.nextElementSibling;
//             el_link.classList.add('show');
//             nextEl.classList.add('show');
//         }
        
//     });
//     everyitem.addEventListener('mouseleave', function(e){
//         let el_link = this.querySelector('a[data-bs-toggle]');
        
//         if(el_link != null){
//             let nextEl = el_link.nextElementSibling;
//             el_link.classList.remove('show');
//             nextEl.classList.remove('show');
//         }
        

//     })
// });


// const carousel = new bootstrap.Carousel('#myCarouselMobile')
// carousel._config.pause = 'false';
// carousel._isSliding = true;
// console.log(carousel);


// const myCarouselMobile = document.querySelector('#myCarouselMobile')

// const carousel = new bootstrap.Carousel(myCarouselMobile, {
//   interval: 2,
//   touch: false,
//   pause: false
// })

// carousel.to('2')


// const NazovGrupy = document.getElementById('NAZOVGRUPY')

// let dropdownItems = document.querySelectorAll('.selectedtraining');    
// for (let i = 0; i < dropdownItems.length; i++) {
//     dropdownItems[i].onclick = () =>{ selectGroup(dropdownItems[i].id, dropdownItems[i].innerHTML); } 
//     // dropdownItems[i].removeAttribute('href');
// }

// function selectGroup(id, selfelement){
//     NazovGrupy.innerHTML = selfelement.innerHTML ? selfelement.innerHTML : selfelement;
//     let alltrainings = document.querySelectorAll('.allselected');
    
//     alltrainings.forEach(elment => {
//         // console.log(elment.classList.contains(id))
//         if (elment.classList.contains(id)) {
//             elment.classList.remove("d-none")
//         }else{
//             elment.classList.add("d-none")
//         }
//     });
        
   
// }


const dict = {
    "main" : ["MAINPAGEHED", "MAINPAGE"],
    "onas" : ["ONAS", ], // "HOTSIDENAWBARCOONAS"
    // "onasHistoria" : ["HISTORY", "HOTSIDENAWBARCOONAS"],
    // "onasCoTancujem" : ["COTANCUJEME", "HOTSIDENAWBARCOONAS"],
    // "onasTrenery" : [ "TRENERYKONKRETNEMAINHOLDER", "HOTSIDENAWBARCOONAS"],
    // "onasTreningy" : ["TRENINGYHODINI", "HOTSIDENAWBARCOONAS"],
    // "onasUdalosty" : [ "HOTSIDENAWBARCOONAS"],
    // "onas2Percenta" : ["2PDANE", "HOTSIDENAWBARCOONAS"],
    // "onasPartneri" : ["PARTNERI", "HOTSIDENAWBARCOONAS"],
    //"ponuka" : ["PONUKA", ], // "HOTSIDENAWBARPONUKA"
    "treningi" : ["TRENINGYHODINI", "RUZINOV" , "MALINOVO"  ], 
    "RUZINOV": ["TRENINGYHODINI","RUZINOV"],
    "MALINOVO": ["TRENINGYHODINI","MALINOVO"],
    "kontakt" : ["KONTAKT","MAPY"], //"HOTSIDENAWBARKONTAKT"
    // "galeria" : ["ALBUMFOTO"],
    // "galeriafoto" : ["ALBUMFOTO"],
    // "galeriavideo" : ["VYDEOALBUM"]
    
    
}

const listOfNotValidTargets = ["onas","treningi"] // ,"ponuka"

const navbarCOLAPS = document.getElementById('myNavbar')
const collapseElement = document.getElementsByClassName('dropdown-menu')


function openToThisLocation(targetLocation,scrollTo){
    // console.log(window.matchMedia('(max-width: 768px)').matches, !listOfNotValidTargets.includes(targetLocation));
    if (window.matchMedia('(max-width: 768px)').matches ){
        navbarCOLAPS.classList.remove('show');
    }
    showHide(targetLocation)
    if (scrollTo) {
        document.getElementById(scrollTo).scrollIntoView({ behavior: 'smooth' });
    }
    
    // if (window.matchMedia('(max-width: 768px)').matches ) { // && !listOfNotValidTargets.includes(targetLocation)
    //     let json = [];
    //     [...collapseElement].forEach((e) =>  {json.push(e.classList) });
    //     json = json.map((e) => {return [...e]})
    //     json = [].concat(...json)
    //     showHide(targetLocation)
    //     navbarCOLAPS.classList.remove('show');
        
    // }else{
    //     showHide(targetLocation)
    // }
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



function showMap(map){
    ['ZSMEDZILABORECKA','ZSDRIENOVA','BALANCEDOM'].forEach((e) => {
        if (!document.getElementById(e).classList.contains('d-none')) {
            document.getElementById(e).classList.add('d-none')
        }
    });
    document.getElementById(map).classList.remove('d-none')
}





const zoomInPlusContiner = document.getElementById('FLUIDDIVFIXED')
const zoomInPlusAll = [...document.getElementsByClassName('modal-body')]
// console.log(zoomInPlusAll);

function openPonukaBig(sectionId){
    zoomInPlusAll.forEach(elem => {
        // console.log(zoomInPlusAll);
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




// let sidebar = document.getElementsByClassName("sidebar")[0];
// let sidebar_content = document.getElementsByClassName("content-wrapper")[0];

// window.onscroll = () => {
//    let scrollTop = window.scrollY;
//    let viewportHeight = window.innerHeight;
//    let sidebarTop = sidebar.getBoundingClientRect().top + window.pageYOffset;
//    let contentHeight = sidebar_content.getBoundingClientRect().height;

//    if( scrollTop >= contentHeight - viewportHeight + sidebarTop) {
//       sidebar_content.style.transform = `translateY(-${(contentHeight - viewportHeight + sidebarTop)}px)`;
//       sidebar_content.style.position  = "fixed"; 
//     }
//     else {
//       sidebar_content.style.transform = "";
//       sidebar_content.style.position  = ""; 
//     }
// };


// let sidebar = document.getElementById("sidebar");
// let sidebar_content = document.getElementById("HOTSIDENAWBARCOONAS");

// window.onscroll = () => {
//    let scrollTop = window.scrollY;
//    let viewportHeight = window.innerHeight;   
//    let sidebarTop = sidebar.getBoundingClientRect().top + window.pageYOffset;
//    let contentHeight = sidebar_content.getBoundingClientRect().height;

//    if( scrollTop >= contentHeight - viewportHeight + sidebarTop) {
//           sidebar_content.style.transform = `translateY(-${(contentHeight - viewportHeight + sidebarTop)}px)`;
//           sidebar_content.style.position  = "fixed"; 
//     }
//     else {
//       sidebar_content.style.transform = "";
//       sidebar_content.style.position  = ""; 
//     }
// };






