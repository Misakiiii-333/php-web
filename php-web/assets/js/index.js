document.addEventListener('mouseup', (e) => {
    const form = document.getElementById('login');
    
    if (!form) { return;}
    
    // Click out side form and does not click the text link "Login"
    if (!form.contains(e.target) && !e.target.innerText.toLowerCase().includes("login")) {
        form.style.display = ""; //No display
    }
});

function showLoginForm() {
    const form = document.getElementById('login');
    if (!form) { return; }
    //The above sentence can also be expressed this way.
    // if(form.style.display == ''){
    //     form.style.display='block';
    // }
    form.style.display = form.style.display ? '' : 'block';   
}
// homework1
function callMeBeforeLogout()
{
    var cnfrm = confirm("Do you really want to logout?");
    if(cnfrm) {
        // here redirect to `logout.php`
        window.location.href = 'modules/logout.php';
    }
}

// scroll action

function scrollToTop() {
    window.scrollTo({top: 0, behavior: 'smooth'}); 
}
/* クリックするとページが一番上までスクロールするが、
ページが一番上に来たときにボタンを非表示にしたい*/


function toggleScrollButton() {
    const lastPosition = window.scrollY;
    const scrollBtn = document.getElementById('scroll');
    
    if (lastPosition !== 0) {
        scrollBtn.setAttribute('style', 'display: block;');　//表示する
    } else {
        scrollBtn.setAttribute('style', 'display: none;');　//表示しない
    }
}

window.addEventListener('scroll', function() {
    toggleScrollButton();
});

window.addEventListener('load', () => {
    toggleScrollButton();
});



