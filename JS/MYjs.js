
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

// let dropdownItems = document.querySelectorAll('.selectedtraining');    
// for (let i = 0; i < dropdownItems.length; i++) {
//     dropdownItems[i].onclick = () =>{ selectGroup(dropdownItems[i].id, dropdownItems[i].innerHTML); } 
//     // dropdownItems[i].removeAttribute('href');
// }

function selectGroup(id, selfelement){
    NazovGrupy.innerHTML = selfelement.innerHTML ? selfelement.innerHTML : selfelement;
    console.log(id,selfelement.innerHTML);
    let alltrainings = document.querySelectorAll('.allselected');
    
    alltrainings.forEach(elment => {
        // console.log(elment.classList.contains(id))
        console.log(elment.className.toString().includes(id))
        if (elment.classList.contains(id)) {
            elment.classList.remove("d-none")
        }else{
            elment.classList.add("d-none")
        }
    });
        
   
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
    "treningi" : ["TRENINGYHODINI",  "HOTSIDENAWBARTRENINGI"], 
    "kontakt" : ["KONTAKT","MAPY"], //"HOTSIDENAWBARKONTAKT"
    "galeria" : ["ALBUMFOTO"],
    "galeriafoto" : ["ALBUMFOTO"],
    "galeriavideo" : ["VYDEOALBUM"]
    
    
}

const listOfNotValidTargets = ["galeria","onas","treningi","ponuka"]

const navbarCOLAPS = document.getElementById('navbarCollapse')
const collapseElement = document.getElementsByClassName('dropdown-menu')


function openLocation(targetLocation){
    if (window.matchMedia('(max-width: 765px)').matches && !listOfNotValidTargets.includes(targetLocation) ) {
        let json = [];
        [...collapseElement].forEach((e) =>  {json.push(e.classList) });
        json = json.map((e) => {return [...e]})
        json = [].concat(...json)
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
