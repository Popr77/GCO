require('./bootstrap');

document.querySelector('.navbar-toggler').addEventListener('click', async () => {
  await $('#userMenu').dropdown('toggle')
})
