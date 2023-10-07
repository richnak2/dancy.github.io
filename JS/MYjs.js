
document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
            
    everyitem.addEventListener('mouseover', function(e){

        let el_link = this.querySelector('a[data-bs-toggle]');

        if(el_link != null){
            let nextEl = el_link.nextElementSibling;
            el_link.classList.add('show');
            nextEl.classList.add('show');
        }
        
    });
    everyitem.addEventListener('mouseleave', function(e){
        let el_link = this.querySelector('a[data-bs-toggle]');
        
        if(el_link != null){
            let nextEl = el_link.nextElementSibling;
            el_link.classList.remove('show');
            nextEl.classList.remove('show');
        }
        

    })
});


const NazovGrupy = document.getElementById('NAZOVGRUPY')

let dropdownItems = document.querySelectorAll('.selectedtraining');    
for (let i = 0; i < dropdownItems.length; i++) {
    dropdownItems[i].onclick = () =>{ selectGroup(dropdownItems[i].id, dropdownItems[i].innerHTML); } 
    // dropdownItems[i].removeAttribute('href');
}

function selectGroup(id, innertext){
    NazovGrupy.innerHTML = innertext;
    console.log(id);
    let alltrainings = document.querySelectorAll('.allselected');
    if (id === 'allselected') {
        alltrainings.forEach(elment => {
            // elment.setAttribute('display','revert')
            elment.style.display = 'revert' 

        });
    }else{
        alltrainings.forEach(elment => {
            console.log(elment.className.toString().includes(id))
            if (elment.className.toString().includes(id)) {
                elment.style.display = 'revert' ;
                // ('display','revert')   
            }else{
                
                elment.style.display = 'none' ;
                // elment.setAttribute('display','none')
            }
        });
        
    };
}


const dict = {
    "main" : ["MAINPAGEHED", "MAINPAGE"],
    "onas" : ["HISTORY", "HOTSIDENAWBARCOONAS"],
    "onasHistoria" : ["HISTORY", "HOTSIDENAWBARCOONAS"],
    "onasCoTancujem" : ["COTANCUJEME", "HOTSIDENAWBARCOONAS"],
    "onasTrenery" : [ "TRENERYKONKRETNEMAINHOLDER", "HOTSIDENAWBARCOONAS"],
    // "onasTreningy" : ["TRENINGYHODINI", "HOTSIDENAWBARCOONAS"],
    "onasUdalosty" : [ "HOTSIDENAWBARCOONAS"],
    "onas2Percenta" : ["2PDANE", "HOTSIDENAWBARCOONAS"],
    "onasPartneri" : ["PARTNERI", "HOTSIDENAWBARCOONAS"],
    "ponuka" : ["PONUKA", "HOTSIDENAWBARPONUKA"],
    "treningi" : ["TRENINGYHODINI", "HOTSIDENAWBARTRENINGI"],
    "kontakt" : ["KONTAKT","MAPY"], //"HOTSIDENAWBARKONTAKT"
    "galeria" : ["ALBUMFOTO"],
    "galeriafoto" : ["ALBUMFOTO"],
    "galeriavideo" : ["VYDEOALBUM"]
    
    
}

const listOfNotValidTargets = ["galeria","onas","treningi","ponuka"]

const navbarCOLAPS = document.getElementById('navbarCollapse')
const collapseElement = document.getElementsByClassName('dropdown-menu')


function openLocation(targetLocation){
    // console.log(listOfNotValidTargets.contains(targetLocation))
    if (window.matchMedia('(max-width: 765px)').matches && !listOfNotValidTargets.includes(targetLocation) ) {
        let json = [];
        [...collapseElement].forEach((e) =>  {json.push(e.classList) });
        json = json.map((e) => {return [...e]})
        json = [].concat(...json)
        // console.log()

        // console.log(navbarCOLAPS.collapse)
        // console.log(collapseElement.collapse)

        // collapseElement.collapse('hide');
        // navbarCOLAPS.click();
        // console.log(json)
        showHide(targetLocation)
        navbarCOLAPS.classList.remove('show');
        
    }else{
        showHide(targetLocation)
    }

}



function hide(){
    
    for (const key in dict) {
        if (dict.hasOwnProperty(key)) {
            dict[key].forEach(targrtL => {
                document.getElementById(targrtL).classList.add("d-none")
            });
        }
    }  

    // if (window.matchMedia('(max-width: 600px)').matches) {
    //     // console.log(navbarCOLAPS.collapse)
    //     // console.log(collapseElement.collapse)

    //     // collapseElement.collapse('hide');
    //     // navbarCOLAPS.click();

    //     if (navbarCOLAPS.classList.contains('show')) {
    //         navbarCOLAPS.classList.remove('show');
    //         // console.log('som tuna hides')
    //     } else {
    //         // navbarCOLAPS.collapse('show');
    //         // console.log('som tuna show')
    //     }
    // }
    

}

function showHide(targetLocation){
    hide();
    dict[targetLocation].forEach(targrtL => {
        document.getElementById(targrtL).classList.remove("d-none")
    });
}


function showMap(map){
    ['ZSMEDZILABORECKA','ZSDRIENOVA','BALANCEDOM'].forEach((e) => {
        if (!document.getElementById(e).classList.contains('d-none')) {
            document.getElementById(e).classList.add('d-none')
        }
    });
    document.getElementById(map).classList.remove('d-none')
}

// window.addEventListener("resize", function() {
//     resize();
// });

// window.onload = () => {
//     resize();
//     console.log('som tunak');
// }

// function resize(){
//     if (window.innerWidth > 0) {
//         console.log('som tunak')

        

// }
// }


// document.addEventListener("DOMContentLoaded", function(){

//     // make it as accordion for smaller screens
//     if (window.innerWidth > 992) {
//         console.log('som tunak')

//         document.querySelectorAll('.navbar .nav-item').forEach(function(everyitem){
            
//             everyitem.addEventListener('mouseover', function(e){

//                 let el_link = this.querySelector('a[data-bs-toggle]');

//                 if(el_link != null){
//                     let nextEl = el_link.nextElementSibling;
//                     el_link.classList.add('show');
//                      nextEl.classList.add('show');
//                 }
                
//             });
//             everyitem.addEventListener('mouseleave', function(e){
//                  let el_link = this.querySelector('a[data-bs-toggle]');
                
//                 if(el_link != null){
//                     let nextEl = el_link.nextElementSibling;
//                     el_link.classList.remove('show');
//                      nextEl.classList.remove('show');
//                 }
                

//             })
//         });

//     }
//     // end if innerWidth
// }); 
