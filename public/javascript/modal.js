const modal = document.getElementById('modal');
const callbackBtn = document.getElementById('callback-btn');
const closeBtn = document.querySelector('.modal-close');

callbackBtn.addEventListener('click', (e) => {
    e.preventDefault();
    modal.style.display = 'flex';
});

closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});
