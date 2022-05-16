const signIn = document.querySelector('.sign-in')
const signUp = document.querySelector('.sign-up')
const toggleButtons = document.querySelectorAll('.underline')

function ToggleIt() {
  signIn.classList.toggle('show')
  signUp.classList.toggle('hidden')
}

toggleButtons.forEach((toggleButton) => {
  toggleButton.addEventListener('click', ToggleIt)
})
