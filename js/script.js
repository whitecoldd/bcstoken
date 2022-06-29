var forEach = function (t, o, r) {
    if ("[object Object]" === Object.prototype.toString.call(t))
        for (var c in t) Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);
    else
        for (var e = 0, l = t.length; l > e; e++) o.call(r, t[e], e, t)
};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
    forEach(hamburgers, function (hamburger) {
        hamburger.addEventListener("click", function () {
            this.classList.toggle("is-active");
        }, false);
    });
}





let burderBtn = document.querySelector('.hamburger')
let burderMenu = document.querySelector('.nav')
let burderMenuLinks = document.querySelectorAll('.nav ul li a')

let show = false;
burderBtn.addEventListener('click', function (event) {
    event.preventDefault()

    if (show == false) {
        burderMenu.classList.toggle('show')
        show = true
    } else {
        burderMenu.classList.toggle('show')
        show = false
    }
})
for (let i = 0; i < burderMenuLinks.length; i++) {

    burderMenuLinks[i].addEventListener('click', function (event) {

        if (show == true) {
            burderMenu.classList.toggle('show')
            burderBtn.classList.toggle("is-active")
            show = false
        }
    })
}




/* let galaryBtnLeft = document.querySelector('.galary_left')
let galaryBtnRight = document.querySelector('.galary_right')
let Container = document.querySelector('.galary_trackImages_wrapper')

const vw = window.innerWidth;
console.log(vw)

galaryBtnRight.addEventListener('click', function () {
    Container.scrollLeft = Container.scrollLeft + vw;
    console.log(Container.scrollLeft)
})
galaryBtnLeft.addEventListener('click', function () {
    Container.scrollLeft = Container.scrollLeft - vw;
    console.log(Container.scrollLeft)
}) */