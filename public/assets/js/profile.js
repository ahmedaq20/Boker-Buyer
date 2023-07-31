function myFunction() {
    document.getElementById('inp').style.cssText = '     background-color: var(--white-color); pointer-events:visible;input:focus:outline: none';
    document.getElementById('inp1').style.cssText = '    background-color: var(--white-color); pointer-events:visible;input:focus:outline: none';
    document.getElementById('inp2').style.cssText = '    background-color: var(--white-color); pointer-events:visible;input:focus:outline: none';

    document.getElementById('inp3').style.cssText = '    background-color: var(--white-color); pointer-events:visible;input:focus:outline: none';
    document.getElementById('inp4').style.cssText = '    background-color: var(--white-color); pointer-events:visible;input:focus:outline: none';
    document.getElementById('inp5').style.cssText = '    background-color: var(--white-color); pointer-events:visible;input:focus:outline: none';
    document.getElementById('inp6').style.cssText = '    background:none; pointer-events:visible;input:focus:outline: none';
}

function openNav() {
    document.getElementById("navbarNav1").style.width = "250px";
}

function closeNav() {
    document.getElementById("navbarNav1").style.width = "0";
}

//
// // احضر العناصر من الواجهة الHTML
// const dropdownButton = document.getElementById('dropdownButton');
// const dropdownMenu = document.getElementById('dropdownMenu');
//
// // إضافة حدث النقر على الأيقونة
// dropdownButton.addEventListener('click', function() {
//     // ابدل حالة العرض للقائمة المنسدلة
//     if (dropdownMenu.style.display === 'none') {
//         dropdownMenu.style.display = 'block';
//     } else {
//         dropdownMenu.style.display = 'none';
//     }
// });



const dropdownButton = document.getElementById('dropdownButton');
const dropdownMenu = document.getElementById('dropdownMenu');

// إضافة حدث النقر على الأيقونة
dropdownButton.addEventListener('click', function() {
    // ابدل حالة العرض للقائمة المنسدلة
    if (dropdownMenu.style.display === 'none') {
        dropdownMenu.style.display = 'block';
    } else {
        dropdownMenu.style.display = 'none';
    }
});




