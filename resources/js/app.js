const togglebtn = document.getElementsByClassName('toggle')[0]
const navlinks = document.getElementsByClassName('navlinks')[0]
const loglinks = document.getElementsByClassName('loglinks')[0]

togglebtn.addEventListener('click', () => {
    navlinks.classList.toggle('active')
    loglinks.classList.toggle('active')
})

