
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
                elment.style.display = 'revert' 
                // ('display','revert')   
            }else{
                
                elment.style.display = 'none' 
                // elment.setAttribute('display','none')
            }
        });
        
    }
}


const dict = {
    "main" : ["MAINPAGEHED", "MAINPAGE"],
    "onas" : ["HISTORY", "HOTSIDENAWBARCOONAS"],
    "onasHistoria" : ["HISTORY", "HOTSIDENAWBARCOONAS"],
    "onasCoTancujem" : ["COTANCUJEME", "HOTSIDENAWBARCOONAS"],
    "onasTrenery" : [ "TRENERYKONKRETNEMAINHOLDER", "HOTSIDENAWBARCOONAS"],
    "onasTreningy" : ["TRENINGYHODINI", "HOTSIDENAWBARCOONAS"],
    "onasUdalosty" : [ "HOTSIDENAWBARCOONAS"],
    "onas2Percenta" : ["2PDANE", "HOTSIDENAWBARCOONAS"],
    "onasPartneri" : ["PARTNERI", "HOTSIDENAWBARCOONAS"],
    "ponuka" : ["PONUKA", "HOTSIDENAWBARPONUKA"]
    
}

function openLocation(targetLocation){
    hide();
    console.log(targetLocation)
    console.log(dict[targetLocation])
    dict[targetLocation].forEach(targrtL => {
        document.getElementById(targrtL).classList.remove("d-none")
        // document.getElementById(targrtL).style.display = "revert";
    });
}

function hide(){
    
    for (const key in dict) {
        if (dict.hasOwnProperty(key)) {
        //   const value = myObject[key];
        //   console.log(`${key}: ${value}`);
            dict[key].forEach(targrtL => {
                document.getElementById(targrtL).classList.add("d-none")
            });
        //   document.getElementById(value).style.display = "revert"
        }
    }  
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