document.getElementById('saveButton').addEventListener('click', function() {
    // قم بحفظ البوست في local storage
    localStorage.setItem('savedPost', '');

    // قم بتوجيه المستخدم إلى صفحة المحفوظات
    window.location.href = '/Buyer/Saved%20Post.html';
});
document.addEventListener('DOMContentLoaded', function() {
    // قم بالتحقق مما إذا كان هناك بوست محفوظ في local storage
    if (localStorage.getItem('savedPost')) {
        // اعرض البوست المحفوظ
        var savedPost = localStorage.getItem('savedPost');
        // اقوم بعرض البوست المحفوظ في الصفحة
        document.getElementById('savedPostContainer').innerText = savedPost;
    } else {
        // إذا لم يتم العثور على بوست محفوظ
        document.getElementById('savedPostContainer').innerText = '';
    }
});


document.getElementById('saveButton1').addEventListener('click', function() {
    // قم بحفظ البوست في local storage
    localStorage.setItem('savedPost', '');

    // قم بتوجيه المستخدم إلى صفحة المحفوظات
    window.location.href = '/Buyer/Saved%20Post.html';
});
document.addEventListener('DOMContentLoaded', function() {
    // قم بالتحقق مما إذا كان هناك بوست محفوظ في local storage
    if (localStorage.getItem('savedPost')) {
        // اعرض البوست المحفوظ
        var savedPost = localStorage.getItem('savedPost');
        // اقوم بعرض البوست المحفوظ في الصفحة
        document.getElementById('savedPostContainer1').innerText = savedPost;
    } else {
        // إذا لم يتم العثور على بوست محفوظ
        document.getElementById('savedPostContainer1').innerText = '';
    }
});


document.getElementById('saveButton2').addEventListener('click', function() {
    // قم بحفظ البوست في local storage
    localStorage.setItem('savedPost', '');

    // قم بتوجيه المستخدم إلى صفحة المحفوظات
    window.location.href = '/Buyer/Saved%20Post.html';
});
document.addEventListener('DOMContentLoaded', function() {
    // قم بالتحقق مما إذا كان هناك بوست محفوظ في local storage
    if (localStorage.getItem('savedPost')) {
        // اعرض البوست المحفوظ
        var savedPost = localStorage.getItem('savedPost');
        // اقوم بعرض البوست المحفوظ في الصفحة
        document.getElementById('savedPostContainer2').innerText = savedPost;
    } else {
        // إذا لم يتم العثور على بوست محفوظ
        document.getElementById('savedPostContainer2').innerText = '';
    }
});





















