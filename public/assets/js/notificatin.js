const dropdownButton7 = document.getElementById('dropdownButton7');
const dropdownMenu7 = document.getElementById('dropdownMenu7');

// إضافة حدث النقر على الأيقونة
dropdownButton7.addEventListener('click', function() {
    // ابدل حالة العرض للقائمة المنسدلة
    if (dropdownMenu7.style.display === 'none') {
        dropdownMenu7.style.display = 'block';
    } else {
        dropdownMenu7.style.display = 'none';
    }
});


const dropdownButton9 = document.getElementById('dropdownButton9');
const dropdownMenu9 = document.getElementById('dropdownMenu9');

// إضافة حدث النقر على الأيقونة
dropdownButton9.addEventListener('click', function() {
    // ابدل حالة العرض للقائمة المنسدلة
    if (dropdownMenu9.style.display === 'none') {
        dropdownMenu9.style.display = 'block';
    } else {
        dropdownMenu9.style.display = 'none';
    }
});




const dropdownButton10 = document.getElementById('dropdownButton10');
const dropdownMenu10 = document.getElementById('dropdownMenu10');

// إضافة حدث النقر على الأيقونة
dropdownButton10.addEventListener('click', function() {
    // ابدل حالة العرض للقائمة المنسدلة
    if (dropdownMenu10.style.display === 'none') {
        dropdownMenu10.style.display = 'block';
    } else {
        dropdownMenu10.style.display = 'none';
    }
});













document.getElementById('saveButton4').addEventListener('click', function() {
    // قم بحفظ البوست في local storage
    localStorage.setItem('savedPost', '');

    // قم بتوجيه المستخدم إلى صفحة المحفوظات
    window.location.href = '/home/Saved%20Post.html';
});
document.addEventListener('DOMContentLoaded', function() {
    // قم بالتحقق مما إذا كان هناك بوست محفوظ في local storage
    if (localStorage.getItem('savedPost')) {
        // اعرض البوست المحفوظ
        var savedPost = localStorage.getItem('savedPost');
        // اقوم بعرض البوست المحفوظ في الصفحة
        document.getElementById('savedPostContainer4').innerText = savedPost;
    } else {
        // إذا لم يتم العثور على بوست محفوظ
        document.getElementById('savedPostContainer4').innerText = '';
    }
});



document.getElementById('saveButton8').addEventListener('click', function() {
    // قم بحفظ البوست في local storage
    localStorage.setItem('savedPost', '');

    // قم بتوجيه المستخدم إلى صفحة المحفوظات
    window.location.href = '/home/Saved%20Post.html';
});
document.addEventListener('DOMContentLoaded', function() {
    // قم بالتحقق مما إذا كان هناك بوست محفوظ في local storage
    if (localStorage.getItem('savedPost')) {
        // اعرض البوست المحفوظ
        var savedPost = localStorage.getItem('savedPost');
        // اقوم بعرض البوست المحفوظ في الصفحة
        document.getElementById('savedPostContainer8').innerText = savedPost;
    } else {
        // إذا لم يتم العثور على بوست محفوظ
        document.getElementById('savedPostContainer8').innerText = '';
    }
});




document.getElementById('saveButton9').addEventListener('click', function() {
    // قم بحفظ البوست في local storage
    localStorage.setItem('savedPost', '');

    // قم بتوجيه المستخدم إلى صفحة المحفوظات
    window.location.href = '/home/Saved%20Post.html';
});
document.addEventListener('DOMContentLoaded', function() {
    // قم بالتحقق مما إذا كان هناك بوست محفوظ في local storage
    if (localStorage.getItem('savedPost')) {
        // اعرض البوست المحفوظ
        var savedPost = localStorage.getItem('savedPost');
        // اقوم بعرض البوست المحفوظ في الصفحة
        document.getElementById('savedPostContainer9').innerText = savedPost;
    } else {
        // إذا لم يتم العثور على بوست محفوظ
        document.getElementById('savedPostContainer9').innerText = '';
    }
});

function myFunction() {
    document.getElementById('saved4').style.cssText = 'color: #ded9e2';
    document.getElementById('saved8').style.cssText = 'color: #ded9e2';
    document.getElementById('saved9').style.cssText = 'color: #ded9e2';



}