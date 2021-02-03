const toggleButton = document.getElementsByClassName('boutton-burger')[0]
const navbarLinks = document.getElementsByClassName('navbar')[0]
const links = document.getElementsByClassName('liens')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})

toggleButton.addEventListener('click', () => {
  links.classList.toggle('ouvert')
})
